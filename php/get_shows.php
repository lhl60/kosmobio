
<?php
//        header("Access-Control-Allow-Origin: *");
    require_once './db.php';


    $ret =$database->get_future_shows();  
    echo ($ret);
?>
