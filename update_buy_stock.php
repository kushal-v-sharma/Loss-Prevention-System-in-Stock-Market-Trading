<?php

$servername = "127.0.0.1";
$username = "root";
$password = "student";
$dbname = "kushal";


$symbol = $_POST['symbol'];
$quantityToSell = $_POST['quantityToSell'];


$conn = new mysqli($servername, $username, $password, $dbname);


if ($conn->connect_error) {
    die("Connection failed: " . $conn->connect_error);
}


$sql = "UPDATE buy_stock SET quantity = quantity - $quantityToSell WHERE symbol = '$symbol'";

if ($conn->query($sql) === TRUE) {
    echo "Buy stock table updated successfully";
} else {
    echo "Error updating buy stock table: " . $conn->error;
}


$conn->close();
?>
