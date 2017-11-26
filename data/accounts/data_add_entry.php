<?php
    
    function add_payment($db, $id, $date, $description, $amount)
    {
        $query = "insert into accounts_payment (entry_id, date, particulars, amount) value ('$id','$date','$description',$amount)";
        
        $result = mysqli_query($db,$query) or die($query);
        
        return $result;   
    }

    function add_vehicle_purchase($db, $id, $date, $chassis_no, $amount, $importer_name ,$status)
    {   
        $query = "insert into accounts_vehicle_purchase (entry_id, date, chassis_no, amount, importer_name, status) values ('$id','$date','$chassis_no', $amount,'$importer_name','$status')";
        
        $result = mysqli_query($db,$query) or die($query);
        
        return $result;
    }

    function add_received($db, $id, $date, $description, $amount)
    {   
        $query = "insert into accounts_received (entry_id, date, particulars, amount) value ('$id','$date','$description', $amount)";
        
        $result = mysqli_query($db,$query) or die($query);
        
        return $result;
        
    }

    function add_vehicle_sold($db, $id, $date, $chassis_no, $amount, $customer_name)
    {   
        $query = "insert into accounts_vehicle_sold (entry_id, date, chassis_no, amount, customer_name) values ('$id','$date','$chassis_no', $amount,'$customer_name')";
        
        $result = mysqli_query($db,$query) or die($query);
        
        return $result;
    }
	function add_profit_loss($db, $array)
	{	
		$amount = $array['amount'];
		$customer = $array['customer'];
		$date = $array['date'];
		$chassis_no = $array['chassis_no'];

		$id = uniqid('proloss-');
		
		if($amount>0)
		{
			$query = "insert into accounts_profit_loss (entry_id, date, chassis_no, profit, loss, remarks) values ('$id','$date','$chassis_no', $amount, 0, 'profit')";
		}
		
		if($amount<0)
		{
			$amount=(-1*$amount);
			$query = "insert into accounts_profit_loss (entry_id, date, chassis_no, profit, loss, remarks) values ('$id','$date','$chassis_no', 0, $amount, 'loss')";
		}
		
		$result =  mysqli_query($db,$query) or die($query);
        
        return $result;
	}
    function add_expense($db, $id, $date, $description, $amount)
    {
        $query = "insert into accounts_expense (entry_id, date, particulars, amount) values ('$id','$date', '$description', $amount)";
        
        $result = mysqli_query($db,$query) or die($query);
        
        return $result;
    }
?>