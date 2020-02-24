
  <main>
    <div class="wrapper_main">
    <h2>Login</h2>
    <form name="form" action="<?php echo $_SERVER['PHP_SELF']?>" method="POST">
      <p><input type="text" name="username" placeholder="Benutzername"></p>
      <p><input type="password" name="password" placeholder="Password"></p>
      <p><input type="submit" name="login" value="Login" /></input></p>
    </form>
    </div>
    </main>


    <?php

    //session_start();

    /*if(isset($_SESSION['userid'])){
      header("Location: ../index.php");
    }*/

    ?>
