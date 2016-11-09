<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

use App\Http\Requests;
use App\Http\Requests\AdminRegisterRequest;
use App\Http\Requests\EditUserRequest;
use Redirect, Auth ,DB, Hash, DateTime;
use App\User;

class NguoiDungController extends Controller
{
	public function getList(){
		$user = User::all();
		return view('admin.user.list',compact('user'));
	}

    public function getNewList(){
        $date = new DateTime();
        $user = User::where('created_at','LIKE','%'.$date->format('Y-m-d').'%')->get();
        return view('admin.user.list',compact('user'));
    }

    public function getAdd(){
        return view('admin.user.add');
    }

    public function postAdd(AdminRegisterRequest $r){
        if ($r->rdoLevel == "Admin") {
            $level = 3;
        } else {
            $level = 2;
        }
        //echo $level;
        $user = new User;
        $user->level = $level;
        $user->name = $r->name;
        $user->password = bcrypt($r->password);
        $user->email = $r->email;
        $user->status = 1;
        $user->save(); 
        return redirect()->route('admin.users.getList')->with(['flash_message'=>'Người dùng đã được thêm thành công !!!','status'=>'success',]);
    }

    public function delete($id){
    	$usr = User::where('id',$id)->select('level')->get();
    	if ($usr[0]->level == 1) {
    		return redirect()->back()->with(['flash_message'=>'Đây là tài khoản Super Admin, không được phép xóa !!!','status'=>'danger',]);
    	} else {
    		if (Auth::user()->level == 1) {
    			DB::table('users')->where('id',$id)->delete();	
	    	} else {
	    		if (Auth::user()->level == 3) {
	    			if ($usr[0]->level == 3) {
	    				return redirect()->back()->with(['flash_message'=>'Bạn không có quyền xóa tài khoản này !!!','status'=>'danger',]);
	    			} else {
	    				DB::table('users')->where('id',$id)->delete();
	    			}
	    			
	    		} 
	    	}
    	}

    	return redirect()->back()->with(['flash_message'=>'Người dùng đã được xóa !!!','status'=>'success',]);
    		
    }

    public function getUpdate($id){
    	$user = User::where('id',$id)->get();
    	if ($user[0]->level == 1) {
            if ($user[0]->id != Auth::user()->id) {
                return redirect()->route('admin.users.getList')->with(['flash_message'=>'Đây là tài khoản Super Admin, không được phép sửa !!!','status'=>'danger',]);
            } else {
                return view('admin.user.edit',compact('user'));
            }	
    	} 
    	else {
    		if (Auth::user()->level == 1) {
    			return view('admin.user.edit',compact('user'));		
	    	} 
	    	else {
	    		if (Auth::user()->level == 3) {
	    			if ($user[0]->level == 3 && $user[0]->id != Auth::user()->id) {
	    				return redirect()->route('admin.users.getList')->with(['flash_message'=>'Bạn không có quyền sửa tài khoản này !!!','status'=>'danger',]);
	    			} else {
	    				return view('admin.user.edit',compact('user'));
	    			}
	    			
	    		} 
	    	}
    	}
    }

    public function postUpdate(EditUserRequest $r){
    	$usr = User::where('id',$r->id)->get();
    	if( $r->password == $usr[0]->password){
    		$pwd = $r->password;
    	}
    	else{
    		$pwd = bcrypt($r->password);
    	}

    	if ($r->rdoLevel == "Super Admin") {
    		$level = 1;
    	} else {
    		if ($r->rdoLevel == "Admin") {
    			$level = 3;
    		} else {
    			$level = 2;
    		}	
    	}

    	// echo $r->email;
    	//echo $usr[0]->level;
    	

    	if ($usr[0]->level == 1) {
    		return redirect()->route('admin.users.getList')->with(['flash_message'=>'Đây là tài khoản Super Admin, không được phép sửa !!!','status'=>'danger',]);
    	} else {
    		if (Auth::user()->level == 1) {
    			DB::table('users')->where('id',$r->id)->update([
    				'name' => $r->name,
    				'password' => $pwd,
    				'level' => $level,
    			]);
    			return redirect()->route('admin.users.getList')->with(['flash_message'=>'Thông tin tài khoản đã được sửa !!!','status'=>'success',]);	
	
	    	} else {
	    		if (Auth::user()->level == 3) {
	    			if ($usr[0]->level == 3 && $usr[0]->id != Auth::user()->id) {
	    				return redirect()->route('admin.users.getList')->with(['flash_message'=>'Bạn không có quyền sửa tài khoản này !!!','status'=>'danger',]);
	    			} else {
	    				DB::table('users')->where('id',$r->id)->update([
		    				'name' => $r->name,
		    				'password' => $pwd,
		    				'level' => $level,
		    			]);
		    			echo "sua no va kahach";
		    			return redirect()->route('admin.users.getList')->with(['flash_message'=>'Thông tin tài khoản đã được sửa !!!','status'=>'success',]);	
	    			}
	    			
	    		} 
	    	}
    	}
    }
}
