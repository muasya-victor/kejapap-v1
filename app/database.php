<?php

require_once realpath(__DIR__ . "/../vendor/autoload.php");

use Dotenv\Dotenv;

$dotenv = Dotenv::createImmutable(__DIR__ . "/../");
$dotenv->load();

$ip = $_ENV['DATABASE_IP'];
$user = $_ENV['DATABASE_USER'];
$password = $_ENV['DATABASE_PASSWORD'];
$database = $_ENV['DATABASE_NAME'];

ob_start();
?>

<?php
$connection = mysqli_connect($ip, $user, $password, $database);

if($connection) {
   echo " ";
}else {
    echo "error during connection";
}
?>
