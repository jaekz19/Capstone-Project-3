@extends("layouts/master")

@section("title")
T-virus Admin
@endsection

@section("design")
@endsection

@section("content")
	<h1>List of Tickets:</h1>
	<div class="table-responsive col-xs-9">
		<table class="table table-condensed table-hover">
			<thead>
				<tr>
					<th>Ticket Number</th>
					<th>Ticket Title</th>
					<th>Ticket Module</th>
					<th>Created By</th>
					<th>Supported By</th>
					<th>Creation Date</th>
					<th>Status</th>
				</tr>
			</thead>
			<tbody>
				@foreach($tickets as $ticket)
				<tr data-href='{{ url("/tickets/{$ticket->id}") }}' class="perticket" style="cursor: pointer">
					<td>{{ $ticket->tnum }}</td>
					<td>{{ $ticket->tname }}</td>
					<td>{{ $ticket->tmod->submodules }} / {{$ticket->tmod->module->modules}}</td>
					<td>{{ $ticket->creator->name }}</td>
					<td>{{ $ticket->supporter->name }}</td>
					<td>{{ $ticket->created_at->diffForHumans() }}</td>
					<td>{{ $ticket->tstat->tstatus }}</td>
				</tr>
				@endforeach
			</tbody>
		</table>
	</div>
	<div class="col-xs-3">
		<div class="row">
			@foreach($stats as $stat)
			<div class="col-xs-6">
				<p>{{ $stat->tstatus }}: {{ $stat->ticket->count() }}</p>
			</div>
			@endforeach
		</div>
	</div>
@endsection

@section("scripts")
	$('.perticket').click(function(){
		window.location = $(this).data("href");
	});
@endsection