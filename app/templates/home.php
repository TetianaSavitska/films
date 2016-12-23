
<section>
	<div class="col-md-4">
		<form method="POST" accept-charset="utf-8" class="form-horizontal" >
			<div class="form-group">
				<div class="col-sm-10">
					<input type="text" name="keyWord" value="" placeholder="Search your movie here..." class="form-control">
				</div>
				<button class="btn btn-md btn-info col-sm-2" type="submit"><span class="glyphicon glyphicon-search"></span></button>
			</div>
		</form>
	</div>


	<div class="col-md-4">
		<form method="POST" accept-charset="utf-8" class="form-horizontal">
			<div class="form-group">
				<div class="col-sm-10">
					<select name="year"  class="form-control">
						<option value="" disabled selected>Search by release year</option>
						<?php foreach ($moviesYears as $year): ?>
							<option value="<?= $year->getYear() ?>"><?= $year->getYear()?></option>
						<?php endforeach; ?>
					</select>
				</div>
				<button class="btn btn-info col-sm-2" type="submit">Select</button>
			</div>
		</form>
	</div>

	<div class="col-sm-4">
		<form method="POST" accept-charset="utf-8" class="form-horizontal">
			<div class="form-group">
				<div class="col-sm-10">
					<select name="genre" class="form-control">
						<option value="" disabled selected>Search by a movie genre</option>
						<?php foreach ($genres as $genre): ?>
							<option value="<?= $genre->getId() ?>"><?= $genre->getName()?></option>
						<?php endforeach; ?>
					</select>
				</div>
				<button class="btn btn-info col-sm-2" type="submit">Select</button>
			</div>
		</form>
	</div>
</section>

<?php if ($movies != null){ ?>


<table class="table">
	<caption>
		<h2>Movies</h2>
		<ul class="pagination">
			<li class=<?=$currentPage != 1 ? "": "disabled"?>><a href="?page=<?=$currentPage -1 ?>">Previous</a></li>
			<li class=<?=$currentPage != ceil($moviesCount/$numPerPage)? "": "disabled"?> ><a href="?page=<?=$currentPage +1 ?>">Next</a></li>
		</ul>
		<p>Resulst #<?=$numPerPage*($currentPage-1)+1?> to #<?=$numPerPage*$currentPage +1?> from <?= $moviesCount ?> movies</p>
	</caption>
	<thead>
		<tr>
			<th colspan="2">Movie title</th>
			<th>IMDb Rating</th>
			<?php if( !empty($_SESSION['user']) ) : ?>
				<th>Your rating</th>
				<th>Watchlist</th>
			<?php endif; ?>
		</tr>
	</thead>
	<tbody>
	
		<?php foreach ($movies as $movie): ?>
			<tr class="movie-item">
				<td><img class="image-item" src="<?=BASE_URL?>public/posters/<?=$movie->getImdbId()?>.jpg" alt="<?=$movie->getImdbId()?>"></td>
				<td><a href="<?=BASE_URL?>details?id=<?=$movie->getId()?>"><?=$movie->getTitle()?> (<?=$movie->getYear()?>)</a></td>
				<td><span class="rating"><i class="material-icons">star</i></span><span><?= $movie->getRating()?></span></td>
				<?php if( !empty($_SESSION['user']) ) : ?>
					<td><span class="user-rating icons" title="Rate"><i class="material-icons">star</i></span></td>
					<td><span class="icons"><i class="material-icons">bookmark<?= !in_array($movie, $_SESSION['user'] ->getWatchlist()) ? "_border" : "" ?></i></span></td>
				<?php endif; ?>
			</tr>	
		<?php endforeach;?>

	</tbody>
</table>

<div >
	<ul class="pagination">
		<li class=<?=$currentPage != 1 ? "": "disabled"?>><a href="?page=<?=$currentPage -1 ?>">Previous</a></li>
		<!--<?php 
		 for ($i=0; $i < ceil($moviesCount/$numPerPage); $i++) :?>
			<li class=<?=$currentPage == $i+1 ? "active": ""?>><a href="?page=<?=$i+1?>" ><?=$i+1?></a></li>
		<?php endfor; ?>-->
		<li class=<?=$currentPage != ceil($moviesCount/$numPerPage)? "": "disabled"?> ><a href="?page=<?=$currentPage +1 ?>">Next</a></li>
	</ul>
</div>
<?php } else{ ?>
	<p>No rusults were found. </p>
<?php }?>


