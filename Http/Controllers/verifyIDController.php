<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

use Illuminate\Support\Facades\DB;

class verifyIDController extends Controller
{
    function verifyID(Request $request)
    { 
        $idNumber = $request->input('id-number');
    
        try{
            $validate_id = DB::select("SELECT * FROM user_information WHERE employee_id = ?", [$idNumber]);
            $count = count($validate_id);

            if($count > 0){
                $getIsExist = DB::selectOne("SELECT * FROM user_information WHERE employee_id = ?", [$idNumber]);
                $isExist = $getIsExist->is_exist;

                if($isExist == 1){
                    return redirect('/register/register-id')->withErrors(['errorID' => 'The ID Number that you have entered is already registered']);
                }

                else{
                    return redirect('/backRegisterName');
                }
            }
    
            else{
                return redirect('/register/register-id')->withErrors(['errorID' => 'The ID Number that you have entered does not exist in the records']);
            }
        }
        
        catch (\Illuminate\Database\QueryException $ex) {
            return redirect('/register/register-id')->withErrors(['erroConnection' => 'There was an error in the connection please click OK to reload']);
        }
    }
}
