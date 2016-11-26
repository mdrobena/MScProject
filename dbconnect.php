<?php
/**
 * Created by PhpStorm.
 * User: 1511989
 * Date: 14/03/2016
 * Time: 10:03
 */

define('DB_SERVER', 'ap-cdbr-azure-east-c.cloudapp.net');
define('DB_USERNAME', 'b21d7723d488a2');
define('DB_PASSWORD', '7359d184');
define('DB_DATABASE', 'md1511989');
$db = mysqli_connect(DB_SERVER, DB_USERNAME, DB_PASSWORD, DB_DATABASE);
?>
