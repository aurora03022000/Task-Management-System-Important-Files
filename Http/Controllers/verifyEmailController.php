<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

use Illuminate\Support\Facades\DB;

use PHPMailer\PHPMailer\PHPMailer;

require_once public_path('PHPMailer/src/Exception.php');
require_once public_path('PHPMailer/src/PHPMailer.php');
require_once public_path('PHPMailer/src/SMTP.php');

class verifyEmailController extends Controller
{
    function verifyEmail(Request $request)
    { 
        $email = $request->input('email');
    
        try{
            $validate_email = DB::select("SELECT * FROM user_information WHERE email = ?", [$email]);
            $countEmail = count($validate_email);

            if($countEmail > 0){
                $get_user_id = DB::selectOne("SELECT * FROM user_information WHERE email = ?", [$email]);
                $userID = $get_user_id->user_id;

                try{
                    $token = uniqid(true);

                    $updateToken = DB::update('UPDATE user_credential SET reset_password_token = ? WHERE user_id = ?', [$token, $userID]);
                    
                    error_reporting(E_ALL);
                    ini_set('display_errors', 1);
                    
                    $url = "http://".$_SERVER["HTTP_HOST"]."/reset-password/reset-password?token=$token";
                    
                    $mail = new PHPMailer;
    
                    $mail->SMTPDebug = 0;                               // Enable verbose debug output
    
                    $mail->isSMTP();                                      // Set mailer to use SMTP
                    $mail->Host = 'smtp.gmail.com';  // Specify main and backup SMTP servers
                    $mail->SMTPAuth = true;                               // Enable SMTP authentication
                    $mail->Username = 'marlou.03022000@gmail.com';                 // SMTP username
                    $mail->Password = 'wpqyfiqhfleerhwg';                           // SMTP password
                    $mail->SMTPSecure = 'tls';                            // Enable TLS encryption, `ssl` also accepted
                    $mail->Port = 587;                                    // TCP port to connect to
    
                    $mail->From = 'marlou.03022000@gmail.com';
                    $mail->FromName = 'no-reply@ndmu.edu.ph';
                    $mail->addAddress($email);     // Add a recipient
    
                    $mail->WordWrap = 50;                                 // Set word wrap to 50 characters
                    $mail->addAttachment('/var/tmp/file.tar.gz');         // Add attachments
                    $mail->addAttachment('/tmp/image.jpg', 'new.jpg');    // Optional name
                    $mail->isHTML(true);                                  // Set email format to HTML
    
                    $mail->Subject = 'Password Reset Link';
                    $mail->Body    = "Click this <a href='$url'>link</a> to reset you password";
                    $mail->AltBody = 'This is the body in plain text for non-HTML mail clients';
    
                    if(!$mail->send()) {
                        echo 'Message could not be sent.';
                        echo 'Mailer Error: ' . $mail->ErrorInfo;
                        return redirect('/forgot-password/forgot-password-email-verify')->withErrors(['erroConnection' => 'There is an error in the connection please click OK to reload']);
                    }

                    else{
                        return redirect('/forgot-password/forgot-password-email-verify')->with('success', 'yes');
                    }
    
                }

                catch (\Illuminate\Database\QueryException $ex) {
                    return redirect('/forgot-password/forgot-password-email-verify')->withErrors(['erroConnection' => 'There was an error in the connection please click OK to reload']);
                }

            }
    
            else{
                return redirect('/forgot-password/forgot-password-email-verify')->withErrors(['errorEmail' => 'The Email that you have entered does not exist in the records']);
            }
        }
        
        catch (\Illuminate\Database\QueryException $ex) {
            return redirect('/forgot-password/forgot-password-email-verify')->withErrors(['erroConnection' => 'There was an error in the connection please click OK to reload']);
        }
    }
}
