<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class PersonalDataUpdate extends Controller
{
    private $inputData = [
        'phone_number'=>'inputPhone',
        'email'=>'inputEmail',
        'first_name'=>'inputFirstName',
        'patronymic'=>'inputPatronymic',
        'last_name'=>'inputLastName',
        'pass_serial'=>'inputPassSerial',
        'pass_number'=>'inputPassNumber',
        'pass_date'=>'inputPassDate',
        'city'=>'inputCity',
    ];

    public function update(Request $request) {
        $userId = $request->userInfo;
        foreach ($this->inputData as $key=>$data) {
            $updatedString = $request->input($data);
            if (isset($updatedString)) {
                DB::table('users')->where('id', $userId)->update([$key=>$updatedString]);
            }
        }
    }
}