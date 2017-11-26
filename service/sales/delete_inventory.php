<?php

    require_once("../../data/sales/delete_Inventory_Db.php");
    require_once("../connection.php");
    
    if(isset($_REQUEST['chassis_no']))
    {
        
        $chassis_no = $_REQUEST['chassis_no'];
        
        $result_inventory = delete_inventory($db,$chassis_no);
        $result_options = delete_inventory($db,$chassis_no);
        $result_other_options = delete_inventory($db,$chassis_no);
        
        if($result_inventory && $result_options && $result_other_options)
        {
            header("location: ../../view/sales/inventory.php");
        }

    }

?>
