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

    $year = $current_year;
    $month = str_pad($current_month,2,"0",STR_PAD_LEFT);

    $result = load_all_balancesheet($db,$year,$month);


    while($row = mysqli_fetch_assoc($result))
    {
        echo "<tr><td>$row[date]</td>";
        echo "<td>$row[particulars]</td>";
        echo "<td>$row[chassis_no]</td>";
        echo "<td>$row[chassis_no]</td>";
        echo "<td>$row[chassis_no]</td>";
        echo "<td>$row[profit]</td>";
        echo "<td>$row[loss]</td>";
        echo "<td>$row[remarks]</td></tr>";
    }
	

	
	

?>