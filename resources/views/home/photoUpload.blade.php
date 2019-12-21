<!DOCTYPE html>

@extends('home.mainLayout')
@section('content')



<div class="content">
<div  class="CourseInfo" align="center">
	<div class="card" style="width:700px;">
			<div class="card-header card-header-primary">
				<h4 class="card-title">Insert Image</h4>
				
			</div>
			<div class="card-body">
			<div style="width:400px;height:200px;top:30%;left:20%;">
			<form method="post" enctype="multipart/form-data">
				<br/><input type="file" name="image" ><br/>
				<input type="submit" name = "submit" value="Submit">
				<br/>
			</form>
		</div>
		</div>
	</div>
</div>
</div>
@endsection

@section('title')
	Profile Page
@endsection