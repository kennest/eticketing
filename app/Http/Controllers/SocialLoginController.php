<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Socialite;
use App\Models\Client;
use Illuminate\Support\Facades\Session;

class SocialLoginController extends Controller
{
    public function redirectToProvider()
    {
        return Socialite::driver('facebook')
        ->setScopes(['email', 'public_profile','user_birthday','user_friends'])
        ->redirect();
    }

    /**
     * Obtain the user information from GitHub.
     *
     * @return \Illuminate\Http\Response
     */
    public function handleProviderCallback()
    {
        $user = Socialite::driver('facebook')
        ->fields([
            'first_name', 'last_name', 'email', 'gender', 'birthday'
        ])->user();
        // $user->token;
    }
}
