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
	require("../../service/accounts/service_delete_recandpay.php");
	$entry_id=$_REQUEST['entry_id'];	
	$row=delete_paypur_entry_id($entry_id);
	$chassis_no=delete_paypur_chassis_no($entry_id);
?>

<script language="JavaScript" type="text/javascript" src="../js/jquery-3.2.1.js"></script>

<script type="text/javascript">

   $(document).ready(function(){
        
        $('#yes').click(function(){
           
            $.ajax({
                  url: "../../service/accounts/service_delete_recandpay.php",
                  method: "post",
                  data: $('#delete_form').serialize(),
                
                  success: function(Result){
                      
                  }
              })
        })
    })
</script>
<style>
table {
	border: 0px solid black;
	padding: 2px;
}

th, td {
    border: 0px solid black;
	padding: 5px;
}
    
input, select{
    padding: 10px;
    font-weight: bolder;
}
</style>

<html>
	<head>
		<title>System Dashboard</title>
		<hr/>
		<h2 align = "center">Dashboard - Accounts</h2>
		<hr/>
	</head>
	<body>
       <?php require_once("../accounts/ext/ext_buttons.php"); ?> 
            
        <p id = "notification"></p>
            <table align = "center">
            <form method ="POST" id = "delete_form">
			<tr><td colspan = "2">Entry_ID:</td>
			<td><input type="hidden" name="entry_id" value="<?=$row['entry_id']?>" ><?=$row['entry_id']?></td>
			</tr>
                <tr>
                    <td colspan = "2">
                        Amount:
                    </td>

                    <td colspan = "3" align = "left">
                        <input type = "hidden" name = "amount" id = "amount" value="<?=$row['amount']?>" ><?=$row['amount']?>
                    </td>
                </tr>
                <tr>
                    <td colspan = "2">
                        Description:
                    </td>

                    <td colspan = "3" align = "left">
                        <input type = "hidden" name = "description" value="<?=$row['particulars']?>" ><?=$row['particulars']?>
                    </td>
                </tr>
                <tr id = "chassis">
                  <td colspan = '2'>Chassis No:</td><td colspan = '3' align = 'left'>
				  <input type='hidden' name='chassis_no' value="<?=$chassis_no['chassis_no']?>" ><?=$chassis_no['chassis_no']?></td>
                </tr>
                
                <tr>
                    <td colspan = "2">
                        Date:
                    </td>

                    <td colspan = "3" align = "left">
                        <input type = "hidden" name = "date" value="<?=$row['date']?>" ><?=$row['date']?>
                    </td>
                </tr>
                <tr><td colspan = "5"></br><h3>Do you really want to delete??</h3></td></tr>
                <tr>
                    <td colspan = "5" align = "center">
                        <input type = "submit" value = "Yes" id = "yes">
                        <input type = "submit" value = "No" id= "no">
                    </td>
                </tr>
            </form>
		</table>
	</body>
</html>

