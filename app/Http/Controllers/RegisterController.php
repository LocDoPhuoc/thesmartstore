<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

use App\Http\Requests\RegisterRequest;
use App\Http\Requests\AdminRegisterRequest;
use Redirect;
use App\User;
use Auth;
use Session;

class RegisterController extends Controller
{

	public function create(){
		return view('smartstore.register');
	}

    public function store(RegisterRequest $r){
    	$user = new User;
    	$user->level = 2;
    	$user->name = $r->name;
    	$user->password = bcrypt($r->password);
    	$user->email = $r->email;
        $user->status = 1;
    	$user->save(); 

        if(Auth::attempt(['email' => $r->email, 'password' => $r->password])){
            return Redirect::to(Session::get('url'));
        }
        else{
            return redirect('/home');
        }
        
    }

    
}
