<?php
    if(!empty($_POST['loginBtn']) && !empty($_POST['adminUsername']) && ($_POST['adminPassword']))
    {
        require("database.php");
        $obj=new query();

        $username=$obj->get_safe_str($_POST['adminUsername']);
        $password=md5($obj->get_safe_str($_POST["adminPassword"]));

        $conditionArr=array('admin_username'=>$username,'admin_password'=>$password);

        $result=$obj->getData('admin','*',$conditionArr);

        if(isset($result[0]) && count($result)==1)
        {
            $_SESSION['adminlogged']=$username;
            header("location:../index.php");
        }
        else
        {
            $_SESSION['loginErrors']="Invalid Credentials.";        
            header("location:../admin-login.php");
        }
    }
    else{
            $_SESSION['loginErrors']="Parameter Mismatch.";        
            header("location:../admin-login.php");
    }
?>