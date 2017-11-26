<?php

    function show_offer($db)
    {
        $query = "select title, file_no from offer_table order by file_no DESC limit 5";
        
        $result = mysqli_query($db,$query) or die($query);
        
        if($result)
        {
            return $result;
        }
        
        else return false;
    }


?>