<h1>Movies</h1>

<form method="POST" accept-charset="utf-8">
	<div class="form-group">
		<label for="keyWord"></label>
		<input type="text" name="keyWord" value="" placeholder="search your movie here..." class="form-control">
		<button class="btn" type="submit"><i class="material-icons">search</i></button>
	</div>
</form>


<form method="POST" accept-charset="utf-8">
	<div class="form-group">
		<select name="year"  class="form-control">
			<?php foreach ($moviesYears as $year): ?>
				<option value="<?= $year->getYear() ?>"><?= $year->getYear()?></option>
			<?php endforeach; ?>
		</select>
		<button class="btn" type="submit">Select</button>
	</div>
</form>

<form method="POST" accept-charset="utf-8">
	<div class="form-group">
		<select name="genre" class="form-control">
			<?php foreach ($genres as $genre): ?>
				<option value="<?= $genre->getId() ?>"><?= $genre->getName()?></option>
			<?php endforeach; ?>
		</select>
		<button class="btn" type="submit">Select</button>
	</div>
</form>


<table class="table">
	<caption>table title and/or explanatory text</caption>
	<thead>
		<tr>
			<th colspan="2">Movie title</th>
			<th>IMDb Rating</th>
			<th>Your rating</th>
			<th>Add to watchlist</th>
		</tr>
	</thead>
	<tbody>

	<?php 

		if( $moviesByKeyWord != null ){
			$moviesToShow = $moviesByKeyWord;
		}else if( $moviesByYear != null ){
			$moviesToShow = $moviesByYear;
		}else if( $moviesByGenre != null ){
			$moviesToShow = $moviesByGenre;
		}else{
			$moviesToShow = $movies;
		}

		foreach ($moviesToShow as $movie): 
	?>
		<tr class="movie-item">
			<td><img class="image-item" src="<?=BASE_URL?>public/posters/<?=$movie->getImdbId()?>.jpg" alt="<?=$movie->getImdbId()?>"></td>
			<td><a href="<?=BASE_URL?>details?id=<?=$movie->getId()?>"><?=$movie->getTitle()?> (<?=$movie->getYear()?>)</a></td>
			<td><span><?= $movie->getRating()?></span><span class="rating"><i class="material-icons">star_rate</i></span></td>
			<td><span class="user-rating"><i class="material-icons">star_rate</i></span></td>
			<td><i class="material-icons">bookmark</i></td>
		</tr>	

	<?php endforeach;?>	

	</tbody>
</table>


