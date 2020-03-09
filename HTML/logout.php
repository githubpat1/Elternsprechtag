<?php
require("header.php");
    if(!isset($_SESSION['userid'])){
        header("Location: login.php");
    }else{
        session_unset();
        session_destroy();
        header("Location: login.php");
    }
