<?php
    
    require_once("../connection.php");
    require_once("../../data/user/data_search.php");
    
    $color = "";
    $year = "";
    $brand = "";
    
    if(isset($_REQUEST['color']))
    {
        $color = $_REQUEST['color'];
    }
    
    if(isset($_REQUEST['year']))
    {
        $year = $_REQUEST['year'];
    }

    if(isset($_REQUEST['brand']))
    {
        $brand = $_REQUEST['brand'];
    }
    if(isset($_REQUEST['search_bar']) && $_REQUEST['search_bar'] != "")
    {
        $result = search_filter($db, $_REQUEST['search_bar'],$brand,$year,$color);
        
        if($result)
        {
            while($row = mysqli_fetch_assoc($result))
            {
                $chassis = $row['chassis_no'];
                echo "$chassis,";
            }
            
        }
        
        else
        {
           echo "";
        }
    }
    
    
    


?>