<?php

/* 
 * To change this license header, choose License Headers in Project Properties.
 * To change this template file, choose Tools | Templates
 * and open the template in the editor.
 */

require_once 'php/db.php';

require_once 'php/rtf2text.php';

error_reporting(E_ALL);
ini_set('display_errors', 1);

set_time_limit(0);
 $ret =$database->get_old_logs();
 
 
 $r2tx= new rtf2text();
 foreach ($ret as $r )
 {
 $text=$r2tx->convert2text($r["Logrecord"]);
 
 $database->add_log_entry($r["Dato"],$r["Emne"], $text);
 }
 
                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                          