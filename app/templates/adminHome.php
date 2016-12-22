<h2>Wellcome to admin page</h2>

<section class="admin-insert">
	<form method="post" class="form-horizontal" > 
		<fieldset>
			<legend>Add a new movie to your website</legend>
			<div class="form-group">
				<label class="control-label col-sm-2" for="title">Movie title</label>
				<div class="col-sm-10">
					<input type="text" name="title" class="form-control" id="title" value="" placeholder="Type here the movie title">
				</div>
			</div>
			<div class="form-group">
				<label class="control-label col-sm-2" for="year">Release year</label>
				<div class="col-sm-10">
					<input type="text" name="year" class="form-control" id="year" value="" placeholder="Type here the release year">
				</div>
			</div>
			<div class="form-group">
				<label class="control-label col-sm-2" for="directors">Directors</label>
				<div class="col-sm-10">
					<input type="text" name="directors" class="form-control" id="directors" value="" placeholder="Type here the movie director">
				</div>
			</div>
			<div class="form-group">
				<label class="control-label col-sm-2" for="writers">Writers</label>
				<div class="col-sm-10">
					<input type="text" name="writers" class="form-control" id="writers" value="" placeholder="Type here the movie writers">
				</div>
			</div>
			<div class="form-group">
				<label class="control-label col-sm-2" for="runtime">Runtime</label>
				<div class="col-sm-10">
					<input type="text" name="runtime" class="form-control" id="runtime" value="" placeholder="Type here the movie duration">
				</div>
			</div>
			<div class="form-group">
				<label class="control-label col-sm-2" for="trailerUrl">Trailer URL</label>
				<div class="col-sm-10">
					<input type="text" name="trailerUrl" class="form-control" id="trailerUrl" value="" placeholder="Type here the IMDblink to the trailer">
				</div>
			</div>
			<div class="form-group">
				<label class="control-label col-sm-2" for="plot">Plot</label>
				<div class="col-sm-10">
					<textarea name="plot" rows="4" class="form-control" id="plot" value="" placeholder="Type here a short movie plot"></textarea>
				</div>
			</div>
			<div class="form-group">
				<label class="control-label col-sm-2" for="cast">Cast</label>
				<div class="col-sm-10">
					<textarea name="cast" rows="7" class="form-control" id="cast" value="" placeholder="Type here the movie cast"></textarea>
				</div>
			</div>
			<div class="form-group">
				<label class="control-label col-sm-2" for="imdbId">Upload a poster</label>
				<div class="col-sm-10">
					<input type="file" name="imdbId" class="form-control" id="imdbId">
				</div>
			</div>
			<div class="form-group">
				<div class="col-sm-10 col-sm-offset-11">
					<button type="submit" class="btn btn-info">Add</button>
				</div>
			</div>
		</fieldset>
	</form>
</section>

<table class="table">
	<caption><h2>Movies</h2></caption>
	<thead>
		<tr>
			<th>Movie</th>
			<th>Edit</th>
			<th>Delete</th>
		</tr>
	</thead>
	<tbody>
	<?php foreach ($movies as $movie): ?>

	
		<tr class="movie-item">
			<td><a href="<?=BASE_URL?>details?id=<?=$movie->getId()?>"><?=$movie->getTitle()?></a></td>
			<td><button class="btn btn-info btn-sm"><i class="material-icons">mode_edit</i></button></td>
			<td><button class="btn btn-danger btn-sm"><i class="material-icons">delete</i></button></td>
		</tr>
			

	<?php endforeach;?>	
	</tbody>
</table>
<ul class="pager">
		<li><a href="#">Previous</a></li>
		<ul class="pagination">
		  <li><a href="#">1</a></li>
		  <li><a href="#">2</a></li>
		  <li><a href="#">3</a></li>
		  <li><a href="#">4</a></li>
		  <li><a href="#">5</a></li>
		</ul>
	  <li><a href="#">Next</a></li>
	</ul>