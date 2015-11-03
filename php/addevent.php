<?php
include('./login/session.php');

if (!$_SESSION['is_admin'])
 {
    echo "fejl: illegal adgang, kun for administrator";
 }
 $str= json_decode(file_get_contents('php://input'));
 
  $y=date_create_from_format("d/m-Y",$str->dato);
  
  
 if ($database->event_datetime_exist(date_format($y,"Y-m-d"),$str->time))
 {
     echo "fejl: der findes allerede et arrangment på samme dato og tid";
 }
else
{
     $database->add_manual_event(date_format($y,"Y-m-d"),$str->time,$str->title,$str->note,$str->dag)  ;
}
 