<?php
   
    if(!isset($_SESSION))
    {
        session_start();
        
        if($_SESSION['user'] == null)
        {
            header("location: ../../index.php");
        }
    }
    
?>
<?php
	require("../../service/accounts/service_update_recandpay.php");
	$entry_id=$_REQUEST['entry_id'];
	$row=update_paypur_entry_id($entry_id);
	$chassis_no=update_paypur_chassis_no($entry_id);
	
?>

<script language="JavaScript" type="text/javascript" src="../js/jquery-3.2.1.js"></script>

<script>

    $(document).ready(function(){
        
        $('#submit').click(function(){

            $.ajax({

                  url: "../../service/accounts/service_update_recandpay.php",
                  method: "post",
                  data: $('#update_form').serialize(),
                  success: function(Result){
                  }
              })
        })
        
    })
</script>

<html>
	<head>
		<title>System Dashboard</title>
        <link rel="stylesheet" href="../css/style.css">
	</head>
	<body class="update_pay_pur no_bg">
        <hr/>
		  <h2 align = "center">Dashboard - Accounts</h2>
		<hr/>

       <?php require_once("../accounts/ext/ext_buttons.php"); ?> 
            
        <p id = "notification"></p>
            <table align = "center">
            <form method ="POST" id = "update_form">
			<tr><td colspan = "2">Entry_ID:</td>
			<td><input type="hidden" name="entry_id" value="<?=$row['entry_id']?>" ><?=$row['entry_id']?></td>
			</tr>
                <tr>
                    <td colspan = "2">
                        Amount:
                    </td>

                    <td colspan = "3" align = "left">
                        <input type = "text" name = "amount" id = "amount" value="<?=$row['amount']?>" >
                    </td>
                </tr>
                <tr>
                    <td colspan = "2">
                        Description:
                    </td>

                    <td colspan = "3" align = "left">
                        <input type = "text" name = "description" value="<?=$row['particulars']?>" >
                    </td>
                </tr>
                <tr id = "chassis">
                  <td colspan = '2'>Chassis No:</td><td colspan = '3' align = 'left'>
				  <input type='text' name='chassis_no' value="<?=$chassis_no['chassis_no']?>" ></td>
                </tr>
                
                <tr>
                    <td colspan = "2">
                        Date:
                    </td>

                    <td colspan = "3" align = "left">
                        <input type = "date" name = "date" value="<?=$row['date']?>" >
                    </td>
                </tr>
                
                <tr>
                    <td colspan = "5" align = "center">
                        <input type = "submit" value = "Update" id = "submit">
                        <input type = "reset" value = "Reset">
                    </td>
                </tr>
            </form>
		</table>
	</body>
</html>