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

use Illuminate\Routing\Controller;
use Socialite;

class SocialController extends Controller {

	public function login($provider) 
	{
		return Socialite::with($provider)->redirect();
	}

	public function callback($provider)
	{
		dd(Socialite::with($provider)->user());
	}
}