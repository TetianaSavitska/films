<h2>Watchlist</h2>
<?php if( empty($movies) ) {?>
	<p> You watchlist is empty, please add movies to your watchlist.</p>
<?php }else{ ?>
<table class="table">
	<thead>
		<tr>
			<th colspan="2">Movie title</th>
			<th>IMDb Rating</th>
			<th>Your rating</th>
			<th>Remove from your watchlist</th>
		</tr>
	</thead>
	<tbody>
<?php foreach ($movies as $movie): ?>

	
		<tr class="movie-item">
			<td><img class="image-item" src="<?=BASE_URL?>public/posters/<?=$movie->getImdbId()?>.jpg" alt="<?=$movie->getImdbId()?>"></td>
			<td><a href="<?=BASE_URL?>details?id=<?=$movie->getId()?>"><?=$movie->getTitle()?> (<?=$movie->getYear()?>)</a></td>
			<td><span><?= $movie->getRating()?></span><span class="rating"><i class="material-icons">star_rate</i></span></td>
			<td><span class="user-rating"><i class="material-icons">star_rate</i></span></td>
			<td>
				<a href="<?=BASE_URL?>user/watchlist?remove=true&id=<?=$movie->getId()?>">
					<button title="Remove from watchlist">
						<i class="material-icons">delete</i>
					</button>
				</a>
			</td>
		</tr>
			

	<?php endforeach;?>	

	</tbody>
</table>
<?php } ?>