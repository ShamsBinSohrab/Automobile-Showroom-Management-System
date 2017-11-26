

<?php 
	require_once("../../service/sales/document_quotation_service.php");
	$cc=$transmission=$fual=$price="";
	if ($_SERVER['REQUEST_METHOD']=="POST")
	{
		$chassis_no = $_REQUEST['chassis_no'];
        
        if(isset($_SESSION))
        {
            $price = $_REQUEST['price'];
        }
		$row=document_quotation_service($chassis_no);
		$options_row=document_quotation_options_service($chassis_no);
		$options_other_row=document_quotation_options_other_service($chassis_no);
	}
	
 ?>


<!DOCTYPE html>
<html>
<head>
	<title>Offer Details</title>
    <link rel="stylesheet" href="../css/style.css">
	<script type="text/javascript">
	      window.onload = function() { window.print(); }
	 </script>
</head>
<body class="print_quotation no_bg">
	<div class="quotation">
		<p>
			To,<br/>
			<strong>Managing Director,</strong><br/>
			X Group of Companies <br>
			<strong>Subject: Offer for <?=$row['maker']?></strong><br>
			Dear Sir,<br>
			Thank you so much for your query. We feel honored and happy to submit you quotation for the following vehicle as per your delightful interest for the<strong> <?=$row['maker']?> .</strong><br>

			<div class="date">
				Date: <?=date("d-M-y")?> <br>
				REF: RM- 
			</div>
		</p>
			<table>
				<tr>
					<th></th>
					<th>Particulars</th>
					<th align="left">Description</th>
				</tr>
				<tr>
					<td><strong>&rArr;</strong></td>
					<td>MAKE</td>
					<td><?=$row['maker']?></td>
				</tr>
				<tr>
					<td><strong>&rArr;</strong></td>
					<td>MODEL</td>
					<td><?=$row['model']?></td>
				</tr>
				<tr>
					<td><strong>&rArr;</strong></td>
					<td>GRADE</td>
					<td><?=$row['grade']?></td>
				</tr>
				<tr>
					<td><strong>&rArr;</strong></td>
					<td>MODEL YEAR</td>
					<td><?=$row['man_year']?></td>
				</tr>
				<tr>
					<td><strong>&rArr;</strong></td>
					<td>COLOR</td>
					<td><?=$row['color']?></td>
				</tr>
				<tr>
					<td><strong>&rArr;</strong></td>
					<td>DISPLACEMENT (CC)</td>
					<td><?=$row['cc']." CC"?></td>
				</tr>
				<?php 
				if(!empty($options_row['transmission']))
				{

						echo "<tr>";
						echo "<td>&rArr;</td>";
						echo "<td>TRANSMISSION</td>";
						echo "<td>$options_row[transmission]</td>";
						echo "</tr>";
				}
				 ?>


				 <?php 
				 if(!empty($options_row['fuel']))
				 {
				 		echo "<tr>";
						echo "<td>&rArr;</td>";
				 		echo "<td>FUEL</td>";
				 		echo "<td>$options_row[fuel]</td>";
				 		echo "</tr>";
				 }
				  ?>
				<tr>
					<td><strong>&rArr;</strong></td>
					<td>SEATING CAPACITY</td>
					<td><?=$options_row['seating_capacity']?></td>
				</tr>
				<tr>
					<td><strong>&rArr;</strong></td>
					<td>ENGINE NUMBER</td>
					<td><?=$row['engine_no']?></td>
				</tr>
				<tr>
					<td><strong>&rArr;</strong></td>
					<td>CHASSIS NUMBER</td>
					<td><?=$row['chassis_no']?></td>
				</tr>
                <tr>
                    <td><strong>&rArr;</strong></td>
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
                    echo "<tr>";
                    echo "<td>&rArr;</td>";
                    echo "<td>Price for 1 Unit</td>";
                    echo "<td>$price BDT Only</td>";
                    echo "</tr>";
				}
				 ?>
				<tr>
					<td>&rArr;</td>
					<td>Delivery Time</td>
					<td><strong>7 Days for the date of order confirmation from the client</strong></td>
				</tr>
				<tr>
					<td>&rArr;</td>
					<td>Offer Validity</td>
					<td><strong>10 Days from the date of quotation </strong></td>
				</tr>
			</table>
		<p>
			**Note: The above mentioned price is excluding VAT, AIT, Insurance & Vehicle registration cost
			  For any other information please contact us at your convenience. We shall be glad to render you any assistance.

			  <br><br>
			  -------------------------------------------------<br>
			  Mirza Saleh Ahmed Prince,<br>
			  Mobile: +8801914466094 <br>
			  Deputy Manager (Sales & Marketing), Royal Motors
		</p>
		*Car Loan Available
	</div>

</body>
</html>