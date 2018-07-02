<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class PersonalOrdersController extends Controller
{
    public function index() {
        $arResult = ['one'=>'1111', 'two'=>'2222'];
        return view('personalOrders')->with('arResult', $arResult);
    }
}
