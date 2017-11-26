<?php
    
    function load_xml_file($filename)
    {
        $xml = simplexml_load_file("../../temp_server/$filename");
        
        return $xml;
    }
?>