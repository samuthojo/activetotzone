<?php

namespace App\Http\Controllers;

use Illuminate\Support\Facades\Auth;
use App\Repositories\ActiveTotRepo;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Hash;

class AdminController extends Controller {

  protected $active_repo;

  public function __construct(ActiveTotRepo $repo) {
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

        return redirect()->route('admin_index');
    }

    public function change_password() {
        //$data['status'] = "";
        return view('cms.change_password');
    }

    public function change_password_form(Request $request) {
        function change_pass($request){
                $return_status = "";
                $old_password = $request->input('old_password');
                $new_password = $request->input('new_password');
                $confirm_pass = $request->input('confirm_password');
                $user = Auth::user();
                if(strcmp($new_password, $confirm_pass) == 0) {
                  if(Hash::check($new_password, $user->password)) {
                    $user->password = $new_password;
                    $user->save();
                    $return_status = "Password successfully changed";
                  } else {
                    $return_status = "Please enter the right old password";
                  }
                } else {
                  $return_status = "New passwords do not match";
                }
                return $return_status;
          }
        $status = change_pass($request);
        $feedback = array('status' => $status);
        echo json_encode($feedback);
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
