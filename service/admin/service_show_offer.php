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

	require_once("../../data/admin/data_show_offer.php");

	$result = get_offers();

	while($row = mysqli_fetch_assoc($result))
	{
		echo "<tr>
				<td>$row[title]</td>
				<td>$row[view_counter]</td>										
				<td><a href='../../service/admin/service_delete_offer.php?id=$row[id]'>Delete <a></td>					
			 </tr>";
	}

?>