<?php 
	require_once("../../data/sales/add_new_Db.php");

	// function add_new_car_Query($chassis_no,$maker,$model,$grade,$color,$man_year,$engine_no){
	// 	return add_new_car_Query_db($chassis_no,$maker,$model,$grade,$color,$man_year,$engine_no);
	// }

	    if($_SERVER['REQUEST_METHOD'] == "POST")
	    {
	        //mandatory inputs
	        $maker = $_REQUEST['maker'];
	        $model = $_REQUEST['model'];
	        $grade = $_REQUEST['grade'];
	        $color = $_REQUEST['color'];
	        $man_year = $_REQUEST['man_year'];
	        $chassis_no = $_REQUEST['chassis_no'];
	        $engine_no = $_REQUEST['engine_no'];  
	        $cc = $_REQUEST['cc'];  


	        //optional inputs
	        $shape = $_REQUEST['shape'];
	        $start = $_REQUEST['start'];
	        $mileage = $_REQUEST['mileage'];
	        $rim = $_REQUEST['rim'];
	        $wheel_option = $_REQUEST['wheel_option'];
	        $meter = $_REQUEST['meter'];
	        $head_light = $_REQUEST['head_light'];
	        $seat = $_REQUEST['seat'];
	        $seating_capacity = $_REQUEST['seating_capacity'];
	        $body_kit = $_REQUEST['body_kit'];
            $transmission = $_REQUEST['transmission'];  
	        $fuel = $_REQUEST['fuel'];  
	        

	        //select options
	        if(isChecked($_REQUEST['wooden_panel']))
	        {
	        	$wooden_panel = $_REQUEST['wooden_panel'];	
	        }
	        if( isChecked($_REQUEST['cruise_control']))
	        {
	        	$cruise_control =$_REQUEST['cruise_control'];	
	        }
	        if(isChecked($_REQUEST['high_floor']))
	        {
	        	$high_floor = $_REQUEST['high_floor'];
	        }
	        if(isChecked($_REQUEST['rain_shed']))
	        {
	        	$rain_shed = $_REQUEST['rain_shed'];
	        }
	        if(isChecked($_REQUEST['dvd_player']))
	        {
	        $dvd_player = $_REQUEST['dvd_player'];
	        }
	        if(isChecked($_REQUEST['back_camera']))
	        {
	        $back_camera = $_REQUEST['back_camera'];
	        }
	        if(isChecked($_REQUEST['four_cameras']))
	        {
	        $four_cameras = $_REQUEST['four_cameras'];
	        }
	        if(isChecked($_REQUEST['sunroof']))
	        {
	        $sunroof = $_REQUEST['sunroof'];
	        }
	        if(isChecked($_REQUEST['winker_mirror']))
	        {
	        $winker_mirror = $_REQUEST['winker_mirror'];
	        }
	        if(isChecked($_REQUEST['ac']))
	        {
	        $ac =$_REQUEST['ac'] ;
	        }
	        if(isChecked($_REQUEST['rear_ac']))
	        {
	        $rear_ac = $_REQUEST['rear_ac'];
	        }
	        if(isChecked($_REQUEST['third_row_seats']))
	        {
	        $third_row_seats =$_REQUEST['third_row_seats'];
	        }
	        if(isChecked($_REQUEST['air_bag']))
	        {
	        $air_bag = $_REQUEST['air_bag'];
	        }
	        if(isChecked($_REQUEST['high_roof']))
	        {
	        $high_roof = $_REQUEST['high_roof'];
	        }
	        if(isChecked($_REQUEST['low_roof']))
	        {
	        $low_roof = $_REQUEST['low_roof'];
	        }
	        if(isChecked($_REQUEST['wooden_steering']))
	        {
	        $wooden_steering = $_REQUEST['wooden_steering'];
	        }
	        if(isChecked($_REQUEST['low_floor']))
	        {
	        $low_floor =$_REQUEST['low_floor'];
	        }
	        if(isChecked($_REQUEST['roof_rail']))
	        {
	        $roof_rail = $_REQUEST['roof_rail'];
	        }

	        if(check_validity($maker, $model, $grade, $man_year, $chassis_no, $engine_no, $cc))
	        {
	             if(add_new_car($chassis_no,$maker,$model,$grade,$color,$man_year,$engine_no,$cc,$shape,$start,$mileage,$rim,$wheel_option,$meter,$head_light,$seat,$seating_capacity,$body_kit,$transmission,$fuel,$wooden_panel,$cruise_control,$high_floor,$rain_shed,$dvd_player,$back_camera,$four_cameras,$sunroof,$winker_mirror,$ac,$rear_ac,$third_row_seats,$air_bag,$high_roof,$low_roof,$wooden_steering,$low_floor,$roof_rail))
	             {
	             	echo "Added SuccessFully";
	             }
	             else{
	             	
	             	echo "Could not Add Data";
	             }
	             	
	        }

	        else
	        {
	            echo "Could not Add Data";
	        }
	    }

	// Validation
	
	function check_validity($maker, $model, $grade, $man_year, $chassis_no, $engine_no, $cc)
	{
	    if(!empty($maker) && !empty($model) && !empty($grade) && !empty($man_year) && !empty($chassis_no) && !empty($engine_no) && !empty($cc))
	    {
	        return true;
	    }
	    
	    else return false;
	}

	function isChecked($value)
	{
	    if(!empty($value))
	    {
	        return true;
	    }
	    
	    else return false;
	}





 ?>