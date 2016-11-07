<?php

namespace App\Http\Controllers\Auth;

use App\Http\Controllers\Controller;
use Illuminate\Foundation\Auth\AuthenticatesUsers;
use App\Http\Requests\LoginRequest;
use App\Http\Requests;
use Session;

class LoginController extends Controller
{
    /*
    |--------------------------------------------------------------------------
    | Login Controller
    |--------------------------------------------------------------------------
    |
    | This controller handles authenticating users for the application and
    | redirecting them to your home screen. The controller uses a trait
    | to conveniently provide its functionality to your applications.
    |
    */

    use AuthenticatesUsers;

    /**
     * Where to redirect users after login / registration.
     *
     * @var string
     */
    protected $redirectTo = '/home';

    /**
     * Create a new controller instance.
     *
     * @return void
     */
    public function __construct()
    {
        $this->middleware('guest', ['except' => 'logout']);
    }

    public function getLogin(){
        return view('smartstore.login');
    } 

    public function getAdminLogin(){
        return view('admin.login');
    }  



    // public function postLogin(LoginRequest $r){
    //     if($this::attempt(['email' => $r->email, 'password' => $r->password])){
    //         if () {
    //             # code...
    //         } else {
    //             # code...
    //         }
            
    //          return Redirect::to(Session::get('url'));
    //     }else{
    //          return redirect()->back()->with(['flash_message'=>'Thao tac khong thanh cong!!!']);
    //     }
    // }
}
