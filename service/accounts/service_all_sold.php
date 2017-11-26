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

    $result = load_all_sold($db,$year,$month);

    while($row=mysqli_fetch_assoc($result))
            {
                echo"<tr>
                <td> $row[date]</td>
                <td> $row[chassis_no]</td>
                <td> $row[customer_name]</td>
				<td><a href='update_received_and_sold.php?entry_id=$row[entry_id]&source=pur_sold'>Edit</a></br>
				<a href='delete_received_sold.php?entry_id=$row[entry_id]&source=pur_sold'>delete</a></td>
                </tr>";
            }
?>