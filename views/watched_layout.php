<main>
	<div class="posters-section">
		<section class="sort-order-wrap">
			<label>List type</label>
			<select name="list-type">
			    <option value="opt1" {{#opt1}}selected{{/opt1}}>Watched</option>
				<option value="opt2" {{#opt2}}selected{{/opt2}}>Favorite</option>
				<option value="opt3" {{#opt3}}selected{{/opt3}}>To watch</option>
			</select>
		</section>
		<section class="posters-table">
            {{#list}}
            <a href="../serial.php?title={{title}}"><img src="{{poster}}" alt="{{title}}" class="poster"></a>
            {{/list}}
        </section>
		<a href="../list_of_watched.txt" download="list_of_watched.txt">DOWNLOAD LIST</a>
	</div>
</main>