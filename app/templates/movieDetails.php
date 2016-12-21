<h2>
	<?=$movie->getTitle()?>
</h2>

<section class="row">
	<div class="col-md-4">
		<img class="movie-image" src="<?=BASE_URL?>public/posters/<?=$movie->getImdbId()?>.jpg" alt="<?=$movie->getImdbId()?>">
	</div>
	<div class="col-md-8">
		<p>
			<span class="movie-hd">Rating: </span>
			<span><?= $movie->getRating()?></span>
			<span class="rating"><i class="material-icons">star_rate</i></span>
			<span><?= $movie->getVotes()?></span>
		</p>
		<p>
			<span class="movie-hd">Rate this movie: </span><span class="user-rating"><i class="material-icons">star_rate</i></span>
		</p>
		<p>
			<span class="movie-hd">Directors: </span><?=$movie->getDirectors()?>
		</p>
		<p>
			<span class="movie-hd">Writers: </span> <?=$movie->getWriters()?>
		</p>
		<p>
			<span class="movie-hd">Run time: </span> <?=$movie->getRuntime()?>
		</p>
		<p>
			<span class="movie-hd">Created: </span> <?=$movie->getDateCreated()?>
		</p>
		<p>
			<span class="movie-hd">Plot: </span><?=$movie->getPlot()?>
		</p>
		<p>
			<a href="<?=$movie->getTrailerUrl()?>">Watch trailer</a> 
		</p>
	</div>
</section>

<section class="row">
	<article>
		<p>
			<span class="movie-hd">Cast: </span> <?=$movie->getCast()?>
		</p>
	</article>
</section>









