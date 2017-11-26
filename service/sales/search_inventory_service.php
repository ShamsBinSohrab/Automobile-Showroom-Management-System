<?php
	
    require_once("../connection.php");
    require_once("../../data/sales/search_inventory_data.php");
    

    //search all empty
    if($_REQUEST['maker']=="" && $_REQUEST['model']=="" && $_REQUEST['grade']=="" && $_REQUEST['model_year']=="" && $_REQUEST['model_year']=="" && $_REQUEST['color']=="")
    {
            $result = search_empty($db);
            
            if($result)
            {
                 while($row=mysqli_fetch_assoc($result)) {
                    echo "<tr>";
                        echo "<td align = 'center'>$row[maker]</td>";
                        echo "<td align = 'center'>$row[model]</td>";
                        echo "<td align = 'center'>$row[grade]</td>";
                        echo "<td align = 'center'>$row[color]</td>";
                        echo "<td align = 'center'>$row[man_year]</td>";
                        echo "<td align = 'center'>$row[chassis_no]</td>";
                        echo "<td align = 'center'>$row[engine_no]</td>";
                        echo "<td align = 'center' colspan='2'><a href='update_inventory.php?chassis_no=$row[chassis_no]'>Edit</a><br/><a href='../../service/sales/delete_inventory.php?chassis_no=$row[chassis_no]'>Delete</a><br/><a href='show_details.php?chassis_no=$row[chassis_no]'>Show Info</a></td>";
                    echo "</tr>";
                 }
            }
        
            else
            {
                var_dump($result);
            }
           
			
        
    }

    //search via maker
    if($_REQUEST['maker']!="" && $_REQUEST['model']=="" && $_REQUEST['grade']=="" && $_REQUEST['model_year']=="" && $_REQUEST['model_year']=="" && $_REQUEST['color']=="")
    {
            $result = search_maker($db,$_REQUEST['maker']);
            
            if($result && mysqli_num_rows($result) != 0)
            {
                 while($row=mysqli_fetch_assoc($result)) {
                    echo "<tr>";
                        echo "<td align = 'center'>$row[maker]</td>";
                        echo "<td align = 'center'>$row[model]</td>";
                        echo "<td align = 'center'>$row[grade]</td>";
                        echo "<td align = 'center'>$row[color]</td>";
                        echo "<td align = 'center'>$row[man_year]</td>";
                        echo "<td align = 'center'>$row[chassis_no]</td>";
                        echo "<td align = 'center'>$row[engine_no]</td>";
                        echo "<td align = 'center' colspan='2'><a href='update_inventory.php?chassis_no=$row[chassis_no]'>Edit</a><br/><a href='../../service/sales/delete_inventory.php?chassis_no=$row[chassis_no]'>Delete</a><br/><a href='show_details.php?chassis_no=$row[chassis_no]'>Show Info</a></td>";
                    echo "</tr>";
                 }
            }
        
            else if($result && mysqli_num_rows($result) == 0)
            {
                echo "<tr>";
                    echo "<td align = 'center' colspan = '8'><h3>No Such Data Found</h3></td>";
                echo "</tr>";
            }
        
            else
            {
                var_dump($result);
            }   
    }

    //search via model
    else if($_REQUEST['maker']=="" && $_REQUEST['model']!="" && $_REQUEST['grade']=="" && $_REQUEST['model_year']=="" && $_REQUEST['model_year']=="" && $_REQUEST['color']=="")
    {
        $result = search_model($db,$_REQUEST['model']);
        
        if($result && mysqli_num_rows($result) != 0)
            {
                 while($row=mysqli_fetch_assoc($result)) {
                    echo "<tr>";
                        echo "<td align = 'center'>$row[maker]</td>";
                        echo "<td align = 'center'>$row[model]</td>";
                        echo "<td align = 'center'>$row[grade]</td>";
                        echo "<td align = 'center'>$row[color]</td>";
                        echo "<td align = 'center'>$row[man_year]</td>";
                        echo "<td align = 'center'>$row[chassis_no]</td>";
                        echo "<td align = 'center'>$row[engine_no]</td>";
                        echo "<td align = 'center' colspan='2'><a href='update_inventory.php?chassis_no=$row[chassis_no]'>Edit</a><br/><a href='../../service/sales/delete_inventory.php?chassis_no=$row[chassis_no]'>Delete</a><br/><a href='show_details.php?chassis_no=$row[chassis_no]'>Show Info</a></td>";
                    echo "</tr>";
                 }
            }
        
            else if($result && mysqli_num_rows($result) == 0)
            {
                echo "<tr>";
                    echo "<td align = 'center' colspan = '8'><h3>No Such Data Found</h3></td>";
                echo "</tr>";
            }
        
            else
            {
                echo "error";
            }
        
    }
    
     //search via grade
    else if($_REQUEST['maker']=="" && $_REQUEST['model']=="" && $_REQUEST['grade']!="" && $_REQUEST['model_year']=="" && $_REQUEST['model_year']=="" && $_REQUEST['color']=="")
    {
        $result = search_grade($db,$_REQUEST['grade']);
        
        if($result && mysqli_num_rows($result) != 0)
            {
                 while($row=mysqli_fetch_assoc($result)) {
                    echo "<tr>";
                        echo "<td align = 'center'>$row[maker]</td>";
                        echo "<td align = 'center'>$row[model]</td>";
                        echo "<td align = 'center'>$row[grade]</td>";
                        echo "<td align = 'center'>$row[color]</td>";
                        echo "<td align = 'center'>$row[man_year]</td>";
                        echo "<td align = 'center'>$row[chassis_no]</td>";
                        echo "<td align = 'center'>$row[engine_no]</td>";
                        echo "<td align = 'center' colspan='2'><a href='update_inventory.php?chassis_no=$row[chassis_no]'>Edit</a><br/><a href='../../service/sales/delete_inventory.php?chassis_no=$row[chassis_no]'>Delete</a><br/><a href='show_details.php?chassis_no=$row[chassis_no]'>Show Info</a></td>";
                    echo "</tr>";
                 }
            }
        
            else if($result && mysqli_num_rows($result) == 0)
            {
                echo "<tr>";
                    echo "<td align = 'center' colspan = '8'><h3>No Such Data Found</h3></td>";
                echo "</tr>";
            }
        
            else
            {
                echo "error";
            }
    }

     //search via model_year
    else if($_REQUEST['maker']=="" && $_REQUEST['model']!="" && $_REQUEST['grade']=="" && $_REQUEST['model_year']=="" && $_REQUEST['model_year']!="" && $_REQUEST['color']=="")
    {
        $result = search_model_year($db,$_REQUEST['model_year']);
        
        if($result && mysqli_num_rows($result) != 0)
            {
                 while($row=mysqli_fetch_assoc($result)) {
                    echo "<tr>";
                        echo "<td align = 'center'>$row[maker]</td>";
                        echo "<td align = 'center'>$row[model]</td>";
                        echo "<td align = 'center'>$row[grade]</td>";
                        echo "<td align = 'center'>$row[color]</td>";
                        echo "<td align = 'center'>$row[man_year]</td>";
                        echo "<td align = 'center'>$row[chassis_no]</td>";
                        echo "<td align = 'center'>$row[engine_no]</td>";
                        echo "<td align = 'center' colspan='2'><a href='update_inventory.php?chassis_no=$row[chassis_no]'>Edit</a><br/><a href='../../service/sales/delete_inventory.php?chassis_no=$row[chassis_no]'>Delete</a><br/><a href='show_details.php?chassis_no=$row[chassis_no]'>Show Info</a></td>";
                    echo "</tr>";
                 }
            }
        
            else if($result && mysqli_num_rows($result) == 0)
            {
                echo "<tr>";
                    echo "<td align = 'center' colspan = '8'><h3>No Such Data Found</h3></td>";
                echo "</tr>";
            }
        
            else
            {
                echo "error";
            }
    }
    
     //search via color
    else if($_REQUEST['maker']=="" && $_REQUEST['model']=="" && $_REQUEST['grade']=="" && $_REQUEST['model_year']=="" && $_REQUEST['model_year']=="" && $_REQUEST['color']!="")
    {
        $result = search_color($db,$_REQUEST['color']);
        
       if($result && mysqli_num_rows($result) != 0)
            {
                 while($row=mysqli_fetch_assoc($result)) {
                    echo "<tr>";
                        echo "<td align = 'center'>$row[maker]</td>";
                        echo "<td align = 'center'>$row[model]</td>";
                        echo "<td align = 'center'>$row[grade]</td>";
                        echo "<td align = 'center'>$row[color]</td>";
                        echo "<td align = 'center'>$row[man_year]</td>";
                        echo "<td align = 'center'>$row[chassis_no]</td>";
                        echo "<td align = 'center'>$row[engine_no]</td>";
                        echo "<td align = 'center' colspan='2'><a href='update_inventory.php?chassis_no=$row[chassis_no]'>Edit</a><br/><a href='../../service/sales/delete_inventory.php?chassis_no=$row[chassis_no]'>Delete</a><br/><a href='show_details.php?chassis_no=$row[chassis_no]'>Show Info</a></td>";
                    echo "</tr>";
                 }
            }
        
            else if($result && mysqli_num_rows($result) == 0)
            {
                echo "<tr>";
                    echo "<td align = 'center' colspan = '8'><h3>No Such Data Found</h3></td>";
                echo "</tr>";
            }
        
            else
            {
                echo "error";
            }
    }

    else if($_REQUEST['maker']!="" && $_REQUEST['model']!="" && $_REQUEST['grade']=="" && $_REQUEST['model_year']=="" && $_REQUEST['model_year']=="" && $_REQUEST['color']=="")
    {
        $result = search_maker_model($db,$_REQUEST['maker'],$_REQUEST['model']);
        
       if($result && mysqli_num_rows($result) != 0)
            {
                 while($row=mysqli_fetch_assoc($result)) {
                    echo "<tr>";
                        echo "<td align = 'center'>$row[maker]</td>";
                        echo "<td align = 'center'>$row[model]</td>";
                        echo "<td align = 'center'>$row[grade]</td>";
                        echo "<td align = 'center'>$row[color]</td>";
                        echo "<td align = 'center'>$row[man_year]</td>";
                        echo "<td align = 'center'>$row[chassis_no]</td>";
                        echo "<td align = 'center'>$row[engine_no]</td>";
                        echo "<td align = 'center' colspan='2'><a href='update_inventory.php?chassis_no=$row[chassis_no]'>Edit</a><br/><a href='../../service/sales/delete_inventory.php?chassis_no=$row[chassis_no]'>Delete</a><br/><a href='show_details.php?chassis_no=$row[chassis_no]'>Show Info</a></td>";
                    echo "</tr>";
                 }
            }
        
            else if($result && mysqli_num_rows($result) == 0)
            {
                echo "<tr>";
                    echo "<td align = 'center' colspan = '8'><h3>No Such Data Found</h3></td>";
                echo "</tr>";
            }
        
            else
            {
                echo "error";
            }
    }

?>