<label>Support: </label>
<select id="supp" name="supp" class="form-control">
	<option selected disabled>-Select-</option>
	@foreach($supps as $supp)
	<option value='{{ $supp->id }}'>{{ $supp->name }}</option>
	@endforeach
</select>