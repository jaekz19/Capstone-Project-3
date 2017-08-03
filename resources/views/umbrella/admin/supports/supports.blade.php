@extends("layouts/master")

@section("title")
T-virus Admin
@endsection

@section("design")
@endsection

@section("content")
	<h1>List of Support Staff:</h1>
	<div class="table-responsive">
		<table class="table table-condensed table-hover">
			<thead>
				<tr>
					<th>Name</th>
					<th>Email</th>
					<th>Module</th>
					<th>Sub Module</th>
					<th>Status</th>
					<th>Registration Date</th>
				</tr>
			</thead>
			<tbody>
				@foreach($subs as $sub)
				@foreach($sub->supps as $supp)
				<tr>
					<td>{{ $supp->name }}</td>
					<td>{{ $supp->email }}</td>
					@foreach($supp->mods as $mod)
					<td>{{ $mod->module->modules }}</td>
					@endforeach
					<td>{{ $sub->submodules }}</td>
					<td>{{ $supp->status->ustatus }}</td>
					<td>{{ $supp->created_at->toFormattedDateString() }}</td>
				</tr>
				@endforeach
				@endforeach
			</tbody>
		</table>
	</div>
@endsection

@section("scripts")

@endsection