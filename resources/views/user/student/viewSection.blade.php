@extends('home.mainLayout')
@section('content')


<div class="content">
<form method="post">
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
								padding: 8px;"><h4 align="center"><h4 align="center">Course Name</h4></th>
							<th style="background-color: #842AAB; color: white; text-align: left;
								padding: 8px;"><h4 align="center"><h4 align="center">Course Teacher</h4></th>
								<th style="background-color: #842AAB; color: white; text-align: left;
								padding: 8px;"><h4 align="center"><h4 align="center">Credit</h4></th>
								<th style="background-color: #842AAB; color: white; text-align: left;
								padding: 8px;"><h4 align="center"><h4 align="center">gpa</h4></th>
								<th style="background-color: #842AAB; color: white; text-align: left;
								padding: 8px;"><h4 align="center"><h4 align="center">Semester</h4></th>
								<th style="background-color: #842AAB; color: white; text-align: left;
								padding: 8px;"><h4 align="center"><h4 align="center">Action</h4></th>
						</tr>
						@foreach($data as $d)
								<tr>
									<td style='text-align: center;padding: 8px;'> {{$d['id']}}</td>
									<td style='text-align: center;padding: 8px;'> {{$d['course_name']}} </td>
									<td style='text-align: center;padding: 8px;'> {{$d['teacher_name']}}</td>
									<td style='text-align: center;padding: 8px;'> {{$d['credit']}} </td>
									<td style='text-align: center;padding: 8px;'> {{$d['gpa']}}</td>
									<td style='text-align: center;padding: 8px;'> {{$d['semester']}}</td>
									<td style='text-align: center;padding: 8px;'> 
										<a style="background-color: #A56ABF;color: white;padding: .5em 1em;text-decoration: none;
											text-transform: uppercase;" href="{{route('course.drop', $d['course_name'])}}"> Drop </a>
									</td>
								</tr>
						@endforeach
					</table>
					<hr/>
	</div>
</form>
</div>

@endsection

@section('title')
	Student Course View
@endsection