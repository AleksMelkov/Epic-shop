<?php

namespace App\Http\Controllers\Admin;

use App\User;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\DB;

class ClientsController extends Controller
{
    public function index() {
        $users = User::all();
        $arResult = [];
        foreach ($users as $user) {
            $arResult[$user->id]['nickName'] = $user->name;
            $arResult[$user->id]['email'] = $user->email;
            $arResult[$user->id]['first_name'] = $user->first_name ;
            $arResult[$user->id]['last_name'] = $user->last_name ;
            $arResult[$user->id]['phone_number'] = $user->phone_number ;
            $arResult[$user->id]['city'] = $user->city ;
        }
        return view('adminPanel.clients')->with('arResult', $arResult);
    }

    public function liveSearch(Request $request) {
        $users = User::where('last_name','like','%'.$request->input('referal').'%')
            ->orWhere('first_name', 'like','%'.$request->input('referal').'%')
            ->orWhere('name', 'like','%'.$request->input('referal').'%')
            ->get();
        $arResult = [];
        foreach ($users as $user) {
            $arResult[$user->id]['nickName'] = $user->name;
            $arResult[$user->id]['email'] = $user->email;
            $arResult[$user->id]['first_name'] = $user->first_name ;
            $arResult[$user->id]['last_name'] = $user->last_name ;
            $arResult[$user->id]['phone_number'] = $user->phone_number ;
            $arResult[$user->id]['city'] = $user->city ;
        }
        return view('adminPanel.clientsSearchResult')->with('arResult', $arResult);
    }

    public function liveSearchReset () {
        $users = User::all();
        $arResult = [];
        foreach ($users as $user) {
            $arResult[$user->id]['nickName'] = $user->name;
            $arResult[$user->id]['email'] = $user->email;
            $arResult[$user->id]['first_name'] = $user->first_name ;
            $arResult[$user->id]['last_name'] = $user->last_name ;
            $arResult[$user->id]['phone_number'] = $user->phone_number ;
            $arResult[$user->id]['city'] = $user->city ;
        }
        return view('adminPanel.clientsSearchResult')->with('arResult', $arResult);
    }

    public function deleteUsers (Request $request) {
        $delUsers = json_decode($request->input('checked'));
        if (isset($delUsers)) {
            foreach ($delUsers as $delUser) {
                User::where('id', $delUser)->delete();
            }
        }
        $users = User::all();
        $arResult = [];
        foreach ($users as $user) {
            $arResult[$user->id]['nickName'] = $user->name;
            $arResult[$user->id]['email'] = $user->email;
            $arResult[$user->id]['first_name'] = $user->first_name ;
            $arResult[$user->id]['last_name'] = $user->last_name ;
            $arResult[$user->id]['phone_number'] = $user->phone_number ;
            $arResult[$user->id]['city'] = $user->city ;
        }
        return view('adminPanel.clientsSearchResult')->with('arResult', $arResult);
    }
    public function updateUsers (Request $request) {
        $updUsers =(array) json_decode($request->input('inputVal'));
//        var_dump($request->input('inputVal'));
        foreach ($updUsers as $key=>$user) {
            foreach ((array) $user as $dbCol=>$updateStr) {
//                var_dump($dbCol);
//                echo '<br>';
//                var_dump($updateStr);
                DB::table('users')->where('id',$key)->update([$dbCol=>$updateStr]);
            }
        }
        $users = User::all();
        $arResult = [];
        foreach ($users as $user) {
            $arResult[$user->id]['nickName'] = $user->name;
            $arResult[$user->id]['email'] = $user->email;
            $arResult[$user->id]['first_name'] = $user->first_name ;
            $arResult[$user->id]['last_name'] = $user->last_name ;
            $arResult[$user->id]['phone_number'] = $user->phone_number ;
            $arResult[$user->id]['city'] = $user->city;
        }
        return view('adminPanel.clients')->with('arResult', $arResult);
    }

    public function updateUsersRow (Request $request) {
        $users = User::all();
        $updRows = (array) json_decode($request->input('checked'));
        $html = '';
        foreach ($users as $user) {
            $id = 'id'.$user->id;
                if (isset($updRows[$id]) && $user->id == $updRows[$id]) {
                    $html .= '<div id="'.$user->id.'" class="row updateRow">';
                    $html .= '<div class="col-1">';
                    $html .= '<input id="updateClientName" class="form-control form-control-sm" type="text" placeholder="'.$user->name.'">';
                    $html .= '<small id="nickNameHelp" class="form-text text-muted UpdateHint">Никнейм</small>';
                    $html .= '</div>';
                    $html .= '<div class="col-2">';
                    $html .= '<input id="updateClientEmail" class="form-control form-control-sm" type="text" placeholder="'.$user->email.'">';
                    $html .= '<small id="emailHelp" class="form-text text-muted UpdateHint">Email</small>';
                    $html .= '</div>';
                    $html .= '<div class="col-1">';
                    $html .= '<input id="updateClientFirstName" class="form-control form-control-sm" type="text" placeholder="'.$user->first_name.'">';
                    $html .= '<small id="nameHelp" class="form-text text-muted UpdateHint">Имя</small>';
                    $html .= '</div>';
                    $html .= '<div class="col-1">';
                    $html .= '<input id="updateClientPatronymic" class="form-control form-control-sm" type="text" placeholder="'.$user->patronymic.'">';
                    $html .= '<small id="patronymicHelp" class="form-text text-muted UpdateHint">Отчество</small>';
                    $html .= '</div>';
                    $html .= '<div class="col-1">';
                    $html .= '<input id="updateClientLastName" class="form-control form-control-sm" type="text" placeholder="'.$user->last_name.'">';
                    $html .= '<small id="lastNameHelp" class="form-text text-muted UpdateHint">Фамилия</small>';
                    $html .= '</div>';
                    $html .= '<div class="col-2">';
                    $html .= '<input id="updateClientPhoneNumber" class="form-control form-control-sm" type="text" placeholder="'.$user->phone_number.'">';
                    $html .= '<small id="phoneNumberHelp" class="form-text text-muted UpdateHint">Телефон</small>';
                    $html .= '</div>';
                    $html .= '<div class="col-1">';
                    $html .= '<input id="updateClientPassSerial" class="form-control form-control-sm" type="text" placeholder="'.$user->pass_serial.'">';
                    $html .= '<small id="passSerialHelp" class="form-text text-muted UpdateHint">Серия пасп.</small>';
                    $html .= '</div>';
                    $html .= '<div class="col-1">';
                    $html .= '<input id="updateClientPassNumber" class="form-control form-control-sm" type="text" placeholder="'.$user->pass_number.'">';
                    $html .= '<small id="passNumberHelp" class="form-text text-muted UpdateHint">Номер пасп.</small>';
                    $html .= '</div>';
                    $html .= '<div class="col-1">';
                    $html .= '<input id="updateClientPassDate" class="form-control form-control-sm" type="text" placeholder="'.$user->pass_date.'">';
                    $html .= '<small id="passDateHelp" class="form-text text-muted UpdateHint">Дата пасп.</small>';
                    $html .= '</div>';
                    $html .= '<div class="col-1">';
                    $html .= '<input id="updateClientCity" class="form-control form-control-sm" type="text" placeholder="'.$user->city.'">';
                    $html .= '<small id="cityHelp" class="form-text text-muted UpdateHint">Город</small>';
                    $html .= '</div>';
                    $html .= '</div>';
                } else {
                    $html .= '<div class="row clientsTableRow adminPanelTableRow" id="clientsTableRow-'.$user->id.'">';
                    $html .= '<div class="col-1 clientsTableCol clientsTableChecker">';
                    $html .= '<div class="form-check">';
                    $html .= '<input class="form-check-input clientsTableChecker" type="checkbox" id="clientsTableChecker-'.$user->id.'" userId="'.$user->id.'">';
                    $html .= '</div>';
                    $html .= '</div>';
                    $html .= '<div class="col-1 adminPanelTableCol clientsTableNickName">'.$user->name.'</div>';
                    $html .= '<div class="col-2 clientsTableCol clientsTableFirstName">'.$user->first_name.'</div>';
                    $html .= '<div class="col-2 clientsTableCol clientsTableLastName">'.$user->last_name.'</div>';
                    $html .= '<div class="col-2 clientsTableCol clientsTablePhone">'.$user->phone_number.'</div>';
                    $html .= '<div class="col-2 clientsTableCol clientsTableEmail">'.$user->email.'</div>';
                    $html .= '<div class="col-2 clientsTableCol clientsTableCity">'.$user->city.'</div>';
                    $html .= '</div>';
                }
        }
        $html .= '<script>';
        $html .= '$(\'#clientSaveBtn\').click(function () {
    var inputVal = \'{\';
    $(\'.updateRow\').each(function () {
        var userId = $(this).attr(\'id\');
        inputVal += \'"\'+userId+\'":{\';
        if ($(this).find(\'#updateClientName\').val() !== "") {
            inputVal += \'"name":"\'+$(this).find(\'#updateClientName\').val()+\'",\';
        }
        if ($(this).find(\'#updateClientEmail\').val()  !== "") {
            inputVal += \'"email":"\'+$(this).find(\'#updateClientEmail\').val()+\'",\';
        }
        if ($(this).find(\'#updateClientFirstName\').val() !== "") {
            inputVal += \'"first_name":"\'+$(this).find(\'#updateClientFirstName\').val()+\'",\';
        }
        if ($(this).find(\'#updateClientPatronymic\').val() !== "") {
            inputVal += \'"patronymic":"\'+$(this).find(\'#updateClientPatronymic\').val()+\'",\';
        }
        if ($(this).find(\'#updateClientLastName\').val() !== "") {
            inputVal += \'"last_name":"\'+$(this).find(\'#updateClientLastName\').val()+\'",\';
        }
        if ($(this).find(\'#updateClientPhoneNumber\').val() !== "") {
            inputVal += \'"phone_number":"\'+$(this).find(\'#updateClientPhoneNumber\').val()+\'",\';
        }
        if ($(this).find(\'#updateClientPassSerial\').val() !== "") {
            inputVal += \'"pass_serial":"\'+$(this).find(\'#updateClientPassSerial\').val()+\'",\';
        }
        if ($(this).find(\'#updateClientPassNumber\').val() !== "") {
            inputVal += \'"pass_number":"\'+$(this).find(\'#updateClientPassNumber\').val()+\'",\';
        }
        if ($(this).find(\'#updateClientPassDate\').val() !== "") {
            inputVal += \'"pass_date":"\'+$(this).find(\'#updateClientPassDate\').val()+\'",\';
        }
        if ($(this).find(\'#updateClientCity\').val() !== "") {
            inputVal += \'"city":"\'+$(this).find(\'#updateClientCity\').val()+\'"\';
        }
        inputVal += \'},\';
    });
    inputVal = inputVal.substring(0, inputVal.length - 1);
    inputVal += \'}\';
    $.ajax({
        url: \'/updateUsers\',
        type: \'POST\',
        dataType: \'HTML\',
        data: {\'inputVal\': inputVal},
        success: function (rezult) {
            $(\'#resultWrapper\').empty();
            $(\'#resultWrapper\').html(rezult);
        }
    });
});';
        $html .= '</script>';
        return $html;
    }
}
