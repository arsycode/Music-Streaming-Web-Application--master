 <?php include("includes/includedFiles.php");


if(isset($_GET['id'])) {
	$albumId = $_GET['id'];
}
else {
	header("Location: index.php");
}

$album = new Album($con, $albumId);
$artist = $album->getArtist();
?>

<div class="entityInfo">

	<div class="leftSection">
		<img src="<?php echo $album->getArtworkPath(); ?>">
	</div>

	<div class="rightSection">
		<h2><?php echo $album->getTitle(); ?></h2>
		<p>By <?php echo $artist->getName(); ?></p>
		<p><?php echo $album->getNumberOfSongs(); ?> songs</p>

	</div>

</div>


<div class="tracklistContainer">
	<ul class="tracklist">
		
		<?php
		$songIdArray = $album->getSongIds();

		$i = 1;
		foreach($songIdArray as $songId) {

			$albumSong = new Song($con, $songId);
			$albumArtist = $albumSong->getArtist();

			echo "<li class='tracklistRow row'>
					<div class='trackCount col-2'>
						<img class='play' src='assets/images/icons/playbutton.png' onclick='setTrack(\"" . $albumSong->getId() . "\", tempPlaylist, true)'>
						<span class='trackNumber'>$i</span>
					</div>


					<div class='trackInfo col text-left'>
						<span class='trackName'>" . $albumSong->getTitle() . "</span>
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


<nav class="optionsMenu">
	

	<input type="hidden" class="songId">
	<?php echo Playlist::getPlaylistDropdown($con, $userLoggedIn->getUsername()); ?>
</nav>