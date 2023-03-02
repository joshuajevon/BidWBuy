<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class ShopController extends Controller
{
    public function welcome(){
        return view('main.welcome');
    }
}
