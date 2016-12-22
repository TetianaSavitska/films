<h2>
	<?=$movie->getTitle()?> (<?=$movie->getYear()?> )
</h2>

<section class="row movie-description">
	<div class="col-md-3">
		<img class="movie-image" src="<?=BASE_URL?>public/posters/<?=$movie->getImdbId()?>.jpg" alt="<?=$movie->getImdbId()?>">
	</div>
	<div class="col-md-9">
		<p>
			<span class="movie-hd">Rating: </span>
			<span class="rating"><i class="material-icons">star</i></span>
			<span><?= $movie->getRating()?></span>
		</p>
		<p>
			<span class="movie-hd">Votes: </span>
			<span><?= $movie->getVotes()?></span>
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
			<a href="<?=$movie->getTrailerUrl()?>">Watch a trailer</a> 
		</p>
		<p>
			<span class="movie-hd">Add to your watchlist: </span><span class="icons" title="Add to a watchlist"><i class="material-icons">bookmark</i></span>
			<span class="movie-hd">Share: </span><span class="icons" title="Share"><i class="material-icons">share</i></span>
			<span class="movie-hd">Rate this movie: </span><span class="icons" title="Rate" class="user-rating"><i class="material-icons">star_rate</i></span>
		</p>
	</div>
</section>

<section class="row">
	<article>
		<p>
			<span class="movie-hd">Cast: </span> <?=$movie->getSeparatedCast()?>
		</p>
	</article>
</section>









