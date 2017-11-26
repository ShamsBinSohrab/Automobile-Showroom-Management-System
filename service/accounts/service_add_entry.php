<?php
   
    if(!isset($_SESSION))
    {
        session_start();
        
        if($_SESSION['user'] == null)
        {
            header("location: ../../index.php");
        }
    }
    
?>
<?php
        
require_once ("../../data/accounts/data_add_entry.php");
require_once ("../connection.php");
require_once ("../../data/accounts/data_profit_loss.php");
        
        
        if(isset($_REQUEST['amount']) && isset($_REQUEST['transaction_type']) && isset($_REQUEST['description']))
        {
            if(isset($_REQUEST['catagory']) && ($_REQUEST['catagory'] == "carpurchase" || $_REQUEST['catagory'] == "carsold"))
            {
                if(isset($_REQUEST['chassis_no']))
                {
                    $amount=$_REQUEST['amount'];
                    $transaction_type=$_REQUEST['transaction_type'];
                    $description=$_REQUEST['description'];
                    $catagory=$_REQUEST['catagory'];
                    $date=$_REQUEST['date'];
                    $chassis_no=$_REQUEST['chassis_no'];
                    
                    
                }
            }
            
            else if(isset($_REQUEST['catagory']))
            {   
                $amount=$_REQUEST['amount'];
                $transaction_type=$_REQUEST['transaction_type'];
                $description=$_REQUEST['description'];
                $catagory=$_REQUEST['catagory'];
                $date=$_REQUEST['date'];
                $chassis_no="";
            }
            
            else
            {
                $amount="0";
                $transaction_type="-";
                $description="-";
                $catagory="-";
                $date="-";
                $chassis_no="-"; 
            }
        }
        else
        {
                $amount="0";
                $transaction_type="-";
                $description="-";
                $catagory="-";
                $date="-";
                $chassis_no="-"; 
        }
        if($transaction_type == "received")
        {
            $id = uniqid('rec-');
            
            if($catagory == "carsold")
            {   
				$answer = chassisExists($db,$chassis_no);
				$status = status($db,$chassis_no);
				$row_status = mysqli_fetch_assoc($status);
				
				if($answer == 1 && $row_status['status'] == 'available')
				{
					$result_vehicle_sold = add_vehicle_sold($db, $id, $date, $chassis_no, $amount, $description);
					$result_received = add_received($db, $id, $date, $description, $amount);
					$data_array = calculate($db,$chassis_no);
					add_profit_loss($db,$data_array);
					updatepurchaseaftersold($db, $chassis_no);
					
					if($result_received && $result_vehicle_sold)
					{
						echo "Record Added Successfully!!";
					}
					
					else
					{
						echo "Error";
					}  
				}
            
                else
                {
                    echo "Chassis Does Not Exist";
                }  
            }
            
            else
            {
                echo "Error Impossible Entry!!";
            }
        }

        else if($transaction_type == "payment")
        {
            $id = uniqid('pay-');
            
            if($catagory == "carpurchase")
            {	
				$status="available";
                $result_payment = add_payment($db, $id, $date, $description, $amount);
                $result_vehicle_purchase = add_vehicle_purchase($db, $id, $date, $chassis_no, $amount, $description, $status);
                
                if($result_payment && $result_vehicle_purchase)
                {
                    echo "Record Added Successfully!!";
                }
                
                else
                {
                    echo "Error!!";
                } 
            }
            
            else if($catagory == "expense")
            {
                $result_payment = add_payment($db, $id, $date, $description, $amount);
                $result_expense = add_expense($db, $id, $date, $description, $amount);
                
                if($result_payment && $result_expense)
                {
                    echo "Record Added Successfully!!";
                }
                
                else
                {
                    echo "Error";
                } 
            }
            
            else
            {
                echo "Error Impossible Entry";
            }
        }

?>