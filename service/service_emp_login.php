<?php
require_once("../data/data_emp_login.php");
  
        if(isset($_REQUEST['username']) && isset($_REQUEST['password']))
        {
            $username = $_REQUEST['username'];
            $password = $_REQUEST['password'];
            $remember = $_REQUEST['remember'];
            
            if(isset($_REQUEST['remember']))
            {
                setcookie('un',$username,time()+36000,'/');
            }
             
            $user_role = try_login($username, $password);
            
            if(isset($user_role))
            {
                switch($user_role)
                {
                    case "Admin" : 
                        header("location: ../view/dashboard/view_dashboard_admin.php");
                        break;

                    case "Sales" : 
                        header("location: ../view/dashboard/view_dashboard_sales.php");
                        break;

                    case "Account":
                        header("location: ../view/dashboard/view_dashboard_accounts.php");
                        break;
                }
            }

            else
            {
                //header("location: ../index.php");
               var_dump($user_role);
            }  
        }     
?>




