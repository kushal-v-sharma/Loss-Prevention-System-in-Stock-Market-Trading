<?php

$servername = "127.0.0.1";
$username = "root";
$password = "student";
$dbname = "kushal";


$conn = new mysqli($servername, $username, $password, $dbname);


if ($conn->connect_error) {
    die("Connection failed: " . $conn->connect_error);
}


$symbol = $_POST['symbol'];


$livePrice = getLivePrice($symbol);


echo $livePrice;


$conn->close();


function getLivePrice($symbol) {
    
    return rand(10, 100);
}
?>
