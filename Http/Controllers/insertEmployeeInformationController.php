<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

use Illuminate\Support\Facades\DB;

class insertEmployeeInformationController extends Controller
{
    function insertEmployeeInformation(Request $request)
    {
        // dd($request);
        $employee_id = $request->input('hidden_id_number');
        $firstName = $request->input('hidden_first_name');
        $middleName = $request->input('hidden_middle_name');
        $lastName = $request->input('hidden_last_name');
        $suffix = $request->input('hidden_suffix');
        $email = $request->input('email');

        date_default_timezone_set('Asia/Manila');
        $dateNow = date('Y-m-d');

        $chars = 'abcdefghijklmnopqrstuvwxyzABCDEFGHIJKLMNOPQRSTUVWXYZ0123456789';
        $shuffledChars = str_shuffle($chars);
        $password = substr($shuffledChars, 0, 8);

        if($middleName == ""){
            $middleName = "";
        }

        if($suffix == ""){
            $suffix = "";
        }

        try{
            $token = uniqid(true);

            $updateInformation = DB::update('UPDATE user_information SET first_name = ?, middle_name = ?, last_name = ?, suffix = ?, email = ?, is_exist = ? WHERE employee_id = ?', [$firstName, $middleName, $lastName, $suffix, $email, 1, $employee_id]);
            
            $getUserID = DB::selectOne('SELECT * FROM user_information WHERE employee_id = ?', [$employee_id]);
            $userID = $getUserID->user_id;

            $insertCredential = DB::insert('INSERT INTO user_credential (user_id, username, password, date_created, reset_password_token) VALUES (?, ?, ?, ?, ?)', [$userID, $employee_id, $password, $dateNow, $token]);

            return redirect('/register/register-email')->with('directToLogin', 'yes');
        }

        catch (\Illuminate\Database\QueryException $ex) {
            return redirect('/register/register-email')->withErrors(['erroConnection' => 'There is an error in the connection please click OK to reload']);
        }
    }
}
