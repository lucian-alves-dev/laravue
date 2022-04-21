<?php

namespace App\Http;

use Illuminate\Http\JsonResponse;

class CustomResponse 
{
    public static function error(array $errors = null, string $msg = null, string $code = null)
    {
        $response = ['status' => 'error'];
        if($msg) $response['msg'] = $msg;
        if($code) $response['code'] = $code;
        if($errors) $response['errors'] = $errors;
        return new JsonResponse($response, 400);
    }

    public static function success(mixed $content = null, string $msg = null, string $code = null)
    {
        $response = ['status' => 'success'];
        if($msg) $response['msg'] = $msg;
        if($code) $response['code'] = $code;
        if($content) $response['content'] = $content;
        return new JsonResponse($response, 200);
    }
}