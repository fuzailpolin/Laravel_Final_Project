<?php

namespace App\Http\Controllers;

use App\Courses;
use Illuminate\Http\Request;
use Validator;
use App\User;
use Illuminate\Support\Facades\Input;

class CoursesController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
			$data = Courses::all();
			return view('course.index')->with('data', $data);
    }
	public function search(Request $req){
		$check = $req->btnSubmit;
		$item = $req->search;
		if($check=="search"){
			$data = Courses::where('course_name', 'LIKE', "%{$item}%")
				->orWhere('course_teacher', 'LIKE', "%{$item}%")
				->orWhere('course_id', 'LIKE', "%{$item}%")
				->get();
			return view('course.index')->with('data', $data);
		}
	}
    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
	public function addCourse(){
		return view('course.addCourse');
	}
	
	public function assignTeacher(){
		return view('course.assignTeacher');
	}
	
	public function storeTeacher(Request $req, $id){
		$validation = Validator::make($req->all(), [
				'username'=>'required|exists:users',
				'tchr_name'=>'required',
			]);
			if($validation->fails()){
				return back()
						->with('errors', $validation->errors())
						->withInput(Input::all());
		}
		$username = $req->username;
		$tchr_name = $req->tchr_name;
		Courses::where('course_id', $id)->update([
			'course_teacher' => $tchr_name,
			'tchr_username' => $username
			]);
		return redirect()->route('admin.viewCourse'); 
	}
    public function create()
    {
        
		
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $req)
    {
        $course = new Courses();
		$validation = Validator::make($req->all(), [
				'course_name'=>'required',
				'credit'=>'required|max:1',
			]);
			if($validation->fails()){
				return back()
						->with('errors', $validation->errors())
						->withInput();
		}
		$course->course_name = $req->course_name;
		$course->credit = $req->credit;
		if($req->course_name && $req->credit){
			if($course->save()){
				return back();
			}else{
				echo "Course not Registered";
			}
		}
		
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Courses  $courses
     * @return \Illuminate\Http\Response
     */
    public function show(Courses $courses)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Courses  $courses
     * @return \Illuminate\Http\Response
     */
    public function edit(Request $req, $id)
    {
        $course = Courses::where('course_id', $id)
					->get();
		return view('course.editCourse')->with('course', $course);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Courses  $courses
     * @return \Illuminate\Http\Response
     */
    public function update(Request $req, $id)
    {
		$c_name= $req->course_name;
		$tchr_name = $req->tchr_name;
		$tchr_username = $req->tchr_username;
		$credit = $req->credit;
        Courses::where('course_id', $id)->update([
			'course_name' => $c_name,
			'course_teacher' => $tchr_name,
			'tchr_username' => $tchr_username,
			'credit' => $credit
			]);
		return back();
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Courses  $courses
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        Courses::where('course_id', $id)
					->delete();
		return back();
    }
}
