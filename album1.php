<?php
include("includes/includedFiles.php");
?>

<nav class="navbar navbar-expand-lg">
  <div class="container-fluid">
    <div class="justify-content-center " id="navbarNav">
      <ul class="navbar-nav">
        <li class="nav-item">
          <a id="playlists" class="navStyle" href="yourMusic.php">Playlist</a>
        </li>
        <li class="nav-item">
          <a class="navStyle" style="color: #eb675e" href="album1.php">Album</a>
        </li>
        <li class="nav-item">
          <a class="navStyle" href="artist1.php">Artis</a>
        </li>
      </ul>
    </div>

    <div class="justify-content-end">
      <ul class="navbar-nav">
        <li class="nav-item">
          <a class="navStyle" href="">Filter</a>
        </li>
      </ul>

    </div>
  </div>
</nav>

<?php
          $albumQuery = mysqli_query($con, "SELECT * FROM albums ORDER BY RAND() LIMIT 3");

          while($row = mysqli_fetch_array($albumQuery)) {

          echo "<div class='shadow mb-5 mt-5 bg-body gridViewItem d-inline-block borderS p-2' style='width: 15rem;' >
            <img class='p-5 borderImg img-fluid' src='" . $row['artworkPath'] . "' alt='Card image cap' onclick='openPage(\"album.php?id=" . $row['id'] . "\")''>
            <div class='card-body col'>
              <p class='card-text text-truncate fw-bold' style='color:black'>". $row['title'] ."</p>
              <p class='text-truncate' style='color:black'>Lorem ipsum dolor sit amet consectetur adipisicing elit. Magnam eum unde sequi. Nostrum commodi harum optio ex.</p>
            </div>
          </div>";
          }
        ?>