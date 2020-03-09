<?php
session_start();
?>

<script>
function menuResponsive() {
  var x = document.getElementById("test");
  if (x.className === "links") {
    x.className += " responsive";
  } else {
    x.className = "links";
  }
}
</script>

<header>
  <div class="bild">
      <div class="header_bild"><a href=""><img src="../Bilder/bbs-syke_logo.png" alt="Logo BBS Syke"></a></div>
  </div>
  <div class="links" id="test">
      <a class="header_links" id="q" href="https://www.bbs-syke.de/">Startseite</a>
      <a class="header_links" id="q" href="https://www.bbs-syke.de/portal/kontakt.html">Kontakt</a>
      <a class="header_links" id="q" href="http://localhost/Elternsprechtag/HTML/login.php">Login</a>

      <a href="javascript:void(0);" class="icon" onclick="menuResponsive()">
        <i class="fa fa-bars"><img src="../Bilder/menubutton.png" alt="Menu Icon"></i>
      </a>
    </div>
</header>
