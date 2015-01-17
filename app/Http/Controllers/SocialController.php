<?php

/*
 * This file is part of Bootstrap CMS.
 *
 * (c) Andjelko Stefanov <pekac4@gmail.com>
 *
 * For the full copyright and license information, please view the LICENSE
 * file that was distributed with this source code.
 */

namespace GrahamCampbell\BootstrapCMS\Http\Controllers;

use Request, Socialite, App;
use Illuminate\Routing\Controller;
use GrahamCampbell\BootstrapCMS\Models\SocialUser;
use GrahamCampbell\Credentials\Credentials;
use Cartalyst\Sentry\Hashing\NativeHasher as Hasher;

class SocialController extends Controller {

    /**
     * @var Credentials
     */
    private $credentials;
    /**
     * @var Hasher
     */
    private $hasher;

    public function __construct(Credentials $credentials, Hasher $hasher)
    {
        $this->credentials = $credentials;
        $this->hasher = $hasher;
    }

    public function login($provider)
    {
        return Socialite::with($provider)->redirect();
    }

    public function callback($provider)
    {
        if ($providerData = Socialite::with($provider)->user())
        {
            $providerId = $providerData->id;

            if ($socialUser = SocialUser::where('provider_id', $providerId)->where('provider', $provider)->first())
            {
                // Login
                $this->credentials->login($socialUser->user);

                return redirect('/');
            }
            else
            {
                $data = [
                    'email' => data_get($providerData, 'email'),
                    'nickname' => data_get($providerData, 'nickname'),
                    'avatar' => data_get($providerData, 'avatar'),
                    'provider_id' => data_get($providerData, 'id'),
                    'provider' => $provider,
                    'first_name' => data_get($providerData, 'user.first_name'),
                    'last_name' => data_get($providerData, 'user.last_name'),
                ];

                return view('social.register', $data);
            }
        }

        App::abort(400, 'No data sent form provider!');
    }

    public function register()
    {
        $credentials = [
            'email' => Request::get('email'),
            'password' => $this->hasher->hash(str_random(6)),
            'first_name' => Request::get('first_name'),
            'last_name' => Request::get('last_name'),
        ];

        // Register
        $user = $this->credentials->register($credentials, true);

        $user->addGroup($this->credentials->getGroupProvider()->findByName('Users'));

        if ($user)
        {
            $social = [
                'provider_id' => Request::get('provider_id'),
                'provider' => Request::get('provider'),
                'avatar' => Request::get('avatar'),
                'user_id' => $user->getKey()
            ];

            // Create social user
            SocialUser::create($social);

            // Login
            $this->credentials->login($user);

            return redirect('/');
        }

        App::abort(400, 'Social Registration Failed!');
    }
}