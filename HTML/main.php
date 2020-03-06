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
    ?>
<!--<main>  -->

  <div class="wrapper_main">
    <?php
          echo '<div class="userwrapper">';
            for($i = 0; $i < sizeof($user); $i++){
                    echo '
                    <div class="userrow">
                        <div>Kürzel:'.$user[$i]['Krzl']. '</div>
                        <div>geschlecht:' .$user[$i]['Geschlecht'].'</div>
                        <div>Name:'.$user[$i]['Nachname'].'</div>
                        <div>Raum:'.$user[$i]['Raum'].'</div>
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
