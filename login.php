<!DOCTYPE html>
<html>
<head>
	<meta charset="utf-8">
		<title>Login</title>
</head>
  <body>
    <form name="form" action="<?php echo $_SERVER['PHP_SELF']?>" method="POST">
      <p><input type="text" name="username" placeholder="Benutzername"></p>
      <p><input type="password" name="password" placeholder="Password"></p>
      <p><input type="submit" name="login" value="Login" /></input></p>
    </form>



    <?php

    session_start();

    $username = $_POST["username"];
    $password = $_POST["password"];

    $pdo = new PDO('mysql:host=localhost;dbname=elternsprechtag' , 'root', '');

    $statement = $pdo->prepare("SELECT ID FROM gaeste WHERE username = :username");
    $statement->execute(array('username' => $username));
    $erg = $statement->fetch();

    $_SESSION["id"];

    print_r($erg);
    echo $erg;
    ?>


  </body>
</html>
