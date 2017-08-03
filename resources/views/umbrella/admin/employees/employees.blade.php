@extends("layouts/master")

@section("title")
T-virus Admin
@endsection

@section("design")
@endsection

@section("content")
	<h1>List of Employees:</h1>
	<div class="table-responsive">
		<table class="table table-condensed table-hover">
			<thead>
				<tr>
					<th>Name</th>
					<th>Email</th>
					<th>Department</th>
					<th>Status</th>
					<th>Registration Date</th>
				</tr>
			</thead>
			<tbody>
				@foreach($emps as $emp)
				@foreach($emp->employs as $employ)
				<tr>
					<td>{{ $employ->name }}</td>
					<td>{{ $employ->email }}</td>
					<td>{{ $emp->departments }}</td>
					<td>{{ $employ->status->ustatus }}</td>
					<td>{{ $employ->created_at->toFormattedDateString() }}</td>
				</tr>
				@endforeach
				@endforeach
			</tbody>
		</table>
	</div>
@endsection

@section("scripts")

@endsection