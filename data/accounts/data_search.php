<?php

    function search_received($db, $from, $to)
    {
        $query = "select * from accounts_received where date between '$from' and '$to' order by date ASC";
        
        $result = mysqli_query($db,$query);
        
        return $result;
        
    }

    function search_payment($db, $from, $to)
    {
        $query = "select * from accounts_payment where date between '$from' and '$to' order by date ASC";
        
        $result = mysqli_query($db,$query);
        
        return $result;
        
    }

    function search_purchase($db, $from, $to)
    {
        $query = "select * from accounts_vehicle_purchase where date between '$from' and '$to' order by date ASC";
        
        $result = mysqli_query($db,$query);
        
        return $result;
        
    }

    function search_sold($db, $from, $to)
    {
        $query = "select * from accounts_vehicle_sold where date between '$from' and '$to' order by date ASC";
        
        $result = mysqli_query($db,$query);
        
        return $result;
        
    }


?>