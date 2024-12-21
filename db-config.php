<?php 

include 'loadenv.php';

$hostName = $_ENV['SERVERNAME'];
$userName = $_ENV['USERNAME'];
$password = $_ENV['PASSWORD'];
$dbName   = $_ENV['DATABASE'];

$conn = mysqli_connect($hostName,$userName,$password,$dbName);

if(!$conn){
    die('db not connected' . mysqli_connect_error());
}
?>