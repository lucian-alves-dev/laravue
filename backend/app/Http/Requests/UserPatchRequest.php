<?php

namespace App\Http\Requests;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Validator;

class UserPatchRequest extends FormRequest
{
    public static function validate(Request $request)
    {
        $rules = [
            'name' => 'filled',
            'email' => 'filled|email|unique:users,email,' . $request->input('id'),
            'password' => 'filled|min:6',
            'cellphone' => 'filled|digits_between:10,13',
        ];

        return Validator::make($request->all(), $rules, static::MESSAGES_PTBR);
    }
}