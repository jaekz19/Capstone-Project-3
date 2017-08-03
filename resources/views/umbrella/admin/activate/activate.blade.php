@extends("layouts/master")

@section("title")
T-virus Admin
@endsection

@section("design")
@endsection

@section("content")
	<h1>List of New Employes</h1>
	<div class="table-responsive">
		<table class="table">
			<thead>
				<tr>
					<th>Name</th>
					<th>Email</th>
					<th>Status</th>
					<th>Registered date</th>
				</tr>
			</thead>
			<tbody>
				@foreach($registers as $register)
				<tr>
					<td>{{ $register->name }}</td>
					<td>{{ $register->email }}</td>
					<td>{{ $register->status->ustatus }}</td>
					<td>{{ $register->created_at->toFormattedDateString() }}</td>
					<td style="border:none;"><a href='{{ url("/activate/{$register->id}") }}'><button class="btn btn-primary">Activate</button></a>
				</tr>
				@endforeach
			</tbody>
		</table>
	</div>
@endsection

@section("scripts")

@endsection