<?php

namespace App\Http\Controllers;

use Illuminate\Support\Facades\Auth;
use App\Repositories\ActiveTotRepo;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Hash;

class AdminController extends Controller {

  protected $active_repo;

  public function __construct(ActiveTotRepo $repo) {
    $this->middleware('auth')->except(['admin_index', 'login', ]);
    $this->active_repo = $repo;
  }

  public function admin_index(){
      return view('admin_index');
  }

  public function login(Request $request){
      $user = $request->input('username');
      $pass = $request->input('password');

      //$credentials = $this->active_repo->load_login_credentials();
      if (Auth::attempt(['username' => $user, 'password' => $pass])) {
            // Authentication passed...
            $session_array = array(
                'username'=>$user,
                'password'=>$pass
            );
            session(['userData' => $session_array,]);
            $feedback = array('success' => 'success');
        } else{

          $feedback = array('success' => 'failure');
      }
      echo json_encode($feedback);
  }

  public function adminstart(Request $request)
    {
        if ($request->session()->has('userData')) {
            $team = $this->active_repo->get_team();
            return view('cms.main', [
              'team' => $team,
            ]);
        }else {
            return redirect()->route('admin_index');
        }
    }

    public function logout(Request $request)
    {
        Auth::logout();

        return redirect()->route('login');
    }

    public function change_password() {
        //$data['status'] = "";
        return view('cms.change_password')->with('status', '');
    }

    public function change_password_form(Request $request) {
      $params = $request->only('old_password', 'new_password',
                                          'confirm_password');
            extract($params, EXTR_PREFIX_ALL, 'from_post');
            $user = Auth::user();
            $password = $from_post_old_password;
            if(Hash::check($password, $user->password)) {
              if(strcmp($from_post_new_password,
                              $from_post_confirm_password) == 0) {
                $user->password = Hash::make($from_post_new_password);
                $user->save();
                $status = "Password changed successfully";
              } else {
                $status = "Passwords do not match";
              }
            } else {
              $status = "Please enter the right old password";
            }
            $feedback = compact('status');
            return response()->json($feedback);
    }

    public function send_email(){
        $to=$_POST["to"];
        $subject=$_POST["subject"];
        $message="My name is ".$_POST['userName']." my email is ".$_POST['email']." my phone number is ".$_POST['phonenumber']." I live around  ".$_POST['location'];
        $sender=$_POST["email"];
        $headers = 'From: '.$sender. "\r\n" .
            'Reply-To:'.$sender. "\r\n" .
            'X-Mailer: PHP/' . phpversion();

        mail($to, $subject, $message,null);

        echo json_encode("success");
    }

}
