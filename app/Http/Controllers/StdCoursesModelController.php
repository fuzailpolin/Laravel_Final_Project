<?php

namespace App\Http\Controllers;

use App\std_coursesModel;
use App\Courses;
use Illuminate\Http\Request;
use Illuminate\Support\Arr;

class StdCoursesModelController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index(Request $req)
    {
        $course = Courses::where('tchr_username', $req->session()->get('name'))
					->get();
		return view('user.teacher.section.sectionView')->with('data', $course);
    }
	
	public function showStudent($course){
		$data = std_coursesModel::where('course_name', $course)
					->get();
		return view('user.teacher.section.studentView')->with('data', $data);
	}

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        //
    }
	public function stdCourse(Request $req){
		$data = std_coursesModel::where('std_username', $req->session()->get('name'))
								->get();
		return view('user.student.viewSection')->with('data', $data);
	}
	public function registerCourse(Request $req){
		$courses = Courses::all();
		$data = std_coursesModel::where('std_username', $req->session()->get('name'))
								->get();
		$array = [];
		$i=0;
		foreach($courses as $c){
			$flag = 0;
			foreach($data as $d){
				if($c['course_name'] == $d['course_name']){
					$flag=1;
				}
			}
			if($flag==0){
				$array = Arr::add($array,$i, $c);
			}
			$i = $i+1;
		}
		//return $array;
		return view('course.studentCourseRegister')->with('array', $array);
	}
	
	public function addCourse(Request $req, $course){
		$data = Courses::where('course_name', $course)
					->first();
		$std_course = new std_coursesModel();
		$std_course->course_name = $course;
		$std_course->std_username = $req->session()->get('name');
		$std_course->teacher_name = $data['course_teacher'];
		$std_course->teacher_username = $data['tchr_username'];
		$std_course->credit = $data['credit'];
		$std_course->semester = "fall";
		if($std_course->save()){
				return back();
			}else{
				//return redirect()->route('student.add');
				echo "not Registered";
		}
	}
	
	public function dropCourse(Request $req, $course){
		std_coursesModel::where('course_name', $course)
						->where('std_username', $req->session()->get('name'))
						->delete();
		return back();
	}
    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        //
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\std_coursesModel  $std_coursesModel
     * @return \Illuminate\Http\Response
     */
    public function show(std_coursesModel $std_coursesModel)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\std_coursesModel  $std_coursesModel
     * @return \Illuminate\Http\Response
     */
    public function edit(std_coursesModel $std_coursesModel)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\std_coursesModel  $std_coursesModel
     * @return \Illuminate\Http\Response
     */
	public function sectionSearch(Request $req){
		$item = $req->search;
		$data = Courses::where('course_name', 'LIKE', "%{$item}%")
				->orWhere('course_id', 'LIKE', "%{$item}%")
				->get();
		return view('user.teacher.section.sectionView')->with('data', $data);
	}
    public function studentCourseUpdate(Request $req, $course)
    {
        if($req->btnSubmit=='search'){
			$item = $req->search;
			/* $data = std_coursesModel::where('std_username', 'LIKE', "%{$item}%")
				->orWhere('id', 'LIKE', "%{$item}%")
				->get(); */
				
			$data = std_coursesModel::where(function ( $query)use($item, $course) {
						$query->where('std_username', 'LIKE', "%{$item}%")
							->where('course_name', $course);
					})
					->orWhere(function($query)use($item, $course) {
						$query->where('id', 'LIKE', "%{$item}%")
							->where('course_name', $course);	
					})
					->get();
				
			return view('user.teacher.section.studentView')->with('data', $data);
		}
		else if($req->btnSubmit=='changeGrade'){
			$std_username = $req->std_username;
			$grade = $req->grade;
			std_coursesModel::where('std_username', $std_username)->update([
							'gpa' => $grade,
							]);
			return back();
		}
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\std_coursesModel  $std_coursesModel
     * @return \Illuminate\Http\Response
     */
    public function destroy(std_coursesModel $std_coursesModel)
    {
        //
    }
}
