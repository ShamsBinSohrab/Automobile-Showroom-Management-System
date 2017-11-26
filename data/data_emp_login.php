<?php

function try_login($username, $password)
{
    require_once("connection.php");
    
    $login_query = "select password, role from login_table where uname like '$username'"; 
    
    $login_result = mysqli_query($db,$login_query) or die("login query error");

    if($login_result)
    {
        $row = mysqli_fetch_assoc($login_result);
        
        $verify = password_verify($password,$row['password']);
        
        if($verify)
        {   
            if(!isset($_SESSION))
            {
                session_start();
                $_SESSION['user'] = $row['role'];
            }

            return $row['role'];
        }
    }
    
    return null;
}


      
?>
