<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\MainController;
use Illuminate\Http\Request;

class ShopController extends MainController
{
    //

    public function index()
    {
        return view('shop.layouts.app');
    }

}
