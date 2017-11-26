<!DOCTYPE html>
<script language="JavaScript" type="text/javascript" src="js/jquery-3.2.1.js"></script>

<script>
    
    function loginClicked()
    {
        var username = document.getElementById("username").value;
        var password = document.getElementById("password").value;

        if(username == "")
        {
            document.getElementById("username").style.borderColor = "red";
        }

        if(password == "")
        {
            document.getElementById("password").style.borderColor = "red";
        }
        

        if(username != "" && password != "")
        {
            var loginForm = document.getElementsByTagName("form")[0];
            loginForm.action = "../service/service_emp_login.php";
            loginForm.submit(); 
        }
    }
    
</script>

<html>
	<head>
		<title>Login Page</title>
		<meta charset="UTF-8">
		<link href="css/login_style.css" rel="stylesheet" type="text/css"/>
        <p id ="noti"></p>
	</head>
	
	<body>
        
		<form name="login" id = "loginForm" method="post">
			<h2>.</h2>
			<fieldset>
				<img src="image/rm.png"/>
                
                <?php
                
                    if(isset($_COOKIE['un']))
                    {
                        echo "<input type='text' id = 'username' name='username' placeholder='Employee ID' value = '$_COOKIE[un]'/><br>";
                    }
                
                    else
                    {
                        echo "<input type='text' id = 'username' name='username' placeholder='Employee ID'/><br>";
                    }
                
                ?>
				
				<input type="password" id = "password" name="password" placeholder="Password"/><br>
				<p><input type = "checkbox" id = "remember" name = "remember">Remember User</p><br>
				<input type="button"  value="Log in" id = "login" onclick = "loginClicked()"/><br>
			</fieldset>
		</form>
	</body>
	
</html>