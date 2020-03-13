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
        $_POST["select"];

      ?>

      <div class="termin">
        

      </div>
  </div>

<!--footer- -->
    <?php
        require("footer.php");



    ?>
  </div>
</body>
</html>
