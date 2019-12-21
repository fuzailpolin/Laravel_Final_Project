<!DOCTYPE html>

@extends('home.mainLayout')
@section('content')
<div class="content">
<div  class="CourseInfo" align="center">
			<div class="card" style="width:700px;">
			<div class="card-header card-header-primary">
				<h4 class="card-title">Assign Teacher</h4>
				
			</div>
			<div class="card-body">
			@foreach($errors->all() as $err)
					<p style="color:red;">*{{$err}} </p>
			@endforeach	
			<form method="post">
				
					
					<table style="width: 100%; padding: 15px;">
						<tr>
							<th></th>
							<th></th>
						</tr>
						<br/>
						<tr>
							<td>Teacher's Name:</td>
							<td>
							<input type="text" name="tchr_name"><br>
							</td>
						</tr>
						<tr>
							<td>
							Teacher's Username: 
							</td>
							<td>
							<input type="text" name="username"><br>
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
	Assign Teacher
@endsection