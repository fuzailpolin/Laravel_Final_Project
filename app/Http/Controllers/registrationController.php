<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\User;
use App\imageModel;
use App\Http\Requests\UserRequest;
use Validator;

class registrationController extends Controller
{
    public function index(){
		return view('registration.index');
	}
	public function store(Request $req){
		$user = new User();
		
		//$validation->validate();
        $validation = Validator::make($req->all(), [
            'username'=>'required|unique:users',
            'first_name'=>'required',
            'last_name'=>'required',
			'email'=>'required|email',
            'job'=>'required',
            'password'=>'required|max:5',
			'phone'=>'required',
            'address'=>'required',
        ]);
        if($validation->fails()){
            return back()
                    ->with('errors', $validation->errors())
                    ->withInput();
		}
		if($req->password == $req->conPassword){
			$user->username = $req->username;
			$user->first_name = $req->first_name;
			$user->last_name = $req->last_name;
			$user->email = $req->email;
			$user->job = $req->job;
			$user->password = $req->password;
			$user->phone = $req->area_code.$req->phone;
			$user->address = $req->address;
			
			$timage = new imageModel();
			$timage->username = $req->username;
			$timage->image = "profile_images.jpg";
			$timage->save();
			
			if($user->save()){
				return redirect()->route('home.index');
			}else{
				//return redirect()->route('student.add');
				echo "not Registered";
			}
		}
	}
}
