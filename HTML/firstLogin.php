<!DOCTYPE html>
<html>
<head>
    <title>BBS Syke</title>
    <meta name="viewport" content="width=device-width, inital-scale=10.0"/>
    <link rel="stylesheet" type="text/css" href ="../CSS/style.css">
    <link rel="stylesheet" type="text/css" href ="../CSS/style_mobile.css">
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
</head>

<body>
  <div class="wrapper_all">
<!--Header--------->
    <?php
        require("header.php");
    ?>
<!--<main>  -->
    <div class="wrapper_main">
      <div class="wrapper_login">
        <h2>Firsttime Login</h2>
        <form name="form" action="<?php echo $_SERVER['PHP_SELF']?>" method="POST">
          <p><input type="password" name="password" placeholder="Passwort"></p>
          <p><input type="submit" name="login" value="Registrieren" /></input></p>
          <p><a href="">Schon Registriert? Dann hier klicken zum Login</a></p>
        </form>
      </div>
    </div>
<!--footer- -->
    <?php
        require("footer.php");
    ?>
    <?php

    if(isset($_SESSION['userid'])){
      header("Location: main.php");
    }


    $password = $_POST["password"];

    $pdo = new PDO('mysql:host=localhost;dbname=elternsprechtag' , 'root', '');

    $statement = $pdo->prepare("SELECT * FROM passwort WHERE UUID = :passwort");
    $statement->execute(array('passwort' => $password));
    $benutzer = $statement->fetch();

    print_r($benutzer);

    if(!empty($password)){
      if(!$benutzer || $password != $benutzer['UUID']){
        echo $_SESSION['msgError'] = "Benutzername oder Passwort ist falsch";
        //header("Location: login.php");
      }else{
        $_SESSION['userpwid'] = $benutzer['UUID'];
        header("Location: register.php");
      }
    }

    ?>
  </div>
</body>
</html>
