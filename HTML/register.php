<!DOCTYPE html>
<html>
<head>
    <title>BBS Syke</title>
    <meta name="viewport" content="width=device-width, inital-scale=10.0"/>
    <link rel="stylesheet" type="text/css" href ="../CSS/style.css">
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
        <h2>Registrierung</h2>
        <form name="form" action="<?php echo $_SERVER['PHP_SELF']?>" method="POST">
          <p><input type="text" name="firstname" placeholder="Vorname"></p>
          <p><input type="text" name="lastname" placeholder="Nachname"></p>
          <p><input type="password" name="password" placeholder="Passwort"></p>
          <p><input type="password" name="password2" placeholder="Passwort Wiederholen"></p>
          <p><input type="radio" name="gender" value="mann">Männlich</p>
          <p><input type="radio" name="gender" value="women">Weiblich</p>
          <p><input type="submit" name="login" value="Registrieren" /></input></p>
        </form>
      </div>
    </div>
<!--footer- -->
    <?php
        require("footer.php");

        if(!isset($_SESSION['userpwid'])){
          header("Location: firstLogin.php");
        }

        $firstname = $_POST["firstname"];
        $lastname = $_POST["lastname"];

        $username = $_POST["username"];
        $password = $_POST["password"];
        $password2 = $_POST["password2"];

        $pdo = new PDO('mysql:host=localhost;dbname=elternsprechtag' , 'root', '');

        if(strlen($password) < 8){
            echo "Bitte Mindestens ein 8 Stelliges Passwort eingeben";
            $error = true;
        }
        if(!$error && $password != $password2){
            echo 'Die Passwörter müssen übereinstimmen';
            $error = true;
        }

        if(!$error){
        $statement = $pdo->prepare("SELECT * FROM bucherindex WHERE benutzername = :username");
        $erg = $statement->execute(array('username' => $username));
        $benutzer = $statement->fetch();

          if($benutzer !== false){
            echo "Der Name ist schon vergeben bitte wählen sie einen neuen aus";
            $error = true;
          }
        }

        /*print_r($benutzer);*/
        if(!$error){
          $statement = $pdo->prepare("INSERT INTO bucherindex (vorname,nachname,passwort) VALUES (:fristname,:lastname,:password)");
          $statement->execute(array('password' => $password));

          $statement = $pdo->prepare("DELET FROM passwort WHERE UUID = :userpwid");
          $statement->execute(array('userpwid' => $_SESSION['userpwid']));

          session_unset();
        }



    ?>
  </div>
</body>
</html>
