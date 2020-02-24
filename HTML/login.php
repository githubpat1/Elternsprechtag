<!DOCTYPE html>
<html>
<head>
    <title>BBS Syke</title>
    <meta name="viewport" content="width=device-width, inital-scale=10.0"/>
    <link rel="stylesheet" type="text/css" href ="../CSS/style.css">
</head>
  <main>
    <div class="wrapper_main">
    <h2>Login</h2>
    <form name="form" action="<?php echo $_SERVER['PHP_SELF']?>" method="POST">
      <p><input type="text" name="username" placeholder="Benutzername"></p>
      <p><input type="submit" name="login" value="Login" /></input></p>
    </form>
    </div>
    </main>


    <?php

    session_start();

    /*if(isset($_SESSION['userid'])){
      header("Location: ../index.php");
    }*/


    $password = $_POST["password"];

    $pdo = new PDO('mysql:host=localhost;dbname=elternsprechtag' , 'root', '');

    $statement = $pdo->prepare("SELECT * FROM bucherindex WHERE UUID = :username");
    $statement->execute(array('username' => $username));
    $benutzer = $statement->fetch();

    print_r($benutzer);

    if(!empty($password)){
      if(!$benutzer || $password != $benutzer['Passwort']){
        echo $_SESSION['msgError'] = "Benutzername oder Passwort ist falsch";
        //header("Location: login.php");
      }else{
        echo  $_SESSION['userid'] = $benutzer['ID'];
        echo  $_SESSION['username'] = $username;
        //header("Location: index.php");
      }
    }

    ?>
</html>
