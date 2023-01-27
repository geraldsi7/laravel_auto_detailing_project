<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

use App\Models\{User, PasswordReset};
use Auth;
use Hash;
use PHPMailer\PHPMailer\PHPMailer;
use PHPMailer\PHPMailer\SMTP;
use PHPMailer\PHPMailer\Exception;

class PasswordResetController extends Controller
{
   public function __construct()
   {
    $this->middleware(['guest']);
}

public function index()
{
    return view('auth.passwords.email');
}

public function sendResetLink(Request $request)
{
    $this->validateEmail($request);

    $u = uniqid();
    $n = 20;

    $token = bin2hex(random_bytes($n)) . $u . bin2hex(random_bytes($n));

    $email = $request['email'];

    PasswordReset::updateOrCreate([
        'email' => $email,
    ],
    [
        'token' => $token,
    ]);

    $user = PasswordReset::where('email', $email)->first();

    $this->sendMail($request, $email,  $token);

    return view('auth.reset',compact('user'));
}

public function show($token)
{
    $tokenData = PasswordReset::where('token', $token)->first();

    if ($tokenData) {
        return view('auth.passwords.reset')->with(
            ['token' => $token, 'email' => $tokenData->email]
        );
    }
    else{
        return redirect()->route('login');
    }
}

public function store(Request $request)
{
    $this->validateEmailPassword($request);

    $email = $request['email'];

    $findEmail = User::where('email', $email)->first();

    $findEmail->update([
        'password' => Hash::make($request['password']),
    ]);

    if (Auth::attempt([
        'email' => $email, 'password' => $request['password']
    ])) {
        PasswordReset::where('token', $request['token'])->delete();
        return redirect()->intended('/');
    }

}


public function validateEmail($request)
{
    $request->validate([            
        'email'     => 'required | email | exists:users,email'
    ],
    [
        'email.exists' => 'We can\'t find a user with this email address',
    ]);
}

public function validateEmailPassword($request)
{
    $request->validate([            
        'email'     => 'required | email | exists:users,email',
        'password' => 'required|confirmed|min:8'
    ]
);
}

public function sendMail(Request $request, $email, $token)
{

    $sub = 'Password Reset';



        //Load Composer's autoloader
    require '../vendor/autoload.php';

//Create an instance; passing `true` enables exceptions
    $mail = new PHPMailer(true);
    try {
           //Server settings
    $mail->SMTPDebug = 0;                      //Enable verbose debug output
    $mail->isSMTP();                                            //Send using SMTP
    $mail->Host       = env('EMAIL_HOST');                     //Set the SMTP server to send through
    $mail->SMTPAuth   = true;                                   //Enable SMTP authentication
    $mail->Username   = env('EMAIL_USERNAME');                     //SMTP username
    $mail->Password   = env('EMAIL_PASSWORD');                               //SMTP password       


    $mail->SMTPSecure = PHPMailer::ENCRYPTION_SMTPS;            //Enable implicit TLS encryption
    $mail->Port       = 465;                                    //TCP port to connect to; use 587 if you have set `SMTPSecure = PHPMailer::ENCRYPTION_STARTTLS`

    //Recipients
    $mail->setFrom($mail->Username, 'DeCraft');
    $mail->addAddress($email);     //
    //Content
    $mail->isHTML(true);                //Set email format to HTML
    $mail->Subject = $sub;

    $mail->AddEmbeddedImage(public_path('/assets/img/') . 'favicon.png', "logo", "logo.png");

    $msg = '
    <div style="padding: 0 15px 0 15px; font-size: 1.1em; color: #000 !important;">
    <div style="float: right">
    <img alt="logo" src="cid:logo" width="100">
    </div>      
    <div style="float: left; clear: both;">
    <p style="color: #000 !important;">Hi,
    <br>   
    You are receiving this email as a result of requesting a password reset. In order to reset your password please click on the "Reset Password" button.</p>
    <center>
    <a href="https://decraftdesign.com/password_reset/token/' . $token .'" style="
    border-width: 2px;
    line-height: 5em;
    font-weight: bold;
    background-color: #000;
    color: #FFFFFF;
    border-radius: 0;
    padding: 1em 6em;
    ">Reset Password</a>
    <p style="font-size: 0.9em; color: #000 !important;">Reset links expire after 2 hours.</p>
    </center>
    <p style="color: #000 !important;">If you cannot access the "Reset Password" button, visit this link: <a href="https://decraftdesign.com/password_reset/token/' . $token .'" style="
    color: #000;
    font-weight: 900;
    text-decoration: none;
    ">https://decraftdesign.com/password_reset/token/' . $token .'</a></p> 
    <p style="font-size: 1em; color: #000 !important;">If you did not make this request, just ignore this email as nothing has changed.</p>
    <p style="color: #000 !important;">
    Thanks,
    <br>
    DeCraft
    </p>
    </div>
    </div>
    ';

    $mail->Body    = $msg;

    $mail->send();

}
catch (Exception $e) {
    echo "Message could not be sent. Mailer Error: {$mail->ErrorInfo}";
}

}
}
