<?php 
    @session_start();

    if(!isset($_SESSION['adminlogged']))
    {
        print_r($loginURL);
        header("location:admin-login.php");
    }

?>