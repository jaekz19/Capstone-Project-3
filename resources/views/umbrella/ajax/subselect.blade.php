<label>Sub Modules: </label>
<select id="submodule" name="submodule" class="form-control">
	<option selected disabled>-Select-</option>
	@foreach($submods as $subs)
	<option value='{{ $subs->id }}'>{{ $subs->submodules }}</option>
	@endforeach
</select>

<script type="text/javascript">
	$('#submodule').change(function(){
		$.get('/select/support',
		{
			id: $('#submodule').val()
		},
		function(data){
			$('#support').html(data);
		});
	});
</script>