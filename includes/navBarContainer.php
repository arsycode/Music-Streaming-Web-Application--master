<link rel="stylesheet" href="assets/css/bootstrap.min.css" />
<script src="assets/js/bootstrap.min.js"></script>
<link rel="stylesheet" href="assets/css/style1.css" />

<nav class="navbar navbar-expand-lg navbar-light bg-light navbar sticky-top shadow p-3">
  <div class="container-fluid">
    <a class="navbar-brand" href="browse.php">
      <img src="assets/images/icons/logom.png" alt="" width="100" height="30">
    </a>

    <div class="justify-content-center " id="navbarNav">
      <ul class="navbar-nav">
        <li class="nav-item">
          <a id="beranda" class="navStyle"  href="browse.php">Beranda</a>
        </li>
        <li class="nav-item">
          <a id="search " class="navStyle"  href="search.php">Eksplorasi</a>
        </li>
        <li class="nav-item">
          <a id="feed" class="navStyle"  href="feed.php">Feed</a>
        </li>
        <li class="nav-item">
          <a id="yourMusic" class="navStyle"  href="yourMusic.php">Playlistku</a>
        </li>
      </ul>
    </div>

    <div class="justify-content-end">
      <ul class="navbar-nav">
        <li class="nav-item">
          <a class="navStyle" href="register.php">Login</a>
        </li>
        <li class="nav-item" style="margin-top:3px">
          <a href="register.php" class="signUp">Sign Up</a>
        </li>
      </ul>

    </div>
  </div>
</nav>

<script>
  let link = window.location.href;
  if (link.indexOf('browse') > -1)
  {
      var element = document.getElementById('beranda');
      element.classList.add("active");
      console.log(link);
  }
  if (link.indexOf('search') > -1)
  {
      var element = document.getElementById('search');
      element.classList.add("active");
  }
  if (link.indexOf('feed') > -1)
  {
      var element = document.getElementById('feed');
      element.classList.add("active");
  }
  if (link.indexOf('yourMusic') > -1)
  {
      var element = document.getElementById('yourMusic');
      element.classList.add("active");
  }
  function setAktif(nav) {
      var element = document.getElementById(nav);
      element.classList.add("active");
  }
</script>
