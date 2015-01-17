<?php

/*
 * This file is part of Bootstrap CMS.
 *
 * (c) Graham Campbell <graham@mineuk.com>
 *
 * For the full copyright and license information, please view the LICENSE
 * file that was distributed with this source code.
 */

return [

    /*
    |--------------------------------------------------------------------------
    | Third Party Services
    |--------------------------------------------------------------------------
    |
    | This file is for storing the credentials for third party services such
    | as Stripe, Mailgun, Mandrill, and others. This file provides a sane
    | default location for this type of information, allowing packages
    | to have a conventional place to find your various credentials.
    |
    */

    'mailgun' => [
        'domain' => '',
        'secret' => '',
    ],

    'mandrill' => [
        'secret' => '',
    ],

    'ses' => [
        'key'    => '',
        'secret' => '',
        'region' => 'us-east-1',
    ],

    'stripe' => [
        'model'  => 'User',
        'secret' => '',
    ],

    'facebook' => [
        'client_id'     => '377174612465305',
        'client_secret' => 'ac03a01146969df9826c8c1e985e1b65',
        'redirect'      => 'http://cms.com/account/callback/facebook'
    ],

    'twitter' => [
        'client_id'     => 'gvqBlvdf8MVtxJiGcgliAgvft',
        'client_secret' =>  'Dw7K08asOxhdWzHzx50sfq4PvSk47YxIEbHqSNVRy9r2ufu2kG',
        'redirect'      => 'http://cms.com/account/callback/twitter'
    ],

    'google' => [
        'client_id'     => '412282170903-9rceie5h8pa88osb04itnv371lmhn517.apps.googleusercontent.com',
        'client_secret' =>  'NYPvdyCSaujPltvUHL_MzT2N',
        'redirect'      => 'http://cms.com/account/callback/google'
    ],

];
