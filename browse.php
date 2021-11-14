<?php 
include("includes/includedFiles.php");
?>
<html?>
  <link rel="stylesheet" href="assets/css/bootstrap.min.css" />
  <script src="assets/js/bootstrap.min.js"></script>
  <div class="bgCarousel mb-5 mt-auto">

    <div id="demo" class="carousel slide" data-bs-ride="carousel">
      <div class="carousel-indicators">
        <button type="button" data-bs-target="#demo" data-bs-slide-to="0" class="active"></button>
        <button type="button" data-bs-target="#demo" data-bs-slide-to="1"></button>
      </div>

      <div class="carousel-inner">
        <div class="carousel-item active">
          <img src="assets/images/carousel/1.png" class="d-block mx-auto position-relative" width="80%" alt="...">
          <div class="row container position-absolute"
            style="color: #fff; top: 50px; left: 110px; overflow-wrap: break-word;">
            <div class="col-3">
              <h2 class="fw-bold">Lorem ipsum</h2>
              <h5>Lorem, ipsum dolor sit amet</h5>
            </div>
          </div>
        </div>
        <div class="carousel-item">
          <img src="assets/images/carousel/2.png" class="d-block mx-auto" width="80%" alt="...">
          <div class="row container position-absolute"
            style="color: #fff; top: 50px; left: 110px; overflow-wrap: break-word;">
            <div class="col-3">
              <h2 class="fw-bold">Lorem ipsum</h2>
              <h5>Lorem, ipsum dolor sit amet</h5>
            </div>
          </div>
        </div>
      </div>

      <button class="carousel-control-prev" type="button" data-bs-target="#demo" data-bs-slide="prev">
        <span class="carousel-control-prev-icon" aria-hidden="true"></span>
        <span class="visually-hidden">Previous</span>
      </button>

      <button class="carousel-control-next" type="button" data-bs-target="#demo" data-bs-slide="next">
        <span class="carousel-control-next-icon" aria-hidden="true"></span>
        <span class="visually-hidden">Next</span>
      </button>
    </div>
  </div>

  <div class="container">
    <div class="row mb-5">
      <div class="col-8">
        <div class="row">
          <div class="col-6">
            <h3 style="color:black" class="fw-bold">Dari Playlist Kamu</h3>
          </div>
          <div class="col-3"></div>
          <div class="col pt-1">
            <h6 style="color:#FF6F3D" class="text-center">Lihat semua</h6>
          </div>
        </div>
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
      </div>

      <div class='col-4'>
        <h3 style="color:black" class="fw-bold">Lagu Baru</h3>
        <div class="row mt-3">
          <div class="col-2 text-center"><img src="assets/images/icons/playbutton.png" class="circle" width="100%">
          </div>
          <row class="col-8">
            <h5 class='text-truncate text-start' style='color:black'>Lorem ipsum .</h5>
            <h6 class='text-truncate' style='color:black'>Lorem ipsum .</h6>
          </row>
        </div>
      </div>
    </div>

    <div class="row mb-5">
      <div class="col-8">
        <div class="row">
          <div class="col-6">
            <h3 class="fw-bold">Rekomendasi untukmu</h3>
          </div>
          <div class="col-3"></div>
          <div class="col pt-1">
            <h6 style="color:#FF6F3D" class="text-center">Lihat semua</h6>
          </div>
        </div>
        <h6 style="color:black" class="fw-bold">Berdasarkan aktivitas terkini</h6>
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
      </div>
      <div class='col-4'>
        <h3 style="color:black" class="fw-bold">Rekomendasi artis</h3>
        <div class="row mt-3">
          <div class="col-2 text-center"><img src="assets/images/icons/playbutton.png" class="circle" width="100%">
          </div>
          <row class="col-8">
            <h5 class='text-truncate text-start' style='color:black'>Lorem ipsum .</h5>
          </row>
        </div>
      </div>
    </div>

    <div class="row mb-5">
      <div class="col-8">
        <div class="row">
          <div class="col-6">
            <h3 style="color:black" class="fw-bold">Trending</h3>
          </div>
          <div class="col-4"></div>
          <div class="col pt-1">
            <h6 style="color:#FF6F3D" class="text-start">Lihat semua</h6>
          </div>
        </div>
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
      </div>
    </div>
    <div class="container row mb-5"></div>
  </div>

  </html>