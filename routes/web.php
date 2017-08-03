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

// Common Routes and Functions
	Route::group(['middleware' => 'all'], function(){
		Route::get('/dashboard', function(){
			return view('umbrella/home');
		});

		// Edit profile here
	});

// Admin Routes and Functions
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

				return view('umbrella/admin/activate/departmentselect',compact('depts'));
			}elseif($request->role == 'Support'){
				$modules = Module::all();

				return view('umbrella/admin/activate/moduleselect',compact('modules'));
			}
		});

		Route::get('/select/sub', function(request $request){
			$submods = Sub::all()->where('module_id',$request->id);

			return view('umbrella/admin/activate/subselect',compact('submods'));
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

			return view('umbrella/admin/tickets/content',compact('contents'));
		});
	});

// Users Routes and Functions
	Route::group(['middleware' => 'users'], function(){
		Route::get('/mytickets', function(){
			return view('umbrella/users/mytickets');
		});

		Route::get('/ticket/create', function(){
			$modules = Module::all();

			return view('umbrella/createticket',compact('modules'));
		});

		// Route::post('/ticket/save', function(request $request){
		// 	$ticket = new Ticket();
		// 	$ticket->tnum = count(Ticket::all())+1;
		// 	$ticket->tname = $request->tname;
		// 	$ticket->creator_id = Auth::user()->id;
		// 	$ticket->tmod_id = $request->module;
		// 	$ticket->tsub_id = $request->submodule;
		// 	$ticket->supp_id = rand(Sub::with('supps'));
		// 	$ticket->content = $ticket->content;
		// 	$ticket->tstatus_id = 1;
		// });
	});