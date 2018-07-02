<?php

namespace App\Http\Controllers\admin;

use App\User;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;

class CouponsController extends Controller
{
    public function index() {
        $arResult = array();
        $users = User::all();
        foreach ($users as $user) {
            $arResult[$user->id]['nickName'] = $user->name;
            $arResult[$user->id]['first_name'] = $user->first_name ;
            $arResult[$user->id]['last_name'] = $user->last_name ;
            $arResult[$user->id]['coupon'] = $user->coupon->coupon_val;
            $arResult[$user->id]['city'] = $user->city ;
        }
        return view('adminPanel.coupons')->with('arResult', $arResult);
    }
}
