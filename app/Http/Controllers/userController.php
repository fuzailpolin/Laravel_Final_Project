<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\User;
use App\imageModel;
use App\Courses;
use App\noticeModel;
use App\std_coursesModel;


class userController extends Controller
{
	public function index(Request $req){
		if($req->session()->get('user')=='admin'){
			$users = User::all();
			$count = count($users);
			$teacher = User::where('job', 'Teacher')
						->get();
			$cTeacher = count($teacher);
			$std = User::where('job', 'Student')
						->get();
			$cStd = count($std);
			$course = Courses::all();
			$cCourse = count($course);
			
			$notice = noticeModel::where('sent_to', $req->session()->get('name'))
						->get();
			$cNotice = count($notice);
			$req->session()->put('cNotice', $cNotice);
			//return $count;
			$data = array(
			  "cuser" => $count,
			  "cTchr" => $cTeacher,
			  "cStudent" => $cStd,
			  "cCourse" => $cCourse,
			  
			);
			//return view('home.adminDashboard')->with('users', $data, 'notices', $notice);
			return view('home.userDashboard', compact('data','notice'));
		}
		else if($req->session()->get('user')=='Teacher'){
			$notice = noticeModel::where('sent_to', $req->session()->get('name'))
					->get();
			$cNotice = count($notice);
			$req->session()->put('cNotice', $cNotice);
			
			$course = Courses::where('tchr_username', $req->session()->get('name'))
						->get();
			$cCourse = count($course);
			$student = std_coursesModel::where('teacher_username', $req->session()->get('name'))
					->get();
			$cStudent = count($student);
			$data = array(
			  "cStudent" => $cStudent,
			  "cCourse" => $cCourse,
			  
			);
			return view('home.userDashboard')->with('data', $data);
		}
		else if($req->session()->get('user')=='Student'){
			$notice = noticeModel::where('sent_to', $req->session()->get('name'))
					->get();
			$cNotice = count($notice);
			$req->session()->put('cNotice', $cNotice);
			
			/* $course = Courses::where('tchr_username', $req->session()->get('name'))
						->get();
			$cCourse = count($course); */
			$stdCourse = std_coursesModel::where('std_username', $req->session()->get('name'))
					->get();
			$cStdCourse = count($stdCourse);
			$cgpa = 0;
			$temp = 0;
			$ans =0;
			$credit = 0;
			foreach($stdCourse as $c){
				$temp_c = (double)$c['credit'];
				$temp_gpa = $c['gpa'];
				switch($temp_gpa){
					case "A+":
						$temp = 4.00;
						break;
					case "A":
						$temp = 3.75;
						break;
					case "B+":
						$temp = 3.50;
						break;
					case "B":
						$temp = 3.25;
						break;
					case "C+":
						$temp = 3.00;
						break;	
					case "C":
						$temp = 2.75;
						break;
					case "D+":
						$temp = 2.50;
						break;
					case "D":
						$temp = 2.25;
						break;
					case "F":
						$temp = 0.00;
						break;
					default:
						$temp = 0.00;
				}
				$ans = $temp * $temp_c;
				$cgpa = $cgpa + $ans;
				$credit += $temp_c; 
			}
			if($credit>0)$cgpa = $cgpa/$credit;
			$data = array(
			  "cStdCourse" => $cStdCourse,
			  "total_credit" => $credit,
			  "cgpa" => $cgpa,
			);
			return view('home.userDashboard')->with('data', $data);
		}
	}
    public function profile(Request $req){
		$image = "";
		$users = User::where('username', $req->session()->get('name'))
					->first(); 
		$image = imageModel::where('username', $req->session()->get('name'))
					->first();
		//return $user;
		return view('user.userProfileView', compact('users','image'));
	}
	public function edit(Request $req, $id){
		$image = "";
		$users = User::where('username', $id)
					->first();
		$image = imageModel::where('username', $req->session()->get('name'))
					->first();
		return view('user.userEdit', compact('users','image'));
	}
	
	public function update(Request $req){
		$f_name = $req->f_name;
		$l_name = $req->l_name;
		$email = $req->email;
		$address = $req->address;
		User::where('username', $req->session()->get('name'))->update([
						'first_name' => $f_name,
						'last_name' => $l_name,
						'email' => $email,
						'address' => $address
						]);
			return back();
	}
	
	public function imgUpload(){
		return view('home.photoUpload');
	}
	
	public function imgStore(Request $req){
		$image = imageModel::where('username', $req->session()->get('name'))
					->first();
		if(count($image) < 1){
			$timage = new imageModel();
			$timage->username = $req->session()->get('name');
			if($req->hasFile('image')){
				$file = $req->file('image');
				$filename= $file->getClientOriginalName();
				$file->move('upload', $file->getClientOriginalName());
				$timage->image = $filename;
				
			}else{
				echo "upload fail";
			}
			
			if($timage->save()){
				return back();
			}else{
				//return redirect()->route('student.add');
				echo "Image store failed!";
			}
		}
		else{
			$image="";
			if($req->hasFile('image')){
				$file = $req->file('image');
				$filename= $file->getClientOriginalName();
				$file->move('upload', $file->getClientOriginalName());
				$image = $filename;
				
			}else{
				echo "upload fail";
			}
			imageModel::where('username', $req->session()->get('name'))->update([
						'image' => $image
						]);
			return back();
		}
	}
	
	public function destroy($id){
		User::where('id', $id)
					->delete();
		return back();
	}
}
