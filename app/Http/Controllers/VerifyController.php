<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\{User, VerifyUser};
use Auth;
use Hash;
use PHPMailer\PHPMailer\PHPMailer;
use PHPMailer\PHPMailer\SMTP;
use PHPMailer\PHPMailer\Exception;

class VerifyController extends Controller
{
    public function index(VerifyUser $user)
    {
        return view('auth.verify', compact('user'));
    }

    public function store(Request $request)
    {
        $this->validates($request);
        
        $u = uniqid();
        $n = 20;
        
        $r = bin2hex(random_bytes($n)) . $u . bin2hex(random_bytes($n));

        $email = $request['email'];

        $name = ucwords($request['name']);

        VerifyUser::updateOrCreate([
            'email' => $email
        ],
        [
            'name' => $name,
            'email' => $email,
            'password' => $request['password'],
            'token' => $r,
        ]);

        $user = VerifyUser::where('email', $email)->first();

        $this->sendMail($request, $name, $email,  $r);

        return view('auth.verify',compact('user'));
    }

    public function show($token)
    {
        $tokenData = VerifyUser::where('token', $token)->first();

        if ($tokenData) {
            User::create([
                'name' => $tokenData->name,
                'email' => $tokenData->email,
                'password' => Hash::make($tokenData->password),
                'orders' => 0,
            ]);

            if (Auth::attempt(['email' => $tokenData->email, 'password' => $tokenData->password])) {
                VerifyUser::where('id', $tokenData->id)->delete();
                return redirect()->intended('/');
            }
        }
        else{
            return redirect()->route('login');
        }
    }

    public function update(Request $request, VerifyUser $user)
    { 
        $u = uniqid();
        $n = 20;
        
        $r = bin2hex(random_bytes($n)) . $u . bin2hex(random_bytes($n));

        $input = $request->all();

        $input['token'] = $r;

        $user->fill($input)->save();

        $this->sendMail($request, $user->name, $user->email, $r);

        return redirect()->route('verify.index', compact('user'))->withStatus(__('A new verification link has been sent to your email address.')); 
    }

    public function sendMail(Request $request, $name, $email, $r)
    {

        $sub = 'Verify Email';



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
    $mail->Password   = env('EMAIL_PASSWORD');

    $mailName         = env('EMAIL_NAME');                               //SMTP password       
    $mail->SMTPSecure = PHPMailer::ENCRYPTION_SMTPS;            //Enable implicit TLS encryption
    $mail->Port       = 465;                                    //TCP port to connect to; use 587 if you have set `SMTPSecure = PHPMailer::ENCRYPTION_STARTTLS`

    //Recipients
    $mail->setFrom($mail->Username, $mailName);
    $mail->addAddress($email, $name);     //
    //Content
    $mail->isHTML(true);                //Set email format to HTML
    $mail->Subject = $sub;

    $mail->AddEmbeddedImage(public_path('/assets/img/') . 'favicon.png', "logo", "logo.png");

    $msg = '
    <div style="padding: 0 15px 0 15px; font-size: 1.1em; color: #000 !important;">
    <div style="float: right">
    <img alt="logo" src="cid:logo" width="50">
    </div>      
    <div style="float: left; clear: both;">
    <p style="color: #000 !important;">Hello ' . $name . ',
    <br>   
    There\'s one quick step you need to complete before creating your account. Please click on the "Verify Account" button to verify your email and get started on your new account.</p>
    <center>
    <a href="{{ route(\'verify.show\',$r) }}" style="
    border-width: 2px;
    line-height: 5em;
    font-weight: bold;
    background-color: #888;
    color: #FFFFFF;
    background-color: #03613b;
    border-radius: 30px;
    padding: 1em 6em;
    ">Verify Account</a>
    <p style="font-size: 0.9em; color: #000 !important;">Verification links expire after 2 hours.</p>
    </center>
    <p style="color: #000 !important;">If you cannot access the "Verify Account" button, visit this link to verify your account: <a href="{{ route(\'verify.show\',$r) }}" style="
    color: #03613b;
    text-decoration: none;
    ">{{ route(\'verify.show\',$r) }}</a></p> 
    <p style="color: #000 !important;">
    Thanks,
    <br>
    NOA Enterprise
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

public function validates($request)
{
    $request->validate([
         'name' => ['required', 'string', 'max:255'],
            'email' => ['required', 'string','max:255', 'unique:users', 'unique:verify_users'],
            'password' => ['required', 'string', 'min:8', 'confirmed'],
    ]);
}

}
