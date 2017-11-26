<?php
	
    function search_empty($db)
    {
        $query = "select * from vehicle_inventory";

        $result = mysqli_query($db,$query) or die ($query);

        return $result;
    }

    function search_model($db, $model)
    {
        $query = "select * from vehicle_inventory where model like '$model%'";
        
        $result = mysqli_query($db,$query) or die ($query);
        
        return $result;
    }

    function search_maker($db, $maker)
    {
        $query = "select * from vehicle_inventory where maker like '$maker%'";
        
        $result = mysqli_query($db,$query) or die ($query);
        
        return $result;
    }

    function search_grade($db, $grade)
    {
        $query = "select * from vehicle_inventory where grade like '$grade%'";
        
        $result = mysqli_query($db,$query) or die ($query);
        
        return $result;
    }

    function search_model_year($db, $model_year)
    {
        $query = "select * from vehicle_inventory where man_year like '$model_year%'";
        
        $result = mysqli_query($db,$query) or die ($query);
        
        return $result;
    }
    
    function search_color($db, $color)
    {
        $query = "select * from vehicle_inventory where color like '$color%'";
        
        $result = mysqli_query($db,$query) or die ($query);
        
        return $result;
    }

    function search_maker_model($db, $maker, $model)
    {
        $query = "select * from vehicle_inventory where maker like '$maker%' and model like '$model%'";
        
        $result = mysqli_query($db,$query) or die ($query);
        
        return $result;
    }
    

?>