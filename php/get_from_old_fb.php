<?php

/* 
 * To change this license header, choose License Headers in Project Properties.
 * To change this template file, choose Tools | Templates
 * and open the template in the editor.
 */

require_once './db.php';

require_once './event.php';

error_reporting(E_ALL);
ini_set('display_errors', 1);

$getduty= "http://localhost/kosmobio/webhosting/get_duty.php";

$x =  file_get_contents($getduty);

$vagter= json_decode($x, TRUE);

foreach($vagter as $v)
{
if ($v["AA"]==0)
    {
        $e = new EBevent();
        $e->dato = $v["Dato"];
        $e->OP1 = $v["OP1"];
        $e->OP2 = $v["OP2"];
        $e->Cafe1 = $v["Cafe1"];
        $e->Cafe2 = $v["Cafe2"];
        $e->hour = $v["Tid"];
        $e->min="00";
        $x= $v["Tid"];
        if (strlen($x)>2)
        {
            $e->hour = substr($x,0,2);
            $e->min = substr($x,2,2);
        }
        $database->add_duty_event($e);
        
    }
}