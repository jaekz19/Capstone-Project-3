@extends("layouts/master")

@section("title")
T-virus Admin
@endsection

@section("design")
@endsection

@section("content")
	@if(count(Auth::user()->departs) == 1)
		<h1>My Tickets:</h1>
		<div class="table-responsive col-xs-9">
			<table class="table table-condensed table-hover">
				<thead>
					<tr>
						<th>Ticket Number</th>
						<th>Ticket Title</th>
						<th>Ticket Module</th>
						<th>Supported By</th>
						<th>Creation Date</th>
						<th>Status</th>
					</tr>
				</thead>
				<tbody>
					@foreach(Auth::user()->ticket as $ticket)
					<tr style="cursor: pointer">
						<td>{{ $ticket->tnum }}</td>
						<td>{{ $ticket->tname }}</td>
						<td>{{ $ticket->tmod->submodules }} / {{$ticket->tmod->module->modules}}</td>
						<td>{{ $ticket->supporter->name }}</td>
						<td>{{ $ticket->created_at->diffForHumans() }}</td>
						<td>{{ $ticket->tstat->tstatus }}</td>
					</tr>
					@endforeach
				</tbody>
			</table>
		</div>
	@elseif(count(Auth::user()->mods) == 1)
		<h1>My Tickets:</h1>
		<div class="table-responsive col-xs-9">
			<table class="table table-condensed table-hover">
				<thead>
					<tr>
						<th>Ticket Number</th>
						<th>Ticket Title</th>
						<th>Created By</th>
						<th>Creation Date</th>
						<th>Status</th>
					</tr>
				</thead>
				<tbody>
					@foreach(Auth::user()->sticket as $ticket)
					<tr style="cursor: pointer">
						<td>{{ $ticket->tnum }}</td>
						<td>{{ $ticket->tname }}</td>
						<td>{{ $ticket->creator->name }}</td>
						<td>{{ $ticket->created_at->diffForHumans() }}</td>
						<td>{{ $ticket->tstat->tstatus }}</td>
					</tr>
					@endforeach
				</tbody>
			</table>
		</div>
	@endif
	@if (count(Auth::user()->departs) == 1)
		<a href="/ticket/create" style="position: fixed;bottom:20px;right: 30px;z-index: 99;"><button class="btb btn-primary btn-lg" style="border-radius: 100%;border:none;"><i class="fa fa-pencil"></i></button></a>
	@endif
@endsection

@section("scripts")

@endsection