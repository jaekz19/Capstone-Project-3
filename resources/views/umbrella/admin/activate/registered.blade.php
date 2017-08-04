@extends("layouts/master")

@section("title")
T-virus Admin
@endsection

@section("design")
@endsection

@section("content")
	<form class="form-inline" method="POST" action='{{ url("/activate/save{$profile->id}") }}'>
		{{ csrf_field() }}
		<h1><strong>Profile: </strong>{{ $profile->name }}</h1>
		<h2><strong>Email: </strong>{{ $profile->email }}</h2>
		<h3><strong>Registration Date: </strong>{{ $profile->created_at->toFormattedDateString() }}</h3>
		<h3><strong>Role: </strong>
			<select id="role" name="role" class="form-control">
				<option disabled selected>-Select-</option>
				<option value="Employee">Employee</option>
				<option value="Support">Support</option>
			</select>
		</h3>
		<div class="form-group" id="nextselect"></div>
		<button id="savebtn" style="display: hidden;" class="btn btn-success" type="submit"><i class="fa fa-save"></i></button>
	</form>
@endsection

@section("scripts")
	$('#role').change(function(){
		$.get('/select/role',
		{
			role: $('#role').val()
		},
		function(data){
			$('#nextselect').html(data);
		});
	});
@endsection