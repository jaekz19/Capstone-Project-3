@extends("layouts/master")

@section("title")
T-virus Admin
@endsection

@section("design")
@endsection

@section("content")
	<h1>Ticket number {{ $contents->tnum }}</h1>
	<div class="col-xs-9">
		<div class="panel panel-primary">
			<div class="panel-heading">
				<h4>Title: {{ $contents->tname }}</h4>
			</div>
			<div class="panel-body">
				<h4>Content:</h4>
				<p>{{ $contents->content }}</p>
			</div>
			<div class="panel-footer">
				<form method="POST" action="/addcomment/{{ $contents->id }}">
					{{csrf_field()}}
					<input type="text" name="comment" placeholder="Add Comment..." class="form-control">
				</form>
				<h4>Conversation:</h4>
				<div class="row">
					@foreach($comments as $comment)
					<p class="col-xs-3">{{ $comment->commentor->name }}</p>
					<p class="col-xs-9">{{ $comment->comment }}</p>
					@endforeach
				</div>
			</div>
		</div>
	</div>
@endsection

@section("scripts")

@endsection