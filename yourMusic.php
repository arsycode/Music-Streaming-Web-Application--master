<?php
include("includes/includedFiles.php");
?>

<nav class="navbar navbar-expand-lg navbar sticky-top">
  <div class="container-fluid">
    <div class="justify-content-center " id="navbarNav">
      <ul class="navbar-nav">
        <li class="nav-item">
          <a id="playlists" class="navStyle" style="color: #eb675e" href="yourMusic.php">Playlist</a>
        </li>
        <li class="nav-item">
          <a id="album" class="navStyle" href="album1.php">Album</a>
        </li>
        <li class="nav-item">
          <a id="artist" class="navStyle"href="artist1.php">Artis</a>
        </li>
      </ul>
    </div>

    <div class="justify-content-end">
      <ul class="navbar-nav">
        <li class="nav-item">
          <a class="navStyle" href="register.php">Filter</a>
        </li>
      </ul>

    </div>
  </div>
</nav>

<div class="playlistContainer">
	
	<div class="gridViewContainer">
		
		<h2>PLAYLISTS</h2>

		<div class="buttonItems">
			<button class="button green" onclick="createPlaylist()">NEW PLAYLIST</button>
		</div>


		<?php
			$username = $userLoggedIn->getUsername();
			$playlistQuery = mysqli_query($con, "SELECT * FROM playlists WHERE owner = '$username'");


			if(mysqli_num_rows($playlistQuery) == 0) {
				echo "<span class='noResults'>You don't have any playlist yet.</span>";
			}
			while($row = mysqli_fetch_array($playlistQuery)) {

				$playlist = new Playlist($con, $row);

				echo "<div class='gridViewItem' role='link' tabindex='0' onclick='openPage(\"playlist.php?id=" . $playlist->getId() ."\")'>
						

						<div class='playlistImage'>

							<img src='assets/images/icons/playlist.png'/>

						</div>
						<div class='gridViewInfo'>"
								. $playlist->getName() .
							"</div>

						</div>";



			}
		?>

	</div>

</div>
<script>
  let link = window.location.href;
  if (link.indexOf('playlists') > -1)
  {
      var element = document.getElementById('playlists');
      element.classList.add("active");
      console.log(link);
  }
  if (link.indexOf('album') > -1)
  {
      var element = document.getElementById('album');
      element.classList.add("active");
  }
  if (link.indexOf('artist') > -1)
  {
      var element = document.getElementById('artist');
      element.classList.add("active");
  }
  function setAktif(nav) {
      var element = document.getElementById(nav);
      element.classList.add("active");
  }
</script>