<?php
    
    $servername = "127.0.0.1";
    $username = "root";
    $password = "student";
    $dbname = "kushal";

    $conn = new mysqli($servername, $username, $password, $dbname);
    if ($conn->connect_error) {
        die("Connection failed: " . $conn->connect_error);
    }

    
    $stockId = $_POST["stockId"];

  
    $sql = "SELECT * FROM stocks WHERE id = $stockId";
    $result = $conn->query($sql);

    if ($result->num_rows > 0) {
        
        $row = $result->fetch_assoc();
        $symbol = $row["symbol"];
        $quantity = $row["quantity"];
        $amount = $row["amount"];
        $time = date("Y-m-d H:i:s");

        $sql = "INSERT INTO buy_stock (symbol, quantity, amount, time) VALUES ('$symbol', '$quantity', '$amount', '$time')";
        if ($conn->query($sql) === TRUE) {
            echo "Stock details stored successfully";
        } else {
            echo "Error storing stock details: " . $conn->error;
        }
    } else {
        echo "Stock not found";
    }

    $conn->close();
?>
