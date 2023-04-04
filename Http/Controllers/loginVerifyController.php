<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

use Illuminate\Support\Facades\DB;

class loginVerifyController extends Controller
{
    function loginVerify(Request $request)
    {
        $username = $request->input('username');
        $password = $request->input('password');
    
        $validate_credential = DB::select("SELECT * FROM user_credential WHERE username = ? and password = ?", [$username, $password]);
        $count = count($validate_credential);

        if($count > 0){
            return redirect('/login/login-verify-credential')->with('directToDashboard', 'yes');
        }

        else{
            return redirect('/login/login-verify-credential')->withErrors(['errorCredentials' => 'The username and password that you entered did not match any records']);
        }
    }
}
