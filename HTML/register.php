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
        <form name="form" action="register.inc.php" method="POST">
          <p><input type="text" name="firstname" placeholder="Vorname"></p>
          <p><input type="text" name="lastname" placeholder="Nachname"></p>
          <p><input type="text" name="username" placeholder="Benutzername"></p>
          <p><input type="password" name="password" placeholder="Passwort"></p>
          <p><input type="password" name="password2" placeholder="Passwort Wiederholen"></p>
          <p><input type="submit" name="login" value="Registrieren" /></input></p>
        </form>
      </div>
    </div>
<!--footer- -->
    <?php
        require("footer.php");





    ?>
  </div>
</body>
</html>
