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
		<?php if( !empty($_SESSION['user']) ) : ?>
			<p>
				<span class="icons">
					<span class="movie-hd"><?= !in_array($movie, $_SESSION['user'] ->getWatchlist()) ? "Add to" : "Remove from" ?> your watchlist: </span>
					<a  href="<?=BASE_URL?>details?id=<?=$movie->getId()?>&watchlist=<?=$watchlist?>" name="watchlist">
						<i class="material-icons">
							<?= !in_array($movie, $_SESSION['user'] ->getWatchlist()) ? "bookmark" : "delete" ?>
						</i>
					</a>
				</span>
				<span class="icons">
					<span class="movie-hd">Share: </span>
					<a  href="<?=BASE_URL?>details?id=<?=$movie->getId()?>" name="share" title="Share" >
						<i class="material-icons">share</i>
					</a>
				</span>
				<span class="icons">
					<span class="movie-hd">Rate this movie: </span>
					<a  href="<?=BASE_URL?>details?id=<?=$movie->getId()?>" name="rate" title="Rate" >
						<i class="material-icons">star</i>
					</a>
				</span>
			</p>
		<?php endif; ?>
	</div>
</section>

<section class="row">
	<article>
		<p>
			<span class="movie-hd">Cast: </span> <?=$movie->getSeparatedCast()?>
		</p>
	</article>
</section>









