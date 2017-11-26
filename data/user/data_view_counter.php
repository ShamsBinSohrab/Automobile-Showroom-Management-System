<?php
    
    function get_model($db,$chassis)
    {
        $query = "select model from vehicle_inventory where chassis_no like '$chassis'";
        
        $result = mysqli_query($db,$query) or die($query);
        
        if($result)
        {
            $row = mysqli_fetch_assoc($result);
            
            $model = $row['model'];
            
            return $model;
        }
    }

    function get_counter($db,$model)
    {
        $query = "select view_counter from most_viewed where model like '$model'";
        
        $result = mysqli_query($db,$query) or die($query);
        
        if($result)
        {
            $row = mysqli_fetch_assoc($result);
            
            $count = $row['view_counter'];
            
            return ++$count;
        }
        
        else return null;
    }

    function set_counter($db,$chassis)
    {
        $model = get_model($db,$chassis);
        
        $new_counter = get_counter($db,$model);
        
        $query = "update most_viewed set view_counter = $new_counter where model like '$model'";

        $result = mysqli_query($db,$query) or die($query);
        
        $num = mysqli_affected_rows($db);
        
        if($num != 0)
        {
            return true;
        }
        
        else
        {
            return false;
        }
    }

    function add_model($db, $chassis)
    {
        $model = get_model($db,$chassis);
        
        $query = "insert into most_viewed(id,model,view_counter) values (DEFAULT,'$model',0)";
        
        $result = mysqli_query($db,$query) or die($query);
    }


?>