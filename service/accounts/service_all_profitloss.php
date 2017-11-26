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
	require_once ("../../data/accounts/data_add_entry.php");
	require_once ("../connection.php");
	
	$year = date('Y');
    $month = str_pad(date('n'),2,"0",STR_PAD_LEFT);
	
	
    $result = load_all_profitloss($db,$year,$month);
	
	
   while($row = mysqli_fetch_assoc($result))
    { 
			$result_p = get_value_purchase($db,$row['chassis_no']);
			$result_s= get_value_sold($db,$row['chassis_no']);
			
			$row_p = mysqli_fetch_assoc($result_p);
			$row_s = mysqli_fetch_assoc($result_s);
			
		    echo"<tr>";
            echo"<td>$row[date]</td>";
			echo"<td>$row_s[customer_name]</td>";
			echo"<td>$row[chassis_no]</td>";
			echo"<td>$row_p[amount]</td>";
			echo"<td>$row_s[amount]</td>";
			echo"<td>$row[profit]</td>";
			echo"<td>$row[loss]</td>";
			echo"<td>$row[remarks]</td>";
			echo"</tr>";   
    }
?>