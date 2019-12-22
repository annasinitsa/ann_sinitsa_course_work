<main class="content">
    <div>
		<h1>Create my review for {{title}}</h1>
		<form class="review-form" method="post">
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
                {{#msg}}<div role="alert">{{msg}}</div>{{/msg}}
			</div>
		</form>
	</div>
</main>