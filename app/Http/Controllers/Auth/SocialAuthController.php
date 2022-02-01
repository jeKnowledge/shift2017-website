<?php

namespace App\Http\Controllers\Auth;

use Socialite;
use App\Http\Controllers\Controller;
use App\SocialAccountService;

class SocialAuthController extends Controller
{
    /**
     * Redirect the user to the GitHub authentication page.
     *
     * @return Response
     */
    public function github()
    {
        return Socialite::driver('github')->redirect();
    }

    /**
     * Obtain the user information from GitHub.
     *
     * @return Response
     */
    public function githubCallback(SocialAccountService $service)
    {
        $user = $service->createOrGetUser(Socialite::driver('github')->stateless()->user(), 'github');

        auth()->login($user);

        return redirect()->to('/platform');
    }

    /**
     * Redirect the user to the GitHub authentication page.
     *
     * @return Response
     */
    public function facebook()
    {
        return Socialite::driver('facebook')->redirect();
    }

    /**
     * Obtain the user information from facebook.
     *
     * @return Response
     */
    public function facebookCallback(SocialAccountService $service)
    {
        $user = $service->createOrGetUser(Socialite::driver('facebook')->stateless()->user(), 'facebook');

        auth()->login($user);

        return redirect()->to('/platform');
    }

    /**
     * Redirect the user to the GitHub authentication page.
     *
     * @return Response
     */
    public function google()
    {
        return Socialite::driver('google')->redirect();
    }

    /**
     * Obtain the user information from google.
     *
     * @return Response
     */
    public function googleCallback(SocialAccountService $service)
    {
        $user = $service->createOrGetUser(Socialite::driver('google')->stateless()->user(), 'google');

        auth()->login($user);

        return redirect()->to('/platform');
    }
}