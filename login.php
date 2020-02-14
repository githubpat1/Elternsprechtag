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

    /*if(isset($_SESSION['userid'])){
      header("Location: ../index.php");
    }*/

    $username = $_POST["username"];
    $password = $_POST["password"];

    $pdo = new PDO('mysql:host=localhost;dbname=elternsprechtag' , 'root', '');

    $statement = $pdo->prepare("SELECT * FROM gaeste WHERE Username = :username");
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


  </body>
</html>
