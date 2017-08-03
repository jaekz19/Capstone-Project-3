@extends("layouts/master")

@section("title")
T-virus Admin
@endsection

@section("design")
@endsection

@section("content")
	@foreach($modules as $module)
	<h2>{{ $module->modules }}</h2>
	@foreach($module->submodule as $sub)
	<h3>{{ $sub->submodules }}</h3>
	@endforeach
	@endforeach
	<h1>Departments</h1>
	@foreach($depts as $dept)
	<h2>{{ $dept->departments }}</h1>
	@endforeach
@endsection

@section("scripts")

@endsection