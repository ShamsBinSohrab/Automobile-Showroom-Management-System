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
<script language="JavaScript" type="text/javascript" src="../js/jquery-3.2.1.js"></script>

<script>
    function validate()
    {
        var amountObj = document.getElementById("amount").value;
        var descriptionObj = document.getElementById("description").value;
        var transTypeObj = document.getElementById("transaction_type").value;
		var dateobj = document.getElementById('date').value;
		var catagoryobj = document.getElementById("catagory").value;
		var chassisobj = document.getElementById("chassis_no").value;
		
		 var divObj = document.getElementById("msg");
		 var divchassisObj = document.getElementById("chassismsg");
		
		if(catagoryobj == "carpurchase" || catagoryobj == "carsold")
		{
			if(amountObj!="" && descriptionObj!="" && transTypeObj!="" && dateobj !="" && chassisobj!="")
			{
				if(!amountObj.match(/^[1-9][0-9]*$/))
				{
					 divObj.innerHTML = "Must Inter Valid Amount!!";
					 document.getElementById("amount").style.borderColor = "red";
				}
				else
				{
					$.ajax({
						  url: "../../service/accounts/service_add_entry.php",
						  method: "post",
						  data: $('#inp_form').serialize(),
						  dataType: "html",
						  success: function(Result){
							  $('#notification').html(Result);
							   window.setTimeout(function(){location.reload()},3000);
						  }
					  })	
				document.getElementById("amount").style.borderColor = "green";

				document.getElementById("description").style.borderColor = "green";

				document.getElementById("transaction_type").style.borderColor = "green";

				document.getElementById("date").style.borderColor = "green";
				
				document.getElementById("chassis_no").style.borderColor = "green";
				
				document.getElementById("catagory").style.borderColor = "green";
				}
			}
			
			else
			{
				if(amountObj=="")
				{
					document.getElementById("amount").style.borderColor = "red";
				}
				if(!amountObj.match(/^[1-9][0-9]*$/))
				{
					 divObj.innerHTML = "Must Inter Valid Amount!!";
					 document.getElementById("amount").style.borderColor = "red";
				}
				if(descriptionObj=="")
				{
					document.getElementById("description").style.borderColor = "red";
				}
				if(transTypeObj=="")
				{
					document.getElementById("transaction_type").style.borderColor = "red";
				}
				if(dateobj=="")
				{
					document.getElementById("date").style.borderColor = "red";
				}
				
				if(chassisobj=="")
				{
					document.getElementById("chassis_no").style.borderColor = "red";
				}
					//window.setTimeout(function(){location.reload()},3000);
			}
		}
			
		else if( catagoryobj=="expense")
		{
			if(amountObj!="" && descriptionObj!="" && transTypeObj!="" && dateobj !="" && chassisobj=="")
			{
				if(!amountObj.match(/^[1-9][0-9]*$/))
				{
					 divObj.innerHTML = "Must Inter Valid Amount!!";
					 document.getElementById("amount").style.borderColor = "red";
				}
				else
				{
					$.ajax({
							  url: "../../service/accounts/service_add_entry.php",
							  method: "post",
							  data: $('#inp_form').serialize(),
							  dataType: "html",
							  success: function(Result){
								  $('#notification').html(Result);
							   window.setTimeout(function(){location.reload()},3000);
							  }
						  })
				document.getElementById("amount").style.borderColor = "green";

				document.getElementById("description").style.borderColor = "green";

				document.getElementById("transaction_type").style.borderColor = "green";

				document.getElementById("date").style.borderColor = "green";
				
				document.getElementById("catagory").style.borderColor = "green";
				}
			}
			
			else
			{
				if(amountObj=="")
				{
					document.getElementById("amount").style.borderColor = "red";
				
				}
					if(!amountObj.match(/^[1-9][0-9]*$/))
				{
					 divObj.innerHTML = "Must Inter Valid Amount!!";
					 document.getElementById("amount").style.borderColor = "red";
				}
				if(descriptionObj=="")
				{
					document.getElementById("description").style.borderColor = "red";
				}
				if(transTypeObj=="")
				{
					document.getElementById("transaction_type").style.borderColor = "red";
				}
				if(dateobj=="")
				{
					document.getElementById("date").style.borderColor = "red";
				}
				if(chassisobj!="")
				{
					divchassisObj.innerHTML = "Can't enter Chassis No!!";
					document.getElementById("chassis_no").style.borderColor = "red";
				}
				//window.setTimeout(function(){location.reload()},3000);
			}
	}
	else if (catagoryobj=="")
		{
			window.setTimeout(function(){location.reload()},3000);
			document.getElementById("catagory").style.borderColor = "red";
		}
		else
		{
			document.getElementById("amount").style.borderColor = "red";

			document.getElementById("description").style.borderColor = "red";

			document.getElementById("transaction_type").style.borderColor = "red";

			document.getElementById("date").style.borderColor = "red";
			
			document.getElementById("chassis_no").style.borderColor = "red";
			
			document.getElementById("catagory").style.borderColor = "red";
		//	window.setTimeout(function(){location.reload()},3000);
		}
			
	}
   
</script>
<html>
	<head>
		<title>System Dashboard</title>
        <link rel="stylesheet" href="../css/style.css">
	</head>
	
	<body class="no_bg accounts_dash">
		<hr/>
		<h2 align = "center">Dashboard - Accounts</h2>
		<hr/>
		<?php require_once("../accounts/ext/ext_buttons.php"); ?> 
            
		<p id = "notification"></p>
            <table align = "center">
            <form method ="POST" id = "inp_form">
                <tr>
                    <td colspan = "2">
                        Amount:
                    </td>

                    <td colspan = "3" align = "left">
                        <input type = "text" name = "amount" id = "amount" placeholder="BDT">
                    </td>
					<td id="msg"></td>
                </tr>
            
                <tr>
                    <td colspan = "2">
                        Transaction Type:
                    </td>

                    <td colspan = "3" align = "left">
                        <select name = "transaction_type" id = "transaction_type">
                        <option selected disabled value = "">-Select-</option>
                        <option id = "rec" value = "received">Received</option>
                        <option id = "pay" value = "payment">Payment</option>
                        </select>
                    </td>
                </tr>
            
                <tr>
                    <td colspan = "2">
                        Description:
                    </td>

                    <td colspan = "3" align = "left">
                        <input type = "text" name = "description" id="description" placeholder="Description">
                    </td>
                </tr>
             
                <tr>
                    <td colspan = "2">
                        Catagory:
                    </td>
                     <td colspan = "1" align = "left">
                        <select name = "catagory" id = "catagory">
                            <option disabled selected value>-Select-</option> 
							<option value="expense">Office Expense</option>
							<option value="carpurchase">Car Purchase</option>
							<option value="carsold">Car Sold</option>
						</select>             
                    </td>
                </tr>
                
                <tr>
                  <td colspan = '2'>Chassis No:</td>
				  <td colspan = '3' align = 'left'><input type='text' name='chassis_no' id="chassis_no" placeholder="Chassis No"/></td>
				  <td id="chassismsg"></td>
                </tr>
                
                <tr>
                    <td colspan = "2">
                        Date:
                    </td>

                    <td colspan = "3" align = "left">
                        <input type = "date" name = "date" id="date">
                    </td>
                </tr>
                <tr>
                    <td colspan = "5" align = "center">
                        <input type = "button" value = "Submit" id = "sub" onclick="validate()">
                        <input type = "reset" value = "Reset">
                    </td>
                </tr>
            </form>
		</table>
            
    </body>
</html>


