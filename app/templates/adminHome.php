<h2>Wellcome admin</h2>

<form method="post" class="form-horizontal" > 
				<fieldset>
					<legend>A new movie</legend>
					<div class="form-group">
						<label class="control-label col-sm-2" for="imdbId">Poster name</label>
						<div class="col-sm-10">
							<input type="text" name="imdbId" class="form-control" id="imdbId" value="" placeholder="saisissez un nom">
						</div>
					</div>
					<div class="form-group">
						<label class="control-label col-sm-2" for="title">Movie title</label>
						<div class="col-sm-10">
							<input type="text" name="title" class="form-control" id="title" value="" placeholder="saisissez une adresse">
						</div>
					</div>
					<div class="form-group">
						<label class="control-label col-sm-2" for="year">Year</label>
						<div class="col-sm-10">
							<input type="text" name="year" class="form-control" id="year" value="" placeholder="saisissez un code postal">
						</div>
					</div>
					<div class="form-group">
						<label class="control-label col-sm-2" for="cast">Cast</label>
						<div class="col-sm-10">
							<input type="text" name="cast" class="form-control" id="cast" value="" placeholder="saisissez une ville">
						</div>
					</div>
					<div class="form-group">
						<label class="control-label col-sm-2" for="directors">Directors</label>
						<div class="col-sm-10">
							<input type="text" name="directors" class="form-control" id="directors" value="" placeholder="saisissez un numéro de téléphone">
						</div>
					</div>
					<div class="form-group">
						<label class="control-label col-sm-2" for="writers">Writers</label>
						<div class="col-sm-10">
							<input type="text" name="writers" class="form-control" id="writers" value="" placeholder="saisissez un fax">
						</div>
					</div>
					<div class="form-group">
						<div class="col-sm-10">
							<button type="submit" class="btn btn-info">Insert</button>
						</div>
					</div>
				</fieldset>
			</form>

<table class="table">
	<caption>table title and/or explanatory text</caption>
	<thead>
		<tr>
			<th colspan="2">Movie</th>
			<th>Edit</th>
			<th>Delete</th>
		</tr>
	</thead>
	<tbody>
<?php foreach ($movies as $movie): ?>

	
		<tr class="movie-item">
			<td><img class="image-item" src="<?=BASE_URL?>public/posters/<?=$movie->getImdbId()?>.jpg" alt="<?=$movie->getImdbId()?>"></td>
			<td><a href="<?=BASE_URL?>details?id=<?=$movie->getId()?>"><?=$movie->getTitle()?> (<?=$movie->getYear()?>)</a></td>
			<td><button><i class="material-icons">mode_edit</i></button></td>
			<td><button><i class="material-icons">delete</i></button></td>
		</tr>
			

	<?php endforeach;?>	

	</tbody>
</table>