<?php

namespace App\Http\Controllers\admin;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;

class PostsController extends Controller
{
    public function index() {
        $arResult = ['one'=>'1111', 'two'=>'2222'];
        return view('adminPanel.posts')->with('arResult', $arResult);
    }
}
