<?php

Use App\User;
Use App\Comment;
Use App\Department;
Use App\Employee;
Use App\Module;
Use App\Sub;
Use App\Support;
Use App\Ticket;
Use App\Tstatus;
Use App\Ustatus;
use Illuminate\Http\Request;

Auth::routes();

Route::get('/', function () {
    return redirect('/login');
});


// CHECK THE FUNCTIONS ONE AT A TIME

// Newly Registered Restriction
	Route::get('/inactive', function(){
		return view('umbrella/waiting');
	})->middleware('new');

// Common Routes and Functions (home page, add comment, and edit profile)
	Route::group(['middleware' => 'all'], function(){

		// Home Page
		Route::get('/dashboard', function(){
			return view('umbrella/home');
		});

		// Add Comment
		Route::post('/addcomment/{id}', function (request $request, $id){
			$comment = new Comment();
			$comment->ticket_id = $id;
			$comment->commentor_id = Auth::user()->id;
			$comment->comment = $request->comment;
			$comment->save();

			return back();
		});

		// Edit profile here
	});

// Admin Routes and Functions (all controls except create ticket)
	Route::group(['middleware' => 'admin'], function(){

	// Activation
		Route::get('/activate', function() {
			$registers = Ustatus::find(2)->user;
			
			return view('umbrella/admin/activate/activate',compact('registers'));
		});

		Route::get('/activate/{id}', function($id){
			$profile = User::find($id);
			$depts = Department::all();

			return view('umbrella/admin/activate/registered',compact('profile','depts'));
		});

		Route::get('/select/role', function(request $request){
			if($request->role == 'Employee'){
				$depts = Department::all();

				return view('umbrella/ajax/departmentselect',compact('depts'));

			}elseif($request->role == 'Support'){
				$modules = Module::all();

				return view('umbrella/ajax/moduleselect',compact('modules'));
			}
		});

		Route::get('/select/sub', function(request $request){
			$submods = Sub::all()->where('module_id',$request->id);

			return view('umbrella/ajax/subselect',compact('submods'));
		});

		Route::post('/activate/save{id}', function(request $request, $id){
			$update = User::find($id);
			$update->role = "User";
			$update->ustatus_id = 1;
			$update->save();

			if($request->role == 'Employee'){
				$user = User::find($id);
				$user->departs()->attach($request->depart);

				return redirect('/activate');
			}elseif ($request->role == 'Support') {
				$user = User::find($id);
				$user->mods()->attach($request->submodule);

				return redirect('/activate');
			}
		});


	// Database
		Route::get('/database', function(){
			$modules = Module::all();
			$depts = Department::all();
			return view('umbrella/admin/modulesub/module',compact('modules','depts'));
		});


	// Employees
		Route::get('/employees', function() {
			$emps = Department::with('employs')->get();

			return view('umbrella/admin/employees/employees',compact('emps'));
		});


	// Supports
		Route::get('/supports', function(){
			$subs = Sub::with('supps')->get();

			return view('umbrella/admin/supports/supports',compact('subs'));
		});


	// Tickets
		Route::get('/tickets', function(){
			$tickets = Ticket::all();
			$stats = Tstatus::all();

			return view('umbrella/admin/tickets/ticket',compact('tickets','stats'));
		});

		Route::get('/tickets/{id}', function($id){
			$contents = Ticket::find($id);
			$comments = $contents->comment()->latest()->get();

			return view('umbrella/admin/tickets/content',compact('contents','comments'));
		});
	});

// Users Routes and Functions (add ticket)
	Route::group(['middleware' => 'users'], function(){

		Route::get('/mytickets', function(){
			return view('umbrella/users/mytickets');
		});

		Route::get('/mytickets/{id}', function($id){
			$contents = Ticket::find($id);
			$comments = $contents->comment()->latest()->get();
			$stats = Tstatus::all();

			return view('umbrella/users/mycontent',compact('contents','comments','stats'));
		});

		Route::get('/ticket/create', function(){
			$modules = Module::all();

			return view('umbrella/users/createticket',compact('modules'));
		});

		Route::get('/select/submod', function(request $request){
			$submods = Module::find($request->id)->submodule;

			return view('umbrella/ajax/subselect',compact('submods'));
		});

		Route::get('/select/support', function(request $request){
			$supps = Sub::find($request->id)->supps;

			return view('umbrella/ajax/supportselect',compact('supps'));
		});

		Route::post('/ticket/save', function(request $request){
			$ticket = new Ticket();
			$ticket->tnum = count(App\Ticket::all())+1;
			$ticket->tname = $request->tname;
			$ticket->creator_id = Auth::user()->id;
			$ticket->tmod_id = $request->module;
			$ticket->tsub_id = $request->submodule;
			$ticket->supp_id = $request->supp;
			$ticket->content = $request->content;
			$ticket->tstatus_id = 1;
			$ticket->save();

			return redirect('/mytickets');
		});

		Route::post('/mytickets/status/{id}', function(request $request, $id){
			$ticket = Ticket::find($id);
			$ticket->tstatus_id = $request->ticketstatus;
			$ticket->save();

			return back();
		});
	});