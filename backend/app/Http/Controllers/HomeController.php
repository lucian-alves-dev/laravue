<?php

namespace App\Http\Controllers;

use Laravel\Lumen\Routing\Controller as BaseController;

class HomeController extends BaseController
{
    public function doc()
    {
        return response()->json(['name' => 'Abigail', 'state' => 'CA']);
    }
}
