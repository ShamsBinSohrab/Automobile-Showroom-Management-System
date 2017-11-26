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

    require_once ("../../data/accounts/data_load_all.php");
    require_once ("../connection.php");
    
    $year = date('Y');
    $month = str_pad(date('n'),2,"0",STR_PAD_LEFT);

    $result = load_all_purchase($db,$year,$month);
	while($row=mysqli_fetch_assoc($result))
            {
                echo"<tr>
                <td> $row[date]</td>
                <td> $row[chassis_no]</td>
                <td> $row[importer_name]</td>
				<td>$row[status]</td>
				<td><a href='update_payment_and_purchase.php?entry_id=$row[entry_id]&source=pur_sold'>Edit</a></br>
				<a href='delete_payment_purchase.php?entry_id=$row[entry_id]&source=pur_sold'>delete</a></td>
                </tr>";
            }
    
?>