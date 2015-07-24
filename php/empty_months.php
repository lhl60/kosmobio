<?php

/* 
 * To change this license header, choose License Headers in Project Properties.
 * To change this template file, choose Tools | Templates
 * and open the template in the editor.
 */

require_once './db.php';

error_reporting(E_ALL);
ini_set('display_errors', 1);

$ret = setlocale(LC_COLLATE, "dk_DK");

$database->add_empty_months(3);

