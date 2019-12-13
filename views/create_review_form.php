<main class="content">
    <div>
		<h1>Create my review</h1>
		<form class="review-form">
			<label>
				<span>	Review: </span>
				<textarea rows="30" cols="100" name="text-review"></textarea><br>
			</label>
			<div>
				<label>
					<span>	Author's name: </span>
					<input type="text" size="10" name="author" id="author-input">
				</label>
				<label>
					<span>	Rating: </span>
					<input type="number" size="3" name="rating" min="1" max="10" value="10" id="rating-input">
				</label>
				<button type="submit" class="review-save-btn">SEND</button>
			</div>
		</form>
	</div>
</main>