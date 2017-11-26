<?php
    
    require_once("../connection.php");
    require_once("../../data/user/data_load_offer.php");
    
    $filename = $_REQUEST['file'];

    $xml = load_xml_file($filename);

    if($xml != null)
    {
        echo "Title: ".$xml->title.",";
        echo "Maker: ".$xml->maker.",";
        echo "Model: ".$xml->model.",";
        echo "Model Year: ".$xml->model_year.",";
        echo "Detail: ".$xml->detail;
    }

    else
    {
        echo "No Data";
    }

?>