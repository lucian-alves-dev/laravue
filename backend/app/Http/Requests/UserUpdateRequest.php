<?php

namespace App\Http\Requests;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Validator;

class UserUpdateRequest extends FormRequest
{
    public static function validate(Request $request, $user)
    {
        $rules = [
            'name' => 'filled',
            'email' => 'filled|email|unique:users,email,' . $user->id,
            'password' => 'filled|min:6',
            'cellphone' => 'filled|digits_between:10,13',
        ];

        $fields = collect($request->all())->filter()->all();
        return Validator::make($fields, $rules, static::MESSAGES_PTBR);
    }
}