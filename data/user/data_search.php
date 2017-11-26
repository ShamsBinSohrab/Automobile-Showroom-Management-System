<?php

    function search_filter($db, $model, $brand, $model_year, $color)
    {
        $query = "select chassis_no from vehicle_inventory where (maker like '$brand%' and model like '$model%') and (man_year like '$model_year%' and model like '$model%') and (color like '$color%' and model like '$model%')";
        
        $result = mysqli_query($db,$query) or die ($query);
        
        $num = mysqli_num_rows($result);
        
        if($num > 0)
        {
            return $result;
        }
        
        else return false;
    }
?>