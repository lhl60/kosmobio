<?php
include('./login/session.php');

if (!$_SESSION['is_admin'])
 {
    echo "fejl: illegal adgang, kun for administrator";
 }
 $str= json_decode(file_get_contents('php://input'));
 
  $y=date_create_from_format("d/m-Y",$str->dato);
  
  
 if ( !$database->event_id_exist($str->row_id) )
 {
     echo "fejl: der findes ikke et arrangment på denne dato og tid";
 }
else
{
     $database->update_manual_event(date_format($y,"Y-m-d"),$str->time,$str->title,$str->note,$str->dag,$str->row_id)  ;
}
 