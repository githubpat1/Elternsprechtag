<!DOCTYPE html>
<html>
<head>
    <title>BBS Syke</title>
    <meta name="viewport" content="width=device-width, inital-scale=10.0"/>
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
        <h2>Login</h2>
        <form name="form" action="<?php echo $_SERVER['PHP_SELF']?>" method="POST">
          <p><input type="text" name="username" placeholder="Benutzername"></p>
          <p><input type="password" name="password" placeholder="Passwort"></p>
          <p><input type="submit" name="login" value="Login" /></input></p>
          <p><a href="register.php">Hier klicken zum Registrieren</a></p>
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
      $username = $_POST['username'];
      $password = $_POST["password"];

      $pdo = new PDO('mysql:host=localhost;dbname=elternsprechtag' , 'root', '');

      $statement = $pdo->prepare("SELECT * FROM bucherindex WHERE Benutzername = :username");
      $statement->execute(array('username' => $username));
      $benutzer = $statement->fetch();

      if(!empty($password)){
        if(!$benutzer || $password != $benutzer['Passwort']){
          echo $_SESSION['msgError'] = "Benutzername oder Passwort ist falsch";
          //header("Location: login.php");
        }else{
          $_SESSION['userid'] = $benutzer['UUID'];
          $_SESSION['username'] = $username;
          header("Location: main.php");
        }
      }
    }




    //print_r($benutzer);



    ?>
  </div>
</body>
</html>
