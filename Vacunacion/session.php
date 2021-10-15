<?php
    session_start();
    $_SESSION["user_role"] = $user_role; 
    //$_SESSION["user_arr"] = $user_arr; 
  
    // Check if the user is logged in, if not then redirect him to login page
    if(!isset($_SESSION["loggedin"]) || $_SESSION["loggedin"] !== true){
        header("location: login.php");
        exit;
    }
?>