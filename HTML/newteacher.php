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

        /*if(!isset($_SESSION['userpwid'])){
          header("Location: firstLogin.php");
        }*/
        $pdo = new PDO('mysql:host=localhost;dbname=elternsprechtag' , 'root', '');

        $statement2 = $pdo->prepare("SELECT * FROM Raum");
        $erg = $statement2->execute();
        $rooms = $statement2->fetchAll();
        $Nr = "Nr";
    ?>
<!--<main>  -->
    <div class="wrapper_main">
      <div class="wrapper_login">
        <h2>Lehrer Erstellen</h2>
        <form name="form" action="register.inc.php" method="POST">
          <p><input type="text" name="krzl" placeholder="Kürzel"></p>
          <p><input type="text" name="lastname" placeholder="Nachname"></p>
          <p><input type="text" name="gender" placeholder="Geschlecht"></p>
          <p><input class="" type="search" list="raum" name="raumselect" placeholder="Raum"></input></p>
          <datalist id="raum">
            <?php
              for($i = 0; $i < sizeof($rooms); $i++){
                echo "<option value='"; echo $rooms[$i][$Nr]; echo "'/>";
              }

            ?>
          </datalist>
          <p><input type="password" name="password" placeholder="Passwort"></p>
          <p><input type="password" name="password2" placeholder="Passwort Wiederholen"></p>
          <p><input type="submit" name="login" value="Registrieren" /></input></p>
        </form>
      </div>
    </div>
<!--footer- -->
    <?php
        require("footer.php");

        /*if(!isset($_SESSION['userpwid'])){
          header("Location: firstLogin.php");
        }*/


        $error = false;

        $krzl = $_POST["Krzl"];
        $lastname = $_POST["lastname"];
        $gender = $_POST["Geschlecht"];
        $room = $_POST["Raum"];

        $password = $_POST["password"];
        $password2 = $_POST["password2"];



        if(strlen($lastname) === 0 || strlen($krzl) === 0 || strlen($gender) === 0 || strlen($room) === 0){
          echo "Bitte Daten eingeben";
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
        $statement = $pdo->prepare("SELECT * FROM lehrer WHERE Krzl = :krzl");
        $erg = $statement->execute(array('krzl' => $krzl));
        $lehrer = $statement->fetch();

          if($lehrer !== false){
            echo "Der Name ist schon vergeben bitte wählen sie einen neuen aus";
            $error = true;
          }
        }

        /*print_r($benutzer);*/
        if(!$error){
          $statement = $pdo->prepare("INSERT INTO lehrer (Krzl,Geschlecht,Nachname,Raum,Passwort) VALUES (:krzl,:gender,:lastname,:room,:password)");
          $statement->execute(array('krzl' => $krzl ,'gender' => $gender, 'lastname' => $lastname,'room' => $Raum ,'password' => $password));

          echo "yes";
          //header("Location: main.php");
        }
    ?>
  </div>
</body>
</html>
