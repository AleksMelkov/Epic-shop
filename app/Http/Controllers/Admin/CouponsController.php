<?php

namespace App\Http\Controllers\admin;

use App\Coupon;
use App\User;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\DB;

class CouponsController extends Controller
{
    public function index() {
        $arResult = array();
        $users = User::all();
        foreach ($users as $user) {
            $arResult[$user->id]['nickName'] = $user->name;
            $arResult[$user->id]['first_name'] = $user->first_name;
            $arResult[$user->id]['last_name'] = $user->last_name;
            $arResult[$user->id]['coupon'] = $user->coupon->coupon_val;
            $arResult[$user->id]['city'] = $user->city;
        }
        return view('adminPanel.coupons')->with('arResult', $arResult);
    }

    public function updateCoupons(Request $request) {
        $updCoupons = (array) json_decode($request->input('couponUpd'));
        foreach ($updCoupons as $key=>$coupon_val) {
            $coupon_id = DB::table('coupons')->where('coupon_val',$coupon_val)->value('id');
            DB::table('users')->where('id',$key)->update(['coupon_id'=>$coupon_id]);
        }
        $users = User::all();
        $arResult = array();
        foreach ($users as $user) {
            $arResult[$user->id]['nickName'] = $user->name;
            $arResult[$user->id]['first_name'] = $user->first_name;
            $arResult[$user->id]['last_name'] = $user->last_name;
            $arResult[$user->id]['coupon'] = $user->coupon->coupon_val;
            $arResult[$user->id]['city'] = $user->city;
        }
        return view('adminPanel.coupons')->with('arResult', $arResult);
    }

    public function updateCouponRow(Request $request) {
        $updRows = (array) json_decode($request->input('checked'));
        $users = User::all();
        $coupons = Coupon::all()->pluck('coupon_val');
        $html = '';
        foreach ($users as $user) {
            $id = 'id'.$user->id;
            if ($user->coupon->coupon_val > 0) {
                if (isset($updRows[$id]) && $user->id == $updRows[$id]) {
                    $html .= '<div id="'.$user->id.'" class="row updateRow adminPanelTableRow">';
                    $html .= '<div class="col-1"></div>';
                    $html .= '<div class="col-1 adminPanelTableCol">'.$user->name.'</div>';
                    $html .= '<div class="col-2 adminPanelTableCol">'.$user->first_name.'</div>';
                    $html .= '<div class="col-2 adminPanelTableCol">'.$user->last_name.'</div>';
                    $html .= '<div class="col-3 adminPanelTableCol adminPanelTableColBtns">';
                    foreach ($coupons as $coupon) {
                        if ($coupon == $user->coupon->coupon_val) {
                            $html.= '<button id="'.$coupon.'" type="button" class="btn btn-secondary btn-sm couponValBtn btnActive">'.$coupon.'%</button>';
                        } else {
                            $html.= '<button id="'.$coupon.'" type="button" class="btn btn-secondary btn-sm couponValBtn">'.$coupon.'%</button>';
                        }
                    }
                    $html .= '</div>';
                    $html .= '<div class="col-1 adminPanelTableCol">'.$user->city.'</div>';
                    $html .= '</div>';
                } else {
                    $html .= '<div id="'.$user->id.'" class="row adminPanelTableRow">';
                    $html .= '<div class="col-1 adminPanelTableChecker">';
                    $html .= '<div class="form-check">';
                    $html .= '<input class="form-check-input tableChecker" type="checkbox" value="" id="clientsTableChecker-{{$key}}" userId="{{$key}}">';
                    $html .= '</div>';
                    $html .= '</div>';
                    $html .= '<div class="col-1 adminPanelTableCol">'.$user->name.'</div>';
                    $html .= '<div class="col-2 adminPanelTableCol">'.$user->first_name.'</div>';
                    $html .= '<div class="col-2 adminPanelTableCol">'.$user->last_name.'</div>';
                    $html .= '<div class="col-3 adminPanelTableCol">'.$user->coupon->coupon_val.'%</div>';
                    $html .= '<div class="col-1 adminPanelTableCol">'.$user->city.'</div>';
                    $html .= '</div>';
                }
            }

        }
        $html .= '<script>
                          $(".couponValBtn").click(function () {
                                var parentId = $(this).closest(".updateRow").attr("id");
                                var id = "#"+parentId+" .couponValBtn";
                                $(id).removeClass("btnActive");
                                $(this).addClass("btnActive");
                          });
                          $(\'#adminPanelSaveBtn\').click(function () {
                                var couponUpd = \'{\';
                                $(\'.updateRow\').each(function () {
                                    var UserId = $(this).attr(\'id\');
                                    var couponVal = $(this).find(\'.btnActive\').attr(\'id\');
                                    couponUpd += \'"\'+UserId+\'":"\'+couponVal+\'",\';
                                });
                                couponUpd = couponUpd.substring(0, couponUpd.length - 1);
                                couponUpd += \'}\';
                                $.ajax({
                                    url: \'/updateCoupons\',
                                    type: \'POST\',
                                    dataType: \'HTML\',
                                    data: {\'couponUpd\': couponUpd},
                                    success: function (rezult) {
                                        $(\'#resultWrapper\').empty();
                                        $(\'#resultWrapper\').html(rezult);
                                    }
                                });
                          });
                </script>';
        return $html;
    }

    public function addCouponsRow() {
        $coupons = Coupon::all()->pluck('coupon_val');
        $arResult = array();
        foreach ($coupons as $coupon) {
            if ($coupon !== 0) {
                $arResult[] = $coupon;
            }
        }
        return view('adminPanel.couponsSearchAdd')->with('arResult', $arResult);
    }
}
