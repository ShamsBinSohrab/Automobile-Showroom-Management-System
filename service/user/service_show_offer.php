<?php
    
    require_once("../connection.php");
    require_once("../../data/user/data_show_offer.php");


    $result = show_offer($db);

    if($result)
    {
        while($row = mysqli_fetch_assoc($result))
        {
            echo $row['title']."-".$row['file_no'].",";
        }   
    }

    else 
    {
        echo "No Offer";
    }
    

?>