<?php

$conn = mysqli_connect("127.0.0.1", "root", "student", "kushal");
if ($conn->connect_error) {
    die("Connection failed: " . $conn->connect_error);
}


$stockSymbol = $_POST['stock_symbol'];
$stockAmount = $_POST['stock_amount'];
$cardNumber = $_POST['card_number'];
$expiryDate = $_POST['expiry_date'];
$cvv = $_POST['cvv'];


$sql = "INSERT INTO payment (payment_method, card_number, card_expiry, card_cvv, amount) VALUES ('Credit/Debit Card', '$cardNumber', '$expiryDate', '$cvv', '$stockAmount')";

if ($conn->query($sql) === TRUE) {
    echo "Payment successful. Stock: " . $stockSymbol . ", Amount: " . $stockAmount;
} else {
    echo "Error: " . $sql . "<br>" . $conn->error;
}

$conn->close();
?>
