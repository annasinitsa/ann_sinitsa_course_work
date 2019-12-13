<main class="content">
	<h1>Create new serial</h1>
	<form class="serial-form">
		<label>
			<span>Title:</span>
			<input type="text" name="title">
		</label>
		<label>
			<span>Info:</span>
			<input type="text" name="info">	
		</label>
		<label>
			<span>Genre:</span>
			<select name="genre">
				<option value="Horror">Horror</option>
				<option value="Comedy">Comedy</option>
				<option value="Drama">Drama</option>
			</select>
		</label>
		<label>
			<span>Description:</span>
			<textarea rows="10" cols="45" name="text-review"></textarea>
		</label>
		<label>
			<span>Trailer:</span>
			<input type="text" name="trailer-link">
		</label>
		<label>
			<input type="file" name="poster" class="custom-file-input"><br>
		</label>
		<button type="submit" class="serial-create-btn">CREATE</button>
	</form>
</main>