<?php

namespace App\Http\Requests;

class FormRequest
{
    const MESSAGES_PTBR = [
        'required' => "Faltando o campo ':attribute'.",
        'email' => "O e-mail está mal formatado.",
        'email.unique' => "Já existe um cadastro com este mesmo e-mail.",
        'min' => "':attribute' deve possuir pelo menos :min caracteres.",
        'max' => "':attribute' deve possuir no máximo :max caracteres.",
        'digits_between' => "':attribute' deve possuir apenas números e ser composto de :min a :max dígitos.",
        'password' => "A senha deve conter no mínimo 6 caracteres",
    ];
}