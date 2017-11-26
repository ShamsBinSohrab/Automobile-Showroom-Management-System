
<?php 
	require_once("../../data/sales/show_Inventory_Db.php");
	$result=show_inventory_Db();
	if($result)
	{	
		while($row=mysqli_fetch_assoc($result)) {
			echo "<tr>";
			echo "<td align = 'center'>$row[maker]</td>";
			echo "<td align = 'center'>$row[model]</td>";
			echo "<td align = 'center'>$row[grade]</td>";
			echo "<td align = 'center'>$row[color]</td>";
			echo "<td align = 'center'>$row[man_year]</td>";
			echo "<td align = 'center'>$row[chassis_no]</td>";
			echo "<td align = 'center'>$row[engine_no]</td>";
			echo "<td align = 'center' colspan='2'><a href='update_inventory.php?chassis_no=$row[chassis_no]'>Edit</a><br/><a href='delete_inventory.php?chassis_no=$row[chassis_no]'>Delete</a><br/><a href='show_details.php?chassis_no=$row[chassis_no]'>Show Info</a></td>";
		echo "</tr>";
		}	
	}

 ?>