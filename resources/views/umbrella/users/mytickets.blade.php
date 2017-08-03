@extends("layouts/master")

@section("title")
T-virus Admin
@endsection

@section("design")
@endsection

@section("content")
	@if (count(Auth::user()->departs) == 1)
		<a href="/ticket/create" style="position: fixed;bottom:20px;right: 30px;z-index: 99;"><button class="btb btn-primary btn-lg" style="border-radius: 100%;border:none;"><i class="fa fa-pencil"></i></button></a>
	@endif
@endsection

@section("scripts")

@endsection