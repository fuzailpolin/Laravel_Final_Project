@extends('home.mainLayout')
@section('content')

<div class="content">
<form method="post">
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
								padding: 8px;"><h4 align="center"><h4 align="center">Action</h4></th>
						</tr>
							@foreach($array as $c)
								<tr>
									<td style='text-align: center;padding: 8px;'> {{$c['course_id']}}</td>
									<td style='text-align: center;padding: 8px;'> {{$c['course_name']}} </td>
									<td style='text-align: center;padding: 8px;'> {{$c['course_teacher']}}</td>
									<td style='text-align: center;padding: 8px;'> {{$c['credit']}} </td>
									<td style='text-align: center;padding: 8px;'> 
										<a style="background-color: #A56ABF;color: white;padding: .5em 1em;text-decoration: none;
											text-transform: uppercase;" href="{{route('stdCourse.add', $c['course_name'])}}"> Add </a>
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
	Student Course Register
@endsection






