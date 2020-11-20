<?php

namespace App\Http\Controllers;

use App\Providers\RouteServiceProvider;
use App\Repository\UserRepository;
use Auth;
use Laravel\Socialite\Facades\Socialite;

class SocialController extends Controller
{
    /**
     * @var UserRepository
     */
    private UserRepository $userRepository;

    public function __construct(UserRepository $repository)
    {
        $this->userRepository = $repository;
    }

    public function loginVk()
    {
        if (Auth::id()) {
            return redirect(RouteServiceProvider::WELCOME);
        }
        return Socialite::driver('vkontakte')->redirect();
    }

    public function responseVk()
    {
        if (Auth::id()) {
            return redirect(RouteServiceProvider::WELCOME);
        }

        $user = Socialite::driver('vkontakte')->user();

        Auth::login($this->userRepository->getUserBySocId($user, 'vk'));

        return redirect(RouteServiceProvider::WELCOME);
    }

    public function loginFacebook()
    {
        if (Auth::id()) {
            return redirect(RouteServiceProvider::WELCOME);
        }
        return Socialite::driver('facebook')->redirect();
    }

    public function responseFacebook()
    {
        if (Auth::id()) {
            return redirect(RouteServiceProvider::WELCOME);
        }

        $user = Socialite::driver('facebook')->user();

        Auth::login($this->userRepository->getUserBySocId($user, 'facebook'));

        return redirect(RouteServiceProvider::WELCOME);
    }
}
