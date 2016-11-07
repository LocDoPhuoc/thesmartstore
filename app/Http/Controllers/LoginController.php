<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Http\Requests;
use Redirect;
use App\Http\Requests\LoginRequest;
use Illuminate\Support\Facades\Auth;
use Session;
class LoginController extends Controller
{

    public function getLogin(){
        return view('smartstore.login');
    }

    public function getAdminLogin(){
        return view('admin.login');
    }  

    public function postLogin(LoginRequest $r){
    
        if(Auth::attempt(['email' => $r->email, 'password' => $r->password],true)){
           
            return Redirect::to(Session::get('url'));
                      
        }else{
            return redirect()->back()->with(['flash_message'=>'Thao tac khong thanh cong!!!']);
        }
  
    }

    public function postAdminLogin(LoginRequest $r){
    
        if(Auth::attempt(['email' => $r->email, 'password' => $r->password,'level'=>1], true)||Auth::attempt(['email' => $r->email, 'password' => $r->password,'level'=>3], true)){
            return redirect('ploc1411_admin');
            
        }else{
            return redirect()->back()->with(['flash_message'=>'Thao tac khong thanh cong!!!']);
        }
  
    }
}
