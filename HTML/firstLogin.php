<!DOCTYPE html>
<html>
<head>
    <title>BBS Syke</title>
    <meta name="viewport" content="width=device-width, inital-scale=10.0"/>
    <link rel="stylesheet" type="text/css" href ="../CSS/style.css">
</head>

<body>
<!--Header--------->
    <?php
        require("header.php");
    ?>
<!--<main>  -->
<div class="wrapper_main">
<h2>Login</h2>
<form name="form" action="<?php echo $_SERVER['PHP_SELF']?>" method="POST">
  <p><input type="password" name="password" placeholder="Passwort"></p>
  <p><input type="submit" name="login" value="Login" /></input></p>
</form>
</div>
<!--footer- -->
    <?php
        require("footer.php");
    ?>


</body>
</html>
