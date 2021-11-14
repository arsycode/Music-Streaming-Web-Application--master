<?php
include("includes/includedFiles.php");
?>

<nav class="navbar navbar-expand-lg navbar-light bg-light navbar sticky-top shadow p-3 mb-5">
  <div class="container-fluid">
    <div class="justify-content-center " id="navbarNav">
      <ul class="navbar-nav">
        <li class="nav-item">
          <a id="beranda" class="navStyle" onclick="setAktif('playlist')" href="playlist.php">Playlist</a>
        </li>
        <li class="nav-item">
          <a id="eksplorasi" class="navStyle" onclick="setAktif('album')" href="">Album</a>
        </li>
        <li class="nav-item">
          <a id="feed" class="navStyle" onclick="setAktif('artist')" href="feed.php">Artis</a>
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