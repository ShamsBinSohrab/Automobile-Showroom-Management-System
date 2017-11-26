
<?php
	require_once("../../service/sales/document_quotation_service.php");
	$chassis_no=$_REQUEST['chassis_no'];
	$row=document_quotation_service($chassis_no);
	$options_row=document_quotation_options_service($chassis_no);
	$options_other_row=document_quotation_options_other_service($chassis_no);
 ?>


<!DOCTYPE html>
<html>
<head>
	<title>Car Details</title>
    <link rel="stylesheet" href="../css/style.css">
	<script>
	function validateForm() {
	    var price = document.forms["myForm"]["price"].value;
	    if (price == "") {
	        alert("Please Enter Price");
	        document.getElementById("price").style.borderColor="#f00";
	        return false;
	    }

	    if (isNaN(price)) {
	        alert("Please Enter Valid Amount");
	        document.getElementById("price").style.borderColor="#f00";
	        return false;
	    }
	    if (price <=0) {
	        alert("Amount Can Not Be 0 BDT Only");
	        document.getElementById("price").style.borderColor="#f00";
	        return false;
	    }
	}
	</script>
</head>
<body class="document_quotation no_bg">
	<div class="quotation">
		<form name="myForm" action="print_quotation.php" onsubmit="return validateForm()" method="post" target="framename">
			<table>
				<tr>
					<th>Particulars</th>
					<th>Description</th>
				</tr>
				<tr>
					<td>MAKE</td>
					<td><?=$row['maker']?></td>
				</tr>
				<tr>
					<td>MODEL</td>
					<td><?=$row['model']?></td>
				</tr>
				<tr>
					<td>GRADE</td>
					<td><?=$row['grade']?></td>
				</tr>
				<tr>
					<td>MODEL YEAR</td>
					<td><?=$row['man_year']?></td>
				</tr>
				<tr>
					<td>COLOR</td>
					<td><?=$row['color']?></td>
				</tr>
				<tr>
					<td>DISPLACEMENT (CC)</td>
					<td><?=$row['cc']?></td>
				</tr>
				<?php 
				if(!empty($options_row['transmission']))
				{

						echo "<tr>";
						echo "<td>TRANSMISSION</td>";
						echo "<td>$options_row[transmission]</td>";
						echo "</tr>";
				}
				 ?>


				 <?php 
				 if(!empty($options_row['fuel']))
				 {
				 		echo "<tr>";
				 		echo "<td>FUEL</td>";
				 		echo "<td>$options_row[fuel]</td>";
				 		echo "</tr>";
				 }
				  ?>

				<tr>
					<td>SEATING CAPACITY</td>
					<td><?=$options_row['seating_capacity']?></td>
				</tr>
				<tr>
					<td>ENGINE NUMBER</td>
					<td><?=$row['engine_no']?></td>
				</tr>
				<tr>
					<td>CHASSIS NUMBER</td>
					<td><input type="hidden" placeholder="Chassis No." name="chassis_no" value="<?=$row['chassis_no']?>" ><?=$row['chassis_no']?></td>
				</tr>
				<tr>
					<td>OPTIONS</td>
					<td>
						<?php
							$count=0;
							if (!empty($options_other_row)) {
								foreach ($options_other_row as $value) {
										if($value!=$row['chassis_no'])
										{
											if(!empty($value))
											{	
												
												if($count>0)
												{
													echo "	,";
												}
												echo $value;
												$count++;
											}
											else{
												echo "No Car Options";
												break;
											}
										}

								}	
							}

							else{
								echo "No Car Options";
							}
						 ?>
					</td>
				</tr>
                <?php
                    
                    if(isset($_SESSION))
                    {
                        echo "<tr>
					<td>Price for 1 Unit</td>
					<td><strong><input type='text' name='price' id='price'>BDT Only</strong></td>
				</tr>";
                    }
                
                ?>
				
				<tr>
					<td>Delivery Time</td>
					<td><strong>7 Days for the date of order confirmation from the client</strong></td>
				</tr>
				<tr>
					<td>Offer Validity</td>
					<td><strong>10 Days from the date of quotation </strong></td>
				</tr>
			</table>
			<input type="submit" name="print" value="Print" class="print">
		</form>
		<a href="inventory.php"><button>Cancel</button></a> 
	</div>
	<iframe width="560" height="315" name="framename" id="iframe"></iframe>
</body>
</html>