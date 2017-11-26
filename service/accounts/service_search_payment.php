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
    
    require_once("service_search.php");
    require_once("../../data/accounts/data_search.php");
    require_once("../connection.php");
    
    $f_day="";
    $f_month="";
    $f_year="";
    
    $t_day="";
    $t_month="";
    $t_year="";

    if(isset($_REQUEST['f_day']))
    {
        $f_day = $_REQUEST['f_day'];
    }

    if(isset($_REQUEST['f_month']))
    {
        $f_month = $_REQUEST['f_month'];
    }

    if(isset($_REQUEST['f_year']))
    {
        $f_year = $_REQUEST['f_year']; 
    }
    
    if(isset($_REQUEST['t_day']))
    {
        $t_day = $_REQUEST['t_day'];
    }

    if(isset($_REQUEST['t_month']))
    {
        $t_month = $_REQUEST['t_month']; 
    }

    if(isset($_REQUEST['t_year']))
    {
        $t_year = $_REQUEST['t_year'];
    }
    

    $from = fromDate($f_day, $f_month, $f_year);
    $to = toDate($t_day, $t_month, $t_year);
    
    $result = search_payment($db, $from, $to);
    

    if($result)
    {
        while($row = mysqli_fetch_assoc($result))
        {
            echo "<tr><td>$row[date]</td>";
            echo "<td>$row[particulars]</td>";
            echo "<td>$row[amount]</td>";
            echo "<td><a href='update_payment_and_purchase.php?entry_id=$row[entry_id]&source=rec_pay'>Edit</a><br>
            <a href='delete_payment_purchase.php?entry_id=$row[entry_id]&source=rec_pay'>delete</a></td></tr>";
        }
    }
    
   

    





?>