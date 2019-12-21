@extends('home.mainLayout')
@section('content')
      <!-- End Navbar -->
      <div class="content">
        <div class="container-fluid">
          <div class="row">
            <div class="col-md-8">
              <div class="card">
                <div class="card-header card-header-primary">
                  <h4 class="card-title">Edit Course</h4>
                  <p class="card-category">Complete Course Information</p>
                </div>
				@foreach($course as $c)
                <div class="card-body">
                  <form method="post">
                    <div class="row">
                      <div class="col-md-5">
                        <div class="form-group">
                          <label class="bmd-label-floating">University </label>
                          <input type="text" class="form-control" disabled>
                        </div>
                      </div>
                    </div>
					<div class="row">
                      <div class="col-md-5">
                        <div class="form-group">
                          <label class="bmd-label-floating">Course Name </label>
                          <input type="text" class="form-control" name="course_name" value="{{ $c['course_name']}}">
                        </div>
                      </div>
                    </div>
                    <div class="row">
                      <div class="col-md-6">
                        <div class="form-group">
                          <label class="bmd-label-floating">Teacher's Name</label>
                          <input type="text" class="form-control" name="tchr_name" value="{{ $c['course_teacher']}}">
                        </div>
                      </div>
                      <div class="col-md-6">
                        <div class="form-group">
                          <label class="bmd-label-floating">Teacher's Username</label>
                          <input type="text" class="form-control " name="tchr_username" value="{{ $c['tchr_username']}}">
                        </div>
                      </div>
                    </div>
                    <div class="row">
                      <div class="col-md-12">
                        <div class="form-group">
                          <label class="bmd-label-floating">Credit</label>
                          <input type="text" class="form-control" name="credit" value="{{ $c['credit'] }}">
                        </div>
                      </div>
                    </div>
                    @endforeach
					<button class="btn btn-primary pull-right">Save</button>
                    <div class="clearfix"></div>
                  </form>
                </div>
              </div>
            </div>
          </div>
        </div>
      </div>

	@endsection

@section('title')
	Edit Course
@endsection