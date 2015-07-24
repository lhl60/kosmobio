<?php

if (!defined('DATATABLES'))
    exit(); // Ensure being used in DataTables env.

    /*
     * DB connection script for Editor
     * Created by http://editor.datatables.net/generator
     */

// Enable error reporting for debugging (remove for production)
error_reporting(E_ALL);
ini_set('display_errors', '1');

/*
 * Edit the following with your database connection options
 */
$local = TRUE;
if ($local === TRUE) {
    $sql_details = array(
        "type" => "Mysql",
        "user" => "mdbuser1034670",
        "pass" => "ccbzm6ad",
        "host" => "localhost",
        "port" => "",
        "db" => "filmbasen",
        "dsn" => "charset=utf8"
    );
        
} else {


    $sql_details = array(
        "type" => "Mysql",
        "user" => "kosmobio_dk",
        "pass" => "52sJectJ",
        "host" => "kosmobio.dk.mysql",
        "port" => "",
        "db" => "kosmobio_dk",
        "dsn" => "charset=utf8"
    );
}