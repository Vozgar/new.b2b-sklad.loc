<?php

namespace App\Actions\Fortify;

use App\Http\Controllers\Controller;
use App\Models\User;
use Illuminate\Support\Facades\Hash;
use App\Mail\RegisterMail;
use Illuminate\Support\Facades\Validator;
use Illuminate\Validation\Rule;
use Laravel\Fortify\Contracts\CreatesNewUsers;
use Illuminate\Support\Facades\Mail as Mail;

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
        Controller::setMailSettings();

        $find_user = User::where(['email' => $input['email']])->first();
        if ($find_user!=null) {
            return '2307';
        }

        $newUser = User::create([
            'name' => $input['name'],
            'email' => $input['email'],
            'password' => Hash::make($input['password']),
        ]);


        $newUser->customer_code = $input['customer_code'];

        $newUser->pass = $input['pass'];
        $newUser->user_code = $input['user_code'];
        $newUser->save();

        $detalis = [
            'title' => 'Register',
            'login' => $input['email'],
            'pass' => $input['password'],
            'name' => $input['name'],
            'body' => 'Your password '.$input['password']
        ];

        Mail::to($input['email'])->cc(setting('email_admin'))->send(new RegisterMail($detalis));

        die();
    }
}
