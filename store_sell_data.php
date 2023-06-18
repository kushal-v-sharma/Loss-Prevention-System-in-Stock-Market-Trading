<?php

$servername = "127.0.0.1";
$username = "root";
$password = "student";
$dbname = "kushal";


$symbol = $_POST["symbol"];
$quantity = $_POST["quantity"];
$amount = $_POST["amount"];
$currentPrice = $_POST["currentPrice"];
$profitLoss = $_POST["profitLoss"];


$conn = new mysqli($servername, $username, $password, $dbname);


if ($conn->connect_error) {
    die("Connection failed: " . $conn->connect_error);
}


$sql = "INSERT INTO sell_stock (symbol, quantity, amount, current_price, current_profit_loss, quantity_to_sell) 
        VALUES ('$symbol', $quantity, $amount, $currentPrice, $profitLoss, $quantity)";

if ($conn->query($sql) === TRUE) {
    
    $deleteSql = "DELETE FROM buy_stock WHERE symbol = '$symbol' AND quantity = $quantity AND amount = $amount";
    $conn->query($deleteSql);

    echo "success";
} else {
    echo "error";
}


$conn->close();
?>
