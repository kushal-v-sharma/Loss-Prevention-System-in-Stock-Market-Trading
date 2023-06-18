<?php
    
    $servername = "127.0.0.1";
    $username = "root";
    $password = "student";
    $dbname = "kushal";

    $conn = new mysqli($servername, $username, $password, $dbname);
    if ($conn->connect_error) {
        die("Connection failed: " . $conn->connect_error);
    }

    
    $cardNumber = $_POST["cardNumber"];
    $expiryDate = $_POST["expiryDate"];
    $cvv = $_POST["cvv"];
    $amount = $_POST["amount"];

    
    $sql = "INSERT INTO payment (cardNumber, expiryDate, cvv, amount) VALUES ('$cardNumber', '$expiryDate', '$cvv', '$amount')";
    if ($conn->query($sql) === TRUE) {
        echo "Card details stored successfully";
    } else {
        echo "Error storing card details: " . $conn->error;
    }

    $conn->close();
?>
