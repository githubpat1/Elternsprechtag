<!DOCTYPE html>
<html>
<head>
    <title>BBS Syke</title>
    <meta name="viewport" content="width=device-width, inital-scale=1.0"/>
    <link rel="stylesheet" type="text/css" href ="../CSS/style.css">
    <link rel="stylesheet" type="text/css" href ="../CSS/style_mobile.css">
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
          <p><a href="login.php" id="regiLink">Schon Registriert? Dann hier klicken zum Login</a></p>
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



    if(!empty($_POST["password"])){
      $pdo = new PDO('mysql:host=localhost;dbname=elternsprechtag' , 'root', '');

      $statement = $pdo->prepare("SELECT * FROM passwort WHERE UUID = :passwort");
      $statement->execute(array('passwort' => $_POST["password"]));
      $benutzer = $statement->fetch();

      print_r($benutzer);

      if(!$benutzer || $_POST["password"] != $benutzer['UUID']){
        if(!empty($_POST["password"])){
          echo $_SESSION['msgError'] = "Passwort ist falsch";
        }
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
