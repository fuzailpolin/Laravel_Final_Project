@extends('home.mainLayout')
@section('content')

<head>
	<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">
	<script src='https://kit.fontawesome.com/a076d05399.js'></script>
</head>

      <div class="content">
        <div class="container-fluid">
          @if(session()->get('user')=='admin')
		  <div class="row">
			 
            <div class="col-lg-3 col-md-6 col-sm-6">
              <div class="card card-stats">
                <div class="card-header card-header-warning card-header-icon">
                  <div class="card-icon">
                    <!--<i class="material-icons">content_copy</i>-->
					<i class="fa fa-user" style="font-size:48px;"></i>
                  </div>
                  <p class="card-category">Total User</p>
                  <h3 class="card-title">{{$data['cuser']}}
                    <small>Users</small>
                  </h3>
                </div>
                <div class="card-footer">
                  <div class="stats">
                    <i class="material-icons">local_offer</i> 
                     <a href="{{route('reg.index')}}"> Add Users</a>
                  </div>
                </div>
              </div>
            </div>
            <div class="col-lg-3 col-md-6 col-sm-6">
              <div class="card card-stats">
                <div class="card-header card-header-success card-header-icon">
                  <div class="card-icon">
                    <i class="fas fa-chalkboard-teacher" style="font-size:48px;"></i>
                  </div>
                  <p class="card-category">Total Teachers</p>
                  <h3 class="card-title">{{$data['cTchr']}}
				  <small>Teachers</small>
				  </h3>
                </div>
                <div class="card-footer">
                  <div class="stats">
                    <i class="material-icons">local_offer</i>
					<a href="{{route('admin.viewUser', 'Teacher')}}"> Show all Teachers</a>
                  </div>
                </div>
              </div>
            </div>
            <div class="col-lg-3 col-md-6 col-sm-6">
              <div class="card card-stats">
                <div class="card-header card-header-danger card-header-icon">
                  <div class="card-icon">
                    <i class="fas fa-user-graduate" style="font-size:48px;"></i>
                  </div>
                  <p class="card-category">Total Students</p>
                  <h3 class="card-title">{{$data['cStudent']}} <small>Students</small></h3>
                </div>
                <div class="card-footer">
                  <div class="stats">
                    <i class="material-icons">local_offer</i><a href="{{route('admin.viewUser', 'Student')}}"> Show all Students</a>
                  </div>
                </div>
              </div>
            </div>
            
          </div>
		  
		  
		<div class="row">
            <div class="col-lg-3 col-md-6 col-sm-6">
              <div class="card card-stats">
                <div class="card-header card-header-warning card-header-icon">
                  <div class="card-icon">
                    <!--<i class="material-icons">content_copy</i>-->
					<i class="fas fa-book-open" style="font-size:48px;"></i>
                  </div>
                  <p class="card-category">Add Courses</p>
                  <h3 class="card-title">
                    <small>New Courses</small>
                  </h3>
                </div>
                <div class="card-footer">
                  <div class="stats">
                    <i class="material-icons">local_offer</i> 
                     <a href="{{route('course.add')}}"> Add Course</a>
                  </div>
                </div>
              </div>
            </div>
			<div class="col-lg-3 col-md-6 col-sm-6">
              <div class="card card-stats">
                <div class="card-header card-header-info card-header-icon">
                  <div class="card-icon">
                    <i class="fa fa-book" style="font-size:48px;"></i>
                  </div>
                  <p class="card-category">Courses</p>
                  <h3 class="card-title">+{{$data['cCourse']}} <small>Courses</small></h3>
                </div>
                <div class="card-footer">
                  <div class="stats">
                    <i class="material-icons">local_offer</i><a href="{{route('admin.viewCourse')}}"> Show all Courses</a>
                  </div>
                </div>
              </div>
            </div>
		</div>
		@elseif(session()->get('user')=='Teacher')
			<div class="row">
			 
            <div class="col-lg-3 col-md-6 col-sm-6">
              <div class="card card-stats">
                <div class="card-header card-header-warning card-header-icon">
                  <div class="card-icon">
                    <i class="fa fa-book" style="font-size:48px;"></i>
                  </div>
                  <p class="card-category">Total Couses</p>
                  <h3 class="card-title">{{$data['cCourse']}}
                    <small>Courses</small>
                  </h3>
                </div>
                <div class="card-footer">
                  <div class="stats">
                    <i class="material-icons">local_offer</i> 
                     <a href="{{route('section.view')}}"> Show Section</a>
                  </div>
                </div>
              </div>
            </div>
            <div class="col-lg-3 col-md-6 col-sm-6">
              <div class="card card-stats">
                <div class="card-header card-header-danger card-header-icon">
                  <div class="card-icon">
                    <i class="fas fa-user-graduate" style="font-size:48px;"></i>
                  </div>
                  <p class="card-category">Total Students</p>
                  <h3 class="card-title">{{$data['cStudent']}} <small>Students</small></h3>
                </div>
                <div class="card-footer">
                  <div class="stats">
                    <i class="material-icons">local_offer</i><a href="#"> Show all Students</a>
                  </div>
                </div>
              </div>
            </div>
            
          </div>
		@elseif(session()->get('user')=='Student')
		 <div class="row">
			 
            <div class="col-lg-3 col-md-6 col-sm-6">
              <div class="card card-stats">
                <div class="card-header card-header-warning card-header-icon">
                  <div class="card-icon">
                    <i class="fa fa-book" style="font-size:48px;"></i>
                  </div>
                  <p class="card-category">Total Couses</p>
                  <h3 class="card-title">{{$data['cStdCourse']}}
                    <small>Courses</small>
                  </h3>
                </div>
                <div class="card-footer">
                  <div class="stats">
                    <i class="material-icons">local_offer</i> 
                     <a href="{{route('stdCourse.view')}}"> Show Courses</a>
                  </div>
                </div>
              </div>
            </div>

			<div class="col-lg-3 col-md-6 col-sm-6">
				<div class="card card-stats">
					<div class="card-header card-header-warning card-header-icon">
					  <div class="card-icon">
						<i class="fas fa-award" style="font-size:48px;"></i>
					  </div>
					  <p class="card-category">CGPA</p>
					  <h3 class="card-title">{{$data['cgpa']}}
						
					  </h3>
					</div>
					<div class="card-footer">
                  <div class="stats">
                    <i class="material-icons">local_offer</i> 
                     credit Taken: {{$data['total_credit']}}
                  </div>
                </div>
				</div>
			</div>
		</div>
        @endif
         
        
        </div>
    </div>

@endsection

@section('title')
	Home Page
@endsection
     