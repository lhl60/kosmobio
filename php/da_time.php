<?php
  
  
  /// return date particulars as FilmBasen Requires 
  // based on a PHP:Datetime object
  
 function get_week_day($datetime)
 {
     $day_names =array("Søndag","Mandag","Tirsdag","Onsdag","Torsdag","Fredag","Lørdag");
     
     $dn =$datetime->format("w");
     return utf8_encode($day_names[$dn]);
 }
 
 function get_dato($datetime)
 {    
    return ($datetime->format("Y-m-d"));
 }
 
 function get_hour_min($datetime)
 {
  
     $min = $datetime->format("i");
     $hour = $datetime->format("H");
     if ($min == "00")   
     {
         return $hour;
     }
     else
     return $hour.$min;
 }
 

