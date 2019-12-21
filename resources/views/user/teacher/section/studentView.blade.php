@extends('home.mainLayout')
@section('content')


<div class="content">
<form method="post">
{{ csrf_field() }}
		<div class="input-group no-border" style="width:400px">
			<input type="text" value="" class="form-control" name="search" placeholder="Search...">
			<button type="submit" class="btn btn-white btn-round btn-just-icon" name="btnSubmit" value="search">
				<i class="material-icons">search</i>
				<div class="ripple-container"></div>
			</button>
		</div>
	<div class="user-info" align="left" style="width:1200px; left:20%">
					<table style="width: 100%; border:1px; border-collapse: collapse;">
						<tr>
							<th style="background-color: #842AAB; color: white; text-align: left;
								padding: 8px;"><h4 align="center"><h4 align="center">ID</h4></th>
							<th style="background-color: #842AAB; color: white; text-align: left;
								padding: 8px;"><h4 align="center"><h4 align="center">Studnet Name</h4></th>
							<th style="background-color: #842AAB; color: white; text-align: left;
								padding: 8px;"><h4 align="center"><h4 align="center">Gpa</h4></th>
							<th style="background-color: #842AAB; color: white; text-align: left;
								padding: 8px;"><h4 align="center"><h4 align="center">Action</h4></th>
						</tr>
						@foreach($data as $d)
								<tr>
								<td style='text-align: center;padding: 8px;'> {{$d['id']}}</td>
								<td style='text-align: center;padding: 8px;'> {{$d['std_username']}} </td>
								<td style='text-align: center;padding: 8px;'> {{$d['gpa']}}</td>
								<td style='text-align: center;padding: 8px;'> 
								<a style="background-color: #A56ABF;color: white;padding: .5em 1em;text-decoration: none;text-transform: uppercase;" href="{{route('mail.send')}}"> Send Mail </a>
								</td>
								</tr>
						@endforeach
					</table>
					<hr/>
	</div>
	<br/>
	<br/>
	<div class="card" style="width:700px;">
        <div class="card-header card-header-primary">
            <h4 class="card-title">Change Grade</h4>
            
        </div>
        <div class="card-body">
			<div class="row">
				<div class="col-md-3">
					<div class="form-group">
						<label class="bmd-label-floating">Student Username</label>
						<input type="text" class="form-control" name="std_username" value="">
					</div>
				</div>
				<div class="col-md-3">
					<div class="form-group">
						<label class="bmd-label-floating">Grade</label>
						<input type="text" class="form-control " name="grade" value="">
					</div>
				</div>
				<div class="col-md-2.5">
					<div class="form-group">
						<button type="submit" class="btn btn-primary pull-right" name="btnSubmit" value="changeGrade">
							Change Grade
						</button>
					</div>
				</div>
			</div>
		</div>
	</div>
</form>
</div>

@endsection

@section('title')
	Student View
@endsection