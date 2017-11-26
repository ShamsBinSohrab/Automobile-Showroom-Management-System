<?php
    
    require_once("../connection.php");
    require_once("../../data/user/data_most_viewed.php");

    $array = show_most_viewed($db);
   // var_dump($array);
    
    $array_limit = count($array);

    if(!empty($array))
    {
        for($i = 0; $i < $array_limit; $i++ )
        {
            echo $array[$i];
        }
    }

    else
    {
        echo "";
    }


?>