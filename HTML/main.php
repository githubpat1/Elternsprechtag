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

        if(!isset($_SESSION['userid'])){
          header("Location: login.php");
        }



        $pdo = new PDO('mysql:host=localhost;dbname=elternsprechtag' , 'root', '');

        $statement = $pdo->prepare("SELECT * FROM lehrer");
        $statement->execute();
        $user = $statement->fetchAll();

        $nachname = "Nachname";
    ?>
<!--<main>  -->

  <div class="wrapper_main">

<div class="wrapper_suche">
    <form action="<?php echo $_SERVER['PHP_SELF']?>" method="POST">
        <input class="userbtn" type="search" list="lehrer" name="lehrerselect" placeholder="Lehrer"></input>
        <datalist id="lehrer">
          <?php
            for($i = 0; $i < sizeof($user); $i++){
              echo "<option value='"; echo $user[$i][$nachname]; echo "'/>";
            }

          ?>
        </datalist>
        <button class="userbtn" type="submit" value="Rudolf">Suchen</button>
    </form>
</div>
    <?php
    echo $_POST["lehrerselect"];
          echo '<div class="userwrapper">';
          if($_POST["lehrerselect"] === $user[$i]["nachname"]){
            
          }else{

          }
            for($i = 0; $i < sizeof($user); $i++){
                    echo '
                    <div class="userrow">
                        <div class="userelement">' .$user[$i]['Geschlecht']. ' ' .$user[$i]['Nachname'].'</div>
                        <div class="userelement">Kürzel:'.$user[$i]['Krzl']. '</div>
                        <div class="userelement">Raum:'.$user[$i]['Raum'].'</div>
                          <form action="terminplaner.php" method="POST">
                              <button class="userbtn" type="submit" name="select" value="'.$user[$i]['Krzl'].'">Termin Festlegen</button>
                          </form>
                    </div>';
            }
            echo '</div>';
      ?>
  </div>

<!--footer- -->
    <?php
        require("footer.php");



    ?>
  </div>
</body>
</html>
