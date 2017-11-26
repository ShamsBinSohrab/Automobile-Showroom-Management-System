<?php

    function load_all_received($db,$year,$month)
    {
        $query = "SELECT * FROM accounts_received WHERE date like '$year-$month-%' order by date ASC";
        $result=mysqli_query($db, $query)or die($query);
       
        return $result;
    }

    
    function load_all_payment($db,$year,$month)
    {
        $query = "select * from accounts_payment WHERE date like '$year-$month-%' order by date ASC";
        $result=mysqli_query($db, $query)or die($query);
    
        return $result;
    }

    function load_all_profitloss($db,$year,$month)
    {
		$query = "select * from accounts_profit_loss where date like '$year-$month-%' order by date ASC";
        $result=mysqli_query($db, $query)or die($query);
    
        return $result;
    }

    function load_all_balancesheet($db,$year,$month)
    {
        $query = "select * from accounts_profit_loss WHERE date like '$year-$month-%' order by date ASC";
        $result=mysqli_query($db, $query)or die($query);

        return $result;
  
    }
	function load_all_purchase($db,$year,$month)
    {
        $query = "select * from accounts_vehicle_purchase WHERE date like '$year-$month-%' order by date ASC";
        $result=mysqli_query($db, $query)or die($query);
    
        return $result;
    }
	function load_all_sold($db,$year,$month)
    {
        $query= "select * from accounts_vehicle_sold WHERE date like '$year-$month-%' order by date ASC";
        $result= mysqli_query($db,$query) or die($query);
    
        return $result;
    }
	
	function get_value_purchase($db,$chassis)
	{
        $query= "select amount from accounts_vehicle_purchase WHERE chassis_no like '$chassis'";
        $result= mysqli_query($db,$query) or die($query);
    
        return $result;
	}
	
	function get_value_sold($db,$chassis)
	{
        $query= "select amount, customer_name from accounts_vehicle_sold WHERE chassis_no like '$chassis'";
        $result= mysqli_query($db,$query) or die($query);
    
        return $result;
	}

?>