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

  public function login(Request $request) {
      $credentials = $request->only('username', 'password');
      if(Auth::attempt($credentials)) {
        $request->session()->regenerate();
        $feedback = ['success' => 'success', ];
      } else {
        $feedback = ['success' => 'failure', ];
      }
      return response()->json($feedback);
    }

  public function adminstart(Request $request)
    {
        $team = $this->active_repo->get_team();
        return view('cms.main', [
          'team' => $team,
        ]);
    }

    public function logout(Request $request)
    {
        Auth::logout();
        $request->session()->invalidate();
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

}
