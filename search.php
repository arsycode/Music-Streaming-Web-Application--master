<?php
include("includes/includedFiles.php");

if(isset($_GET['term'])) {
	$term = urldecode($_GET['term']);
}
else {
	$term = "";
}
?>
<div class="container">
	<div class="searchContainer d-flex justify-content-center mb-5 mt-5">

		<input type="text" id="serchInput" class="searchInput" value="<?php echo $term; ?>" placeholder="Telusuri"
			onfocus="this.value = this.value">

	</div>

	<?php if($term == ""){?>
	<div class='container-fluid'>
		<div class='row' id="tes1">
			<h3 class='col-6 fw-bold'>Riwayat Penelusuran</h3>
			<h6 class='col-6 fw-bold text-end' style='color:#FF6F3D'>Hapus semua</h6>
		</div>

		<div class="row">
			<div class='mb-5 mt-3  d-inline-block history pt-3 text-center' style='width: 13rem;'>
				<p>lorem</p>
			</div>
			<div class='mb-5 mt-3  d-inline-block history pt-3 text-center' style='width: 13rem;'>
				<p>lorem</p>
			</div>
			<div class='mb-5 mt-3  d-inline-block history pt-3 text-center' style='width: 13rem;'>
				<p>lorem</p>
			</div>
		</div>

		<h4 class='col-6 mb-4 fw-bold'>Genre top kamu</h4>
		<div class="row">
		<div class='col mb-5 genreTop' style='height: 17rem; background-image: url("assets/images/artwork/pop.png");'></div>
		<div style='width: 1px;'></div>
		<div class='col mb-5 genreTop' style='height: 17rem; background-image: url("assets/images/artwork/kpop.png");'></div>
		<div style='width: 1px;'></div>
		<div class='col mb-5 genreTop' style='height: 17rem; background-image: url("assets/images/artwork/hiphop.png");'></div>
		</div>
		<div class="row mb-4">
		<h4 class='col-6 fw-bold'>Jelajahi Semua</h4>
		<h6 class='col-6 fw-bold text-end' style='color:#FF6F3D'>Lihat semua</h6>
	</div>
		<div class="row mb-2">
		<div class='col mb-5 genreTop position-relative' style='height: 17rem; background-image: url("assets/images/artwork/chill.jpg");'><h1 style="color: #6C5D48;" class="fs-1 container pt-5 position-absolute text-start fw-bold">Chill</h1></div>
		<div style='width: 1px;'></div>
		<div class='col mb-5 genreTop position-relative' style='height: 17rem; background-image: url("assets/images/artwork/rebahan.jpg");'><h1 style="color: #fff;" class="container pt-5 position-absolute text-start fw-bold">Rebahan</h1></div>
		<div style='width: 1px;'></div>
		<div class='col mb-5 genreTop position-relative' style='height: 17rem; background-image: url("assets/images/artwork/happy.jpg");'><h1 style="color: #fff;" class="container position-absolute bottom-0 text-center fw-bold">Happy</h1></div>
		</div>
		<div class="row mb-4">
		<div class='col mb-5 genreTop position-relative' style='height: 17rem; background-image: url("assets/images/artwork/akustik.jpg");'><h1 style="color: #fff;" class="container position-absolute bottom-0 text-center fw-bold">Akustik</h1></div>
		<div style='width: 1px;'></div>
		<div class='col mb-5 genreTop position-relative' style='height: 17rem; background-image: url("assets/images/artwork/party.jpeg");'><h1 style="color: #fff;" class="container position-absolute bottom-0 text-center fw-bold">Party</h1></div>
		<div style='width: 1px;'></div>
		<div class='col mb-5 genreTop position-relative' style='height: 17rem; background-image: url("assets/images/artwork/olahraga.webp");'><h1 style="color: #3B6A88;" class="container position-absolute top-50 start-0 fw-bold">Olahraga</h1></div>
		</div>
		<?php }?>
		<script>
			$(".searchInput").focus();

			$(function () {

				$(".searchInput").keyup(function () {
					clearTimeout(timer);

					timer = setTimeout(function () {
						var val = $(".searchInput").val();
						openPage("search.php?term=" + val);
					}, 2000);
				})

			})
		</script>

		<?php if($term == "")exit()?>
		<div class="tracklistContainer borderBottom">
			<h2>SONGS</h2>
			<ul class="tracklist">

				<?php
		$songsQuery = mysqli_query($con, "SELECT id FROM songs WHERE title LIKE '$term%' LIMIT 10");

		if(mysqli_num_rows($songsQuery) == 0) {
			echo "<span class='noResults'>No songs found matching " . $term . "</span>";
		}
		$songIdArray = array();

		$i = 1;
		while($row = mysqli_fetch_array($songsQuery)) {

			if($i > 15) {
				break;
			}

			array_push($songIdArray, $row['id']);
			$albumSong = new Song($con, $row['id']);
			$albumArtist = $albumSong->getArtist();

			echo "<li class='tracklistRow row'>
					<div class='trackCount col-1'>
						<img class='play' src='assets/images/icons/play-white.png' onclick='setTrack(\"" . $albumSong->getId() . "\", tempPlaylist, true)'>
						<span class='trackNumber'>$i</span>
					</div>


					<div class='trackInfo col'>
						<span class='trackName text-start'>" . $albumSong->getTitle() . "</span>
						<span class='artistName'>" . $albumArtist->getName() . "</span>
					</div>

					<div class='trackOptions col'>

						<input type='hidden' class='songId' value='". $albumSong->getId() . "'>

						<img class='optionsButton' src='assets/images/icons/more-black.png' onclick='showOptionsMenu(this)'>
					</div>

					<div class='trackDuration col'>
						<span class='duration'>" . $albumSong->getDuration() . "</span>
					</div>


				</li>";

			$i = $i + 1;
		}

		?>

				<script>
					var tempSongIds = '<?php echo json_encode($songIdArray); ?>';
					tempPlaylist = JSON.parse(tempSongIds);
					console.log(tempPlaylist);
				</script>


			</ul>
		</div>

		<div class="artistsContainer borderBottom">

			<h2>ARTISTS</h2>

			<?php
	$artistsQuery = mysqli_query($con, "SELECT id FROM artists WHERE name LIKE '$term%' LIMIT 10");

	if(mysqli_num_rows($artistsQuery) == 0) {
			echo "<span class='noResults'>No artists found matching " . $term . "</span>";
		}

	while($row = mysqli_fetch_array($artistsQuery)) {
		$artistFound = new Artist($con, $row['id']);


		echo "<div class='searchResultRow'>
				<div class=''artistName>

					<span role='link' tabindex='0' onclick='openPage(\"artist.php?id=". $artistFound->getId() . "\")'>

					"
					. $artistFound->getName() .
					"

					</span>

				</div>


			</div>";
	}
	?>

		</div>

		<div class="gridViewContainer">
			<h2>ALBUMS</h2>
			<?php
		$albumQuery = mysqli_query($con, "SELECT * FROM albums WHERE title LIKE '$term%' LIMIT 10");


		if(mysqli_num_rows($albumQuery) == 0) {
			echo "<span class='noResults'>No albums found matching " . $term . "</span>";
		}
		while($row = mysqli_fetch_array($albumQuery)) {

			echo "<div class='gridViewItem'>
					<span role='link' tabindex='0' onclick='openPage(\"album.php?id=" . $row['id'] . "\")''>
						<img src='" . $row['artworkPath'] . "'>

						<div class='gridViewInfo'>"
							. $row['title'] .
						"</div>
					</span>

				</div>";



		}
	?>



		</div>

		<div class='container-fluid'>
		<div class='row' id="tes1">
			<h3 class='col-6 fw-bold'>Riwayat Penelusuran</h3>
			<h6 class='col-6 fw-bold text-end' style='color:#FF6F3D'>Hapus semua</h6>
		</div>

		<div class="row">
			<div class='mb-5 mt-3  d-inline-block history pt-3 text-center' style='width: 13rem;'>
				<p>lorem</p>
			</div>
			<div class='mb-5 mt-3  d-inline-block history pt-3 text-center' style='width: 13rem;'>
				<p>lorem</p>
			</div>
			<div class='mb-5 mt-3  d-inline-block history pt-3 text-center' style='width: 13rem;'>
				<p>lorem</p>
			</div>
		</div>

		<h4 class='col-6 mb-4 fw-bold'>Genre top kamu</h4>
		<div class="row">
		<div class='col mb-5 genreTop' style='height: 17rem; background-image: url("assets/images/artwork/pop.png");'></div>
		<div style='width: 1px;'></div>
		<div class='col mb-5 genreTop' style='height: 17rem; background-image: url("assets/images/artwork/kpop.png");'></div>
		<div style='width: 1px;'></div>
		<div class='col mb-5 genreTop' style='height: 17rem; background-image: url("assets/images/artwork/hiphop.png");'></div>
		</div>
		<div class="row mb-4">
	</div>
		<div class="row mb-2">
		<div class='col mb-5 genreTop position-relative' style='height: 17rem; background-image: url("assets/images/artwork/chill.jpg");'><h3 class="position-absolute text-start">CHILL</h3></div>
		<div style='width: 1px;'></div>
		<div class='col mb-5 genreTop' style='height: 17rem; background-image: url("assets/images/artwork/rebahan.jpg");'></div>
		<div style='width: 1px;'></div>
		<div class='col mb-5 genreTop' style='height: 17rem; background-image: url("assets/images/artwork/happy.jpg");'></div>
		</div>
		<div class="row mb-4">
		<div class='col mb-5 genreTop' style='height: 17rem; background-image: url("assets/images/artwork/akustik.jpg");'></div>
		<div style='width: 1px;'></div>
		<div class='col mb-5 genreTop' style='height: 17rem; background-image: url("assets/images/artwork/party.jpeg");'></div>
		<div style='width: 1px;'></div>
		<div class='col mb-5 genreTop' style='height: 17rem; background-image: url("assets/images/artwork/olahraga.webp");'></div>
		</div>


		<nav class="optionsMenu">
			<input type="hidden" class="songId">
			<?php echo Playlist::getPlaylistDropdown($con, $userLoggedIn->getUsername()); ?>
		</nav>

	</div>