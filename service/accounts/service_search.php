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

    function fromDate($f_day, $f_month, $f_year)
    {   
        $current_day = str_pad(date('d'),2,"0",STR_PAD_LEFT);
        $current_month = str_pad(date('n'),2,"0",STR_PAD_LEFT);
        $current_year = date('Y');
        
        //day
        if(!empty($f_day) && empty($f_month) && empty($f_year))
        {
            $from = $current_year."-".$current_month."-".$f_day;  
        }
        
        //month
        if(empty($f_day) && !empty($f_month) && empty($f_year))
        {
            $from = $current_year."-".$f_month."-"."01";  
        }
        
        //year
        if(empty($f_day) && empty($f_month) && !empty($f_year))
        {
            $from = $f_year."-"."01"."-"."01";  
        }
        
        //day-month
        if(!empty($f_day) && !empty($f_month) && empty($f_year))
        {
            $from = $current_year."-".$f_month."-".$f_day;  
        }
        
        //month-year
        if(empty($f_day) && !empty($f_month) && !empty($f_year))
        {
            $from = $f_year."-".$f_month."-"."01";  
        }
        
        //day-month-year
        else if(!empty($f_day) && !empty($f_month) && !empty($f_year))
        {
            $from = "$f_year"."-"."$f_month"."-"."$f_day"; 
        }
        
        return $from;
    }

    function toDate($t_day, $t_month, $t_year)
    {   
        $current_day = str_pad(date('d'),2,"0",STR_PAD_LEFT);
        $current_month = str_pad(date('n'),2,"0",STR_PAD_LEFT);
        $current_year = date('Y');
        
        //day
        if(!empty($t_day) && empty($t_month) && empty($t_year))
        {
            $to = $current_year."-".$current_month."-".$t_day;  
        }
        
        //month
        if(empty($t_day) && !empty($t_month) && empty($t_year))
        {
            $to = $current_year."-".$t_month."-"."31";  
        }
        
        //year
        if(empty($t_day) && empty($t_month) && !empty($t_year))
        {
            $to = $f_year."-"."12"."-"."31";  
        }
        
        //day-month
        if(!empty($t_day) && !empty($t_month) && empty($t_year))
        {
            $to = $current_year."-".$t_month."-".$t_day;  
        }
        
        //month-year
        if(empty($t_day) && !empty($t_month) && !empty($t_year))
        {
            $to = $t_year."-".$t_month."-"."31";  
        }
        
        //day-month-year
        else if(!empty($t_day) && !empty($t_month) && !empty($t_year))
        {
            $to = "$t_year"."-"."$t_month"."-"."$t_day"; 
        }
        
        return $to;
    }
    
?>