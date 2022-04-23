<?php

namespace App\Http\Requests;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Validator;

class UserStoreRequest extends FormRequest
{
    public static function validate(Request $request)
    {
        $rules = [
            'name' => 'required',
            'email' => 'required|email|unique:users',
            'password' => 'required|min:6',
            'cellphone' => 'required|digits_between:10,13',
        ];

        return Validator::make($request->all(), $rules, static::MESSAGES_PTBR);
    }
}