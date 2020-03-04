<?php
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
  $statement = $pdo->prepare("INSERT INTO bucherindex (benutzername,vorname,nachname,passwort) VALUES (:benutzername,:firstname,:lastname,:password)");
  $statement->execute(array('firstname' => $firstname, 'lastname' => $lastname, 'password' => $password));

  $statement = $pdo->prepare("DELET FROM passwort WHERE UUID = :userpwid");
  $statement->execute(array('userpwid' => $_SESSION['userpwid']));

  session_unset();
}
