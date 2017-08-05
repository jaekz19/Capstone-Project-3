<label>Department: </label>
<select id="depart" name="depart" class="form-control">
	<option selected disabled>-Select-</option>
	@foreach($depts as $dept)
	<option value='{{ $dept->id }}'>{{ $dept->departments }}</option>
	@endforeach
</select>