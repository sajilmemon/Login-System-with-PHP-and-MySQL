<?php 
    @session_start();
    if(isset($_SESSION['adminlogged']))
    {   
        unset($_SESSION['adminlogged']);
    }

    header("location:../admin-login.php");
?>