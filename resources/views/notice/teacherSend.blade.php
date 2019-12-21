<!DOCTYPE html>

@extends('home.mainLayout')
@section('content')

<div class="content">
	<div  class="CourseInfo" align="center">
		<div class="card" style="width:700px;">
			<div class="card-header card-header-primary">
				<h4 class="card-title">Send Notice</h4>
				
			</div>
			<div class="card-body">	
				<form method="post">
					<fieldset style="width: 600px;" align="center">
						<table style="width: 100%; padding: 15px;">
							<tr>
								<th></th>
								<th></th>
							</tr>
							<tr>
								<td>Course: </td>
								<td>{{$data['course']}}</td>
							</tr>
							<tr>
								<td>Subject:</td>
								<td>
									<input type="text" name="subject" style="width: 300px"><br><br>
								</td>
							</tr>
							<tr>
								<td>
									Notice: 
								</td>
								<td>
									<textarea name="noticetext" rows="10" cols="60">  </textarea>
								</td>
							</tr>
							
						</table>
			@foreach($errors->all() as $err)
					<p style="color:red;">*{{$err}} </p>
			@endforeach							
					</fieldset>
					<br>
					<br>
					
					<hr style="width: 530px;" align="center">
					<button class="btn btn-primary pull-center" name="btnButton" value="back">Back</button>
					<button class="btn btn-primary pull-center" name="btnButton" value="send">Send</button>
					<br>
					
				</form>
			</div>
		</div>
	</div>
</div>
		
@endsection

@section('title')
	Send Notice
@endsection