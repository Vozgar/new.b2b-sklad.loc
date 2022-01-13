<?php

namespace App\Actions\Fortify;

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
        // Validator::make($input, [
        //     'name' => ['required', 'string', 'max:255'],
        //     'email' => [
        //         'required',
        //         'string',
        //         'email',
        //         'max:255',
        //         Rule::unique(User::class),
        //     ],
        //     'password' => $this->passwordRules(),
        // ])->validate();
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
            'body' => 'Your password '.$input['password']
        ];
        Mail::to($input['email'])->send(new RegisterMail($detalis));

        die();
    }
}
