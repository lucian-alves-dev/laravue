<?php

namespace App\Http\Controllers;

use App\Http\Responses\CustomResponse;
use Laravel\Lumen\Routing\Controller as BaseController;

class HomeController extends BaseController
{
    public function index()
    {
        return CustomResponse::success(msg: 'API is ready!');
    }
}
