@extends('home.mainLayout')
@section('content')


      <!-- End Navbar -->
      <div class="content">
        <div class="container-fluid">
          <div class="row">
            <div class="col-md-8">
              <div class="card">
                <div class="card-header card-header-primary">
                  <h4 class="card-title">Profile</h4>
                </div>
                <div class="card-body">
                  
                    <div class="row">
                      <div class="col-md-6">
                        <div class="form-group">
							<table style="width:400px">
								
								<tr>
									<td><label class="bmd-label-floating"><h5>Username: </h5></label></td>
									<td><h5>{{ $users['username'] }}</h5></td>
								</tr>
								<tr>
									<td><label class="bmd-label-floating"><h5>Name: </h5></label></td>
									<td><h5>{{ $users['first_name']." ".$users['last_name']}}</h5></td>
								</tr>
								<tr>
									<td><label class="bmd-label-floating"><h5>Mail: </h5></label></td>
									<td><h5>{{ $users['email'] }}</h5></td>
								</tr>
								<tr>
									<td><label class="bmd-label-floating"><h5>Address: </h5></label></td>
									<td><h5>{{ $users['address'] }}</h5></td>
								</tr>
								<tr>
									<td><label class="bmd-label-floating"><h5>Contact Info: </h5></label></td>
									<td><h5>{{ $users['phone'] }}</h5></td>
								</tr>
								
							</table>
                        </div>
                      </div>
					 
                     
                    </div>
                    
                    <a href="{{route('user.edit', $users['username'])}}"><button class="btn btn-primary pull-right">Edit Profile</button></a>
                    <div class="clearfix"></div>
                  
                </div>
              </div>
            </div>
            <div class="col-md-4">
              <div class="card card-profile">
                <div class="card-avatar">
                  <a href="{{route('image.upload')}}">
                    <img class="img" src="{{asset('upload/' . $image->image)}}" />
                  </a>
                </div>
                <div class="card-body">
                  <h6 class="card-category text-gray">{{ $users['job'] }}</h6>
                  <h4 class="card-title">{{ $users['first_name']." ".$users['last_name']}}</h4>
                  <p class="card-description">
                    Don't be scared of the truth because we need to restart the human foundation.
                  </p>
                  
                </div>
              </div>
            </div>
          </div>
        </div>
      </div>

	@endsection

@section('title')
	Profile Page
@endsection