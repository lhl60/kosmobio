<?php
include('./login/session.php');

if (!$_SESSION['is_admin'])
 {
    echo "fejl: illegal adgang, kun for administrator";
 }
 $str= json_decode(file_get_contents('php://input'));
 
 if  ($database->event_id_exist($str->id))
   
 {
     $database-> delete_manual_event($str->id);
 }
