<?php

namespace GrahamCampbell\BootstrapCMS\Models;

use Illuminate\Database\Eloquent\Model;

class SocialUser extends Model
{
    protected $table = 'social_users';

    protected $fillable = [
        'provider',
        'provider_id',
        'avatar',
        'user_id'
    ];

    public function user()
    {
        return $this->belongsTo('GrahamCampbell\BootstrapCMS\Models\User');
    }

}
