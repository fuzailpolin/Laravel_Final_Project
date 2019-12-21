<!DOCTYPE html>

@extends('home.mainLayout')
@section('content')
<div class="content">
@foreach($notices as $n)
					<table>
						<tr>
							<th></th>
							<th></th>
						</tr>
						
							<td>
								Notice:  
							</td>
							<td>
								<textarea name="noticetext" rows="4" cols="100">
									Subject: {{$n['subject']}} 
									Details: {{$n['notice']}}
								</textarea>
							</td>
						</tr>
						
						
					</table>	
					@endforeach
</div>
@endsection

@section('title')
	View Notice
@endsection