<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\facades\DB;
use App\User;
use Validator;

class loginController extends Controller
{
    public function index(){
		return view('login.index');
	}
	
	public function verify(Request $req){
		$validation = Validator::make($req->all(), [
            'username'=>'required',
            'pass'=>'required',
        ]);
        if($validation->fails()){
            return back()
                    ->with('errors', $validation->errors())
                    ->withInput();
		}
		
		$user = User::where('username', $req->username)
					->where('password', $req->pass)
					->first();
					
		if(count($user) > 0 ){
	
			$req->session()->put('name', $req->input('username'));
			$req->session()->put('user', $user->job);
			echo "login Done";
			
			return redirect()->route('home.index');
			
		}else{
			$req->session()->flash('msg', 'invalid username/password');
			//return redirect('/login');
		}
	}
}
