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
	
	require_once("../../data/admin/data_add_offer.php");

	if(isset($_REQUEST['title']) && isset($_REQUEST['maker']) && isset ($_REQUEST['model']) && isset($_REQUEST['year']) && isset($_REQUEST['detail']))
	{
		$title = $_REQUEST['title'];
		$maker = $_REQUEST['maker'];
		$model = $_REQUEST['model'];
		$model_year = $_REQUEST['year'];
		$detail = $_REQUEST['detail'];

		$result = add_offer($title, $maker, $model, $model_year, $detail);

		if($result)
		{
			echo "*** Offer Published ***";
		}

		else
		{
			echo "Something Error Occurred";
		}
	}

	
?>