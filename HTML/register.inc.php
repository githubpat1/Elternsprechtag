<?php

require("header.php");
echo $_SESSION["userpwid"];
if(!isset($_SESSION['userpwid'])){
  header("Location: firstLogin.php");
}


$error = false;

$firstname = $_POST["firstname"];
$lastname = $_POST["lastname"];

$username = $_POST["username"];
$password = $_POST["password"];
$password2 = $_POST["password2"];

$pdo = new PDO('mysql:host=localhost;dbname=elternsprechtag' , 'root', '');

if(strlen($firstname) === 0 || strlen($lastname) === 0 || strlen($username) === 0){
  echo "Bitte Namen eingeben";
  $error = true;
}

if(strlen($password) < 8){
    echo "Bitte Mindestens ein 8 Stelliges Passwort eingeben";
    $error = true;
}
if(!$error && $password != $password2){
    echo 'Die Passwörter müssen übereinstimmen';
    $error = true;
}

if(!$error){
$statement = $pdo->prepare("SELECT * FROM bucherindex WHERE Benutzername = :username");
$erg = $statement->execute(array('username' => $username));
$benutzer = $statement->fetch();

  if($benutzer !== false){
    echo "Der Name ist schon vergeben bitte wählen sie einen neuen aus";
    $error = true;
  }
}

/*print_r($benutzer);*/
if(!$error){
  $statement = $pdo->prepare("INSERT INTO bucherindex (Benutzername,Vorname,Nachname,Passwort) VALUES (:username,:firstname,:lastname,:password)");
  $statement->execute(array('username' => $username ,'firstname' => $firstname, 'lastname' => $lastname, 'password' => $password));

  $statement2 = $pdo->prepare("DELETE FROM passwort WHERE UUID = :userpwid");
  $erg2 = $statement2->execute(array('userpwid' => $_SESSION['userpwid']));



  session_unset();
  session_destroy();

  echo "yes";
  //header("Location: main.php");
}
