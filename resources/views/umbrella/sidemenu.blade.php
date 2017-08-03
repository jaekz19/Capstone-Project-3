<div class="sidemenu">
	<p>Umbrella Corp.</p>
	<a href='/dashboard'>
		<span class="fa fa-home"></span> 
		Dashboard
	</a>
	<br>
	<a href='#'>
		<span class="fa fa-user"></span>
		My Profile
	</a>
	@if (Auth::user()->role == 'Admin')
	<br>
	<a href='/tickets'>
		<span class="fa fa-ticket"></span> 
		Tickets
	</a>
	<br>
	<a href='/employees'>
		<span class="fa fa-group"></span> 
		Employees
	</a>
	<br>
	<a href='/supports'>
		<span class="fa fa-vcard"></span> 
		Supports
	</a>
	<br>
	<a href='/database'>
		<span class="glyphicon glyphicon-hdd"></span>
		Database
	</a>
	<br>
	<a href='/activate'>
		<span class="fa fa-user-plus"></span> 
		Activation
	</a>
	@elseif (Auth::user()->role == 'User')
	<br>
	<a href="/mytickets">
		<span class="fa fa-ticket"></span>
		My Tickets
	</a>
	@endif
</div>