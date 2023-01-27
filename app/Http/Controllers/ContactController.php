<?php

namespace App\Http\Controllers;

use App\Models\Gallery;
use Illuminate\Http\Request;

use PHPMailer\PHPMailer\PHPMailer;
use PHPMailer\PHPMailer\SMTP;
use PHPMailer\PHPMailer\Exception;

use Illuminate\Validation\Rule;
use App\Rules\CurrentPasswordCheckRule;
use Illuminate\Support\Facades\Hash;

use Auth;

class ContactController extends Controller
{
    public function index(){
        return view('pages.our-company');
    }

    public function gallery(){
        $galleries = Gallery::latest()->get();

        return view('pages.gallery', compact('galleries'));
    }

    public function testimonials(){
        return view('pages.testimonials');
    }

    public function contact(){
        return view('pages.contact-us');
    }

    public function services(){
        return view('pages.services');
    }

    public function update(Request $request)
    {
     $validation = \Validator::make($request->all(),[
        'name' => ['required', 'min:3']
    ]);



     if (!$validation->passes()) {
        return  response()->json([
            'status' => 0,
            'error' => $validation->errors()->toArray()
        ]);
    } else{
        auth()->user()->update($request->all());

        return response()->json([
            'status' => 1,
            'msg' => 'Profile successfully updated',
            'name' => ucwords(Auth::user()->name)
        ]);
    }
}


public function password(Request $request)
{
 $validation = \Validator::make($request->all(),[
    'old_password' => ['required', 'min:6', new CurrentPasswordCheckRule],
    'password' => ['required', 'min:6', 'confirmed', 'different:old_password'],
    'password_confirmation' => ['required', 'min:6'],
]);



 if (!$validation->passes()) {
    return  response()->json([
        'status' => 0,
        'error' => $validation->errors()->toArray()
    ]);
} else{
    auth()->user()->update(['password' => Hash::make($request->password)]);

    return response()->json([
        'status' => 1,
        'msg' => 'Password successfully updated'
    ]);
}
}

public function send(Request $request)
{
    $email = $request->email;
    $sub = 'Verify Email';



        //Load Composer's autoloader
    require '../vendor/autoload.php';

//Create an instance; passing `true` enables exceptions
    $mail = new PHPMailer(true);

           //Server settings
    $mail->SMTPDebug = SMTP::DEBUG_SERVER;                      //Enable verbose debug output
    $mail->isSMTP();                                            //Send using SMTP
    $mail->Host       = env('EMAIL_HOST');                     //Set the SMTP server to send through
    $mail->SMTPAuth   = true;                                   //Enable SMTP authentication
    $mail->Username   = env('EMAIL_USERNAME');                     //SMTP username
    $mail->Password   = env('EMAIL_PASSWORD');                               //SMTP password       
    $mail->SMTPSecure = PHPMailer::ENCRYPTION_SMTPS;            //Enable implicit TLS encryption
    $mail->Port       = 465;                                    //TCP port to connect to; use 587 if you have set `SMTPSecure = PHPMailer::ENCRYPTION_STARTTLS`

    //Recipients
    $mail->setFrom($mail->Username, 'Mailer');
    $mail->addAddress('geraldowusuansah2@gmail.com', 'Sean Twist');     //
    //Content
    $mail->isHTML(true);

    $temp = '../resources/views/welcome.blade.php';

    $me = file_get_contents($temp);

    $mail->MsgHTML($me);                                     //Set email format to HTML
    $mail->Subject = $sub;

    $mail->AddEmbeddedImage(public_path('/assets/img/') . 'favicon.png', "logo", "rocks.png");

    $msg = '
    <div style="float: right">
    <img alt="logo" src="cid:logo" width="50">
    </div>      
    <div style="float: left; clear: both;">
    <p>Hello Gerald,</p>
    <p>Thank you for signing up on Geralds Shop. Please click on the Verify Account button to verify your email and start shopping on Geralds Shop.</p>
    <center>
    <a href="{{ route(\'mail.send\')}}" style="
    border-width: 2px;
    font-weight: 400;
    font-size: 0.9571em;
    line-height: 1.35em;
    border: none;
    margin: 10px 1px;
    border-radius: 0.1875rem;
    padding: 11px 22px;
    cursor: pointer;
    background-color: #888;
    color: #FFFFFF;
    background-color: #03613b;
    border-width: 1px;
    border-radius: 30px;
    padding-right: 23px;
    padding-left: 23px;
    ">Verify Account</a>
    </center>
    <br>
    <p>If you cannot click on the Verify Account button, visit this link to verify your account: <a href="https://decraftdesign.com/email_verify/" style="
    color: #03613b;
    text-decoration: none;
    ">https://decraftdesign.com/email_verify/</a></p> 
    <p>Regards,<br>Geralds</p>
    <hr>
    <p>Geralds Shop</p>
    <a href="https://decraftdesign.com" style="
    color: #03613b;
    text-decoration: none;
    ">https://decraftdesign.com</a>
    ';

    $mail->Body    = $msg;

    $sent = $mail->send('welcome');

    if ($sent) {
        dd('sent');
    }
    else{
        dd('not sent');
    }
    return view('auth.verify');


}
}