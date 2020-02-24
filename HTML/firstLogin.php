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
        <h2>Login</h2>
        <form name="form" action="<?php echo $_SERVER['PHP_SELF']?>" method="POST">
          <p><input type="text" name="username" placeholder="Benutzername"></p>
          <p><input type="password" name="password" placeholder="Passwort"></p>
          <p><input type="submit" name="login" value="Login" /></input></p>
          <p><a href="">Hier klicken zum Registrieren</a></p>
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
