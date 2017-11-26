<?php

    function get_chassis_no($db,$model)
    {
        $query = "select chassis_no from vehicle_inventory where model like '$model'";

        $result = mysqli_query($db,$query);

        $chassis = "";

        if($result)
        {
            while($row = mysqli_fetch_assoc($result))
            {
                $chassis = $chassis.$row['chassis_no'].",";
            }

            return $chassis;
        }

        else
        {
            return null;
        }

    }

    
    function show_most_viewed($db)
    {
        $query = "select * from most_viewed order by view_counter DESC limit 6";
        
        $result = mysqli_query($db,$query);
        
        $num = mysqli_num_rows($result);
        
        $array = array();
        
        if($num!=0)
        {
            while($row = mysqli_fetch_assoc($result))
            {
                $chassis_list = get_chassis_no($db,$row['model']);
                array_push($array, $chassis_list); 
            }
            
            return $array;
        }
        
        else
        {
            return null;
        }
    }

?>