<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

use Illuminate\Support\Facades\DB;

class backController extends Controller
{
    function backRegisterID(Request $request)
    { 
        return redirect('/register/register-id')->with('backRegisterID', 'no');
    }

    function backPressedRegisterID(Request $request)
    { 
        return redirect('/register/register-id')->with('backRegisterID', 'yes');
    }

    function backRegisterName(Request $request)
    { 
        return redirect('/register/register-name')->with('backRegisterName', 'no');
    }

    function backPressedRegisterName(Request $request)
    { 
        return redirect('/register/register-name')->with('backRegisterName', 'yes');
    }

    function backRegisterEmail(Request $request)
    { 
        return redirect('/register/register-email')->with('backRegisterEmail', 'no');
    }

    function backPressedRegisterEmail(Request $request)
    { 
        return redirect('/register/register-email')->with('backRegisterEmail', 'yes');
    }
}
