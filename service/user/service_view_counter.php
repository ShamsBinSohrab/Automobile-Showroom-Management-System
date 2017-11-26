<?php
   
    //require_once("../connection.php");
    require_once("../../data/user/data_view_counter.php");

    function increase_counter($chassis)
    { 
        global $db;
        return set_counter($db,$chassis);
    }

    function add_new_model($chassis)
    {
        global $db;
        add_model($db,$chassis); 
    }



?>