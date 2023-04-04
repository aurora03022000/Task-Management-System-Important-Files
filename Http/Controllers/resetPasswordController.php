<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

use Illuminate\Support\Facades\DB;

class resetPasswordController extends Controller
{
    function resetPassword(Request $request)
    {
        if(isset($_GET["token"])){
            $token = $_GET['token'];
            $newToken = uniqid(true);
            
            $newPassword = $request->input('new_password');

            $updatePassword = DB::update('UPDATE user_credential SET password = ?, reset_password_token = ? WHERE reset_password_token = ?', [$newPassword, $newToken ,$token]);

            return redirect('/reset-password/reset-password-success?token=' . $token)->with('successReset', 'yes');
        }

        else{ ?>
            <script>
                window.parent.location = '{{ route('reset-password-error-request') }}';
            </script>
        <?php }
    }
} ?>
