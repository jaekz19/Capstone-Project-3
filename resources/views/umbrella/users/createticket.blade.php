@extends("layouts/master")

@section("title")
T-virus Admin
@endsection

@section("design")
@endsection

@section("content")
	<h1>Ticket Number: </h1>
	<form class="form-inline" method="POST" action='{{ url("/ticket/save") }}'>
		{{ csrf_field() }}
		<div class="form-group">
			<label>Ticket name: <input type="text" name="tname" id="tname" class="form-control"></label>
		</div>
		<div class="form-group">
			<label>Module:</label>
			<select class="form-control" name="module" id="module">
				<option disabled selected>-Select-</option>
				@foreach($modules as $mod)
				<option value='{{ $mod->id }}'>{{ $mod->modules }}</option>
				@endforeach
			</select>
		</div>
		<div class="form-group" id="sub"></div>
		<div class="form-group" id="support"></div>
		<div class="form-group">
			<label>Content: </label>
			<textarea class="form-control" name="content" id="content"></textarea>
		</div>
		<div class="form-group">
			<button class="btn btn-success" type="submit">Add</button>
		</div>
	</form>
@endsection

@section("scripts")
	$('#module').change(function(){
		$.get('/select/submod',
		{
			id: $('#module').val()
		},
		function(data){
			$('#sub').html(data);
		});
	});
@endsection