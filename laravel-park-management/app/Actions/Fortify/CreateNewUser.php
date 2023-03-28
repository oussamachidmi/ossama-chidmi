<?php

namespace App\Actions\Fortify;

use App\Models\User;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Validator;
use Laravel\Fortify\Contracts\CreatesNewUsers;
use Laravel\Jetstream\Jetstream;

class CreateNewUser implements CreatesNewUsers
{
    use PasswordValidationRules;

    /**
     * Validate and create a newly registered user.
     *
     * @param  array  $input
     * @return \App\Models\User
     */
    public function create(array $input)
    {
        Validator::make($input, [
            'name' => ['required', 'string', 'max:255'],
            'email' => ['required', 'string', 'email', 'max:255', 'unique:users'],
            'password' => $this->passwordRules(),
            'profile_photo_path' => ['nullable', 'mimes:jpg,jpeg,png', 'max:1024'],
            'terms' => Jetstream::hasTermsAndPrivacyPolicyFeature() ? ['accepted', 'required'] : '',
        ])->validate();

        // if (isset($input['photo_profile_path'])) {
        //     $pdp_name=$input['profile_photo_path']->name;
        //     $input['profile_photo_path']->image->move(public_path('storage')."/profile-photos/".$pdp_name);
        // }

        // // $file->move(public_path('uploads'),$img_name);

        // // if ($input['email'] !== $user->email &&
        // //     $user instanceof MustVerifyEmail) {
        // //     $this->updateVerifiedUser($user, $input);
        // // } else {
        // //     $user->forceFill([
        // //         'name' => $input['name'],
        // //         'email' => $input['email'],
        // //     ])->save();
        // // }

        // return User::create([
        //     'name' => $input['name'],
        //     'email' => $input['email'],
        //     'password' => Hash::make($input['password']),
        //     'profile_photo_path' => $input['profile_photo_path']->name
        // ]);
    }
}
