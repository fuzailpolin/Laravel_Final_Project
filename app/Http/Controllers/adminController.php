<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\User;
use App\noticeModel;
use Illuminate\Support\Arr;
use App\Courses;
use App\imageModel;

class adminController extends Controller
{
	public function view($job){
		if($job=='Teacher' || $job =="Student"){
			$data = User::where('job', $job)
					->get();
			return view('home.showUsers')->with('data', $data);
		}
		else if($job == 'all'){
			$users = User::all();
			return view('home.showUsers')->with('data', $users);
		}
	}
	public function action(Request $req){
		$check = $req->btnSubmit;
		$item = $req->search;
		if($check=="search"){
			$data = User::where('username', 'LIKE', "%{$item}%")
				->orWhere('first_name', 'LIKE', "%{$item}%")
				->orWhere('last_name', 'LIKE', "%{$item}%")
				->get();
				
			return view('home.showUsers')->with('data', $data);
		}
	}
	
}
