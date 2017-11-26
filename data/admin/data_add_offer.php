<?php

	function add_offer($title, $maker, $model, $model_year, $detail)
	{
		require_once("../connection.php");
        
        $xml = new DOMDocument();
        
        $xml_root = $xml->createElement("offer");
        $xml_title = $xml->createElement("title");
        $xml_maker = $xml->createElement("maker");
        $xml_model = $xml->createElement("model");
        $xml_model_year = $xml->createElement("model_year");
        $xml_detail = $xml->createElement("detail");
        
        $xml_title->nodeValue = "$title";
        $xml_maker->nodeValue = "$maker";
        $xml_model->nodeValue = "$model";
        $xml_model_year->nodeValue = "$model_year";
        $xml_detail->nodeValue = "$detail";
        
        $xml_root->appendChild($xml_title);
        $xml_root->appendChild($xml_maker);
        $xml_root->appendChild($xml_model);
        $xml_root->appendChild($xml_model_year);
        $xml_root->appendChild($xml_detail);
        
        $xml->appendChild($xml_root);
        
        $count = get_count($db);
        
        $result = add_offer_to_db($db,$title,$count);
        
        if($result)
        {
            $xml->save("../../temp_server/".$count.".xml");
            
            return true;  
        }
        
        else
        {
            return false;
        }
	}

    function get_count($db)
    {
        $query = "select file_no from offer_table";
        
        $result = mysqli_query($db,$query) or die($query);
        
        $counter = mysqli_num_rows($result);
        
        return ++$counter;
        
    }

    function add_offer_to_db($db, $title, $file_no)
    {
        $id = uniqid('offer-');
        
        $query = "insert into offer_table(id,title,file_no,view_counter) values('$id','$title','$file_no',0)";
        
        $result = mysqli_query($db,$query) or die($query);
        
        if($result)
        {
            return $result;
        }
        
        else return false;
    }

?>