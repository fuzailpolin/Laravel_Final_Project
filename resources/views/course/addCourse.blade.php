<!DOCTYPE html>

@extends('home.mainLayout')
@section('content')
<div class="content">
<div  class="CourseInfo" align="center">
		<div class="card" style="width:700px;">
			<div class="card-header card-header-primary">
				<h4 class="card-title">Add Course</h4>
				
			</div>
			<div class="card-body">	
			@foreach($errors->all() as $err)
					<p style="color:red;">*{{$err}} </p>
			@endforeach	
			<form method="post">
				
					{{ csrf_field() }}
					<table style="width: 100%; padding: 15px;">
						<tr>
							<th></th>
							<th></th>
						</tr>
						
						<tr>
							<td>Couse's Name:</td>
							<td>
							<input type="text" name="course_name"><br>
							</td>
						</tr>
						<tr>
							<td>
							Credit: 
							</td>
							<td>
							<input type="text" name="credit"><br>
							</td>
						</tr>
						
					</table>	
				
				<br>
				<br>
				
				<hr style="width: 530px;" align="center">
				<button class="btn btn-primary pull-center" name="btnButton" value="Submit">Submit</button>
				<br>
				
			</form>
		</div>
	</div>
	</div>
</div>	
@endsection

@section('title')
	Profile Page
@endsection