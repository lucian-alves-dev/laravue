<?php

namespace App\Validators;

use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Validator;

class UserValidator extends CustomValidator
{
    const RULES = [
        'name' => 'required',
        'email' => 'required|email',
        'password' => 'required|min:6',
        'cellphone' => 'required|digits_between:10,13',
    ];

    public static function validate(Request $request, User $user = null)
    {
        $validator = Validator::make($request->all(), static::RULES, static::MESSAGES_PTBR);

        // Manual email validation
        if($request->input('email')) {
            $query = User::where('email', $request->input('email'));
            if($user && $user->email) $query->where('id', '<>', $user->id);
            $userDuplicatedEmail = $query->first();
            if($userDuplicatedEmail) $validator->errors()->add('email', static::MESSAGES_PTBR['email.unique']);
        }

        // Hashing password after validation
        if($validator->errors()->count() == 0) {
            $validated = $validator->validated();
            $validated['password'] = password_hash($validated['password'], PASSWORD_DEFAULT);
            $validator->customValidated = $validated;
        }
    
        return $validator;
    }
}