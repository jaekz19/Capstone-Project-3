<label>Modules: </label>
<select id="module" name="module" class="form-control">
	<option selected disabled>-Select-</option>
	@foreach($modules as $module)
	<option value='{{ $module->id }}'>{{ $module->modules }}</option>
	@endforeach
</select>
<div class="form-group" id="sub"></div>

<script type="text/javascript">
	$('#module').change(function(){
		$.get('/select/sub',
		{
			id: $('#module').val()
		},
		function(data){
			$('#sub').html(data);
		});
	});
</script>