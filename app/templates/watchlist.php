<h2>Watchlist</h2>
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
<?php foreach ($movies as $movie): ?>

	
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