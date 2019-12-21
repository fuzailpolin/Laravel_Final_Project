<?php

namespace App\Http\Controllers;

use App\noticeModel;
use App\User;
use App\std_coursesModel;
use Illuminate\Http\Request;
use Validator;

class NoticeModelController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        return view('notice.adminSend');
    }
	public function send()
    {
        return view('notice.adminSend');
    }
	
	public function sectionSend($course){
		$data = array(
			  "course" => $course, 
			);
		return view('notice.teacherSend')->with('data', $data);
	}
	public function sectionStore(Request $req, $course){
		if($req->btnButton=='send'){
			$validation = Validator::make($req->all(), [
				'subject'=>'required',
				'noticetext'=>'required',
			]);
			if($validation->fails()){
				return back()
						->with('errors', $validation->errors())
						->withInput();
			}
			if($req->noticetext && $req->subject){
				if($req->session()->get('user')=="Teacher"){
					$body = $req->noticetext;
					$sub = $req->subject;
					$username = $req->session()->get('name');
					$user = std_coursesModel::where('course_name', $course)
										->where('teacher_username', $username)
										->get();
					foreach($user as $u){
						$notice = new noticeModel();
						$notice->username = $username;
						$notice->notice = $body;
						$notice->sent_to = $u['std_username'];
						$notice->subject = $sub;
						$notice->save();
					}
					return back();
				}
			}
			else echo "Fill both subject and the notice body.";
		}
		else if($req->btnButton=='back'){
			return redirect()->route('home.index');
		}
	}
	
	public function mailIndex(){
		return view('notice.sendMail');
	}
	public function sendMail(Request $req){
		if($req->btnButton=='send'){
			$validation = Validator::make($req->all(), [
				'subject'=>'required',
				'noticetext'=>'required',
				'send_to' =>'required',
			]);
			if($validation->fails()){
				return back()
						->with('errors', $validation->errors())
						->withInput();
			}
			if($req->noticetext && $req->subject){
					$body = $req->noticetext;
					$sub = $req->subject;
					$username = $req->session()->get('name');
					$send_to = $req->send_to;
					
					$notice = new noticeModel();
					$notice->username = $username;
					$notice->notice = $body;
					$notice->sent_to = $send_to;
					$notice->subject = $sub;
					$notice->save();
					
					return back();
				
			}
			else echo "Fill both subject and the notice body.";
		}
		else if($req->btnButton=='back'){
			return redirect()->route('home.index');
		}
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

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $req)
    {
		if($req->btnButton=='send'){
			$validation = Validator::make($req->all(), [
				'subject'=>'required',
				'noticetext'=>'required',
			]);
			if($validation->fails()){
				return back()
						->with('errors', $validation->errors())
						->withInput();
			}
			if($req->noticetext && $req->subject){
				if($req->session()->get('user')=="admin"){
					$body = $req->noticetext;
					$sub = $req->subject;
					$username = $req->session()->get('name');
					$user = User::all();
					foreach($user as $u){
						$notice = new noticeModel();
						$notice->username = $username;
						$notice->notice = $body;
						$notice->sent_to = $u['username'];
						$notice->subject = $sub;
						$notice->save();
					}
					return back();
				}
			}
			else echo "Fill both subject and the notice body.";
		}
		else if($req->btnButton=='back'){
			return redirect()->route('home.index');
		}
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\noticeModel  $noticeModel
     * @return \Illuminate\Http\Response
     */
    public function show(Request $req)
    {
        
		$notices = noticeModel::where('sent_to', $req->session()->get('name'))
				->get();
		return view('notice.noticeView')->with('notices', $notices);
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\noticeModel  $noticeModel
     * @return \Illuminate\Http\Response
     */
    public function edit(noticeModel $noticeModel)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\noticeModel  $noticeModel
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, noticeModel $noticeModel)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\noticeModel  $noticeModel
     * @return \Illuminate\Http\Response
     */
    public function destroy(noticeModel $noticeModel)
    {
        //
    }
}
