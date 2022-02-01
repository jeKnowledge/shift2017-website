<?php

namespace App;

use Laravel\Socialite\Contracts\User as ProviderUser;
use Socialite;
use Image;

class SocialAccountService
{
    public function createOrGetUser(ProviderUser $providerUser, $provider)
    {
        $account = SocialAccount::whereProvider($provider)
            ->whereProviderUserId($providerUser->getId())
            ->first();

        if ($account) {
            return $account->user;
        } else {
            $filename = basename(time().'_'.$provider.'.jpg'); 
			Image::make($providerUser->avatar)->save(public_path('images/photos/' . $filename));

            $account = new SocialAccount([
                'provider_user_id' => $providerUser->getId(),
                'provider' => $provider
            ]);

            $user = User::whereEmail($providerUser->getEmail())->first();

            if (!$user) {
                $user = User::create([
                    'email' => $providerUser->getEmail(),
                    'name' => $providerUser->getName(),
                    'password' => 'SocialUsers'.date('YYmmddHHiiss').rand(6,11),
                    'photoPath' => $filename,
                ]);
            }


            $user->shifter()->create([]);
            $shifterRole = Role::whereName('shifter')->first();
            $user->roles()->attach($shifterRole);

            $account->user()->associate($user);
            $account->save();

            return $user;

        }

    }
}
