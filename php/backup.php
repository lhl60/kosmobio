<?php

error_reporting(E_ALL);
ini_set('display_errors', 1);
include_once(dirname(__FILE__) . '/mysqldump-php-master/src/Ifsnop/Mysqldump/Mysqldump.php');

$x = dirname(__FILE__) . './local.php';

$local=FALSE;
      
if (file_exists(dirname(__FILE__) . '/local.php'))
{
    require_once dirname(__FILE__) . '/local.php';
}

if ($local)
{
    $dump = new Ifsnop\Mysqldump\Mysqldump('filmbasen', 'mdbuser1034670', 'ccbzm6ad', 'localhost');
} else
{
    $dump = new Ifsnop\Mysqldump\Mysqldump('kosmobio_dk', 'kosmobio_dk', '52sJectJ', 'kosmobio.dk.mysql');
}
$fname = '../db-backup/' . date('d-M-Y') . '-dump.sql';
touch($fname);
$dump->start($fname);

echo "backup Complete " . $fname;
?>



<?php

