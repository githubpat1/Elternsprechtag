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
          //header("Location: .php");
          echo "bitte anmelden";
        }
    ?>
  </div>
</body>
</html>
