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
	<div class="user-info" align="left" style="width:800px; left:20%">
					<table style="width: 100%; border:1px; border-collapse: collapse;">
						<tr>
							<th style="background-color: #842AAB; color: white; text-align: left;
								padding: 8px;"><h4 align="center"><h4 align="center">ID</h4></th>
							<th style="background-color: #842AAB; color: white; text-align: left;
								padding: 8px;"><h4 align="center"><h4 align="center">Course Name</h4></th>
							<th style="background-color: #842AAB; color: white; text-align: left;
								padding: 8px;"><h4 align="center"><h4 align="center">Credit</h4></th>
							<th style="background-color: #842AAB; color: white; text-align: left;
								padding: 8px;"><h4 align="center"><h4 align="center">Action</h4></th>
						</tr>
						@foreach($data as $d)
								<tr>
								<td style='text-align: center;padding: 8px;'> {{$d['course_id']}}</td>
								<td style='text-align: center;padding: 8px;'> {{$d['course_name']}} </td>
								<td style='text-align: center;padding: 8px;'> {{$d['credit']}}</td>
								<td style='text-align: center;padding: 8px;'>
									<table style="width:80%; align:center;">
										<tr>
											<td><a style="background-color: #A56ABF;color: white;padding: .5em 1em;text-decoration: none;
													text-transform: uppercase;" href="{{route('student.view', $d['course_name'])}}"> View Students </a>
											</td>
											<td><a style="background-color: #A56ABF;color: white;padding: .5em 1em;text-decoration: none;
													text-transform: uppercase;" href="{{route('section.send', $d['course_name'])}}"> Send Notice </a>
											</td>
										</tr>
									</table>
									
								
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
	Section
@endsection