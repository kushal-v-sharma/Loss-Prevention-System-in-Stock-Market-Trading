<?php

$servername = "127.0.0.1";
$username = "root";
$password = "student";
$dbname = "kushal";

$conn = new mysqli($servername, $username, $password, $dbname);
if ($conn->connect_error) {
    die("Connection failed: " . $conn->connect_error);
}


if (isset($_GET['delete'])) {
    $id = $_GET['delete'];

    
    $sql = "DELETE FROM stocks WHERE id = '$id'";

    if ($conn->query($sql) === true) {
        echo "Stock deleted successfully.";
    } else {
        echo "Error: " . $sql . "<br>" . $conn->error;
    }
}


$sql = "SELECT id, symbol, quantity, amount, date_of_issue FROM stocks";
$result = $conn->query($sql);
?>

<!DOCTYPE html>
<html>
<head>
    <title>Manage Stocks</title>
    <link rel="stylesheet" type="text/css" href="style2.css">
    <script src="script2.js"></script>
    <style>
    body {
      background-image: url("b1.gif");
      background-repeat: no-repeat;
      background-size: cover;
    }
  </style>
</head>

<header>
      <h1>Manage Stocks</h1>
      <div>
        <button class="btn btn-primary"><a href="index.html">Home</a></button>
        <button class="btn btn-primary"><a href="main.html">Dashboard</a></button>
        <button class="btn btn-primary"><a href="add_stock.php">Add Stock</a></button>
        <button class="btn btn-primary"><a href="stockhistory.php">Stock History</a></button>
        <button class="btn btn-primary"><a href="viewlivestock.html">Live Stock</a></button>
        <button class="btn btn-primary"><a href="logoutadmin.html">Log Out</a></button>
      </div>
    </header>
    <table>
      <thead>
        <tr>
            <th>ID</th>
            <th>Symbol</th>
            <th>Quantity</th>
            <th>Amount</th>
            <th>Date_of_issue</th>
            <th>Action</th>
        </tr>
</thead>
        <?php
        if ($result->num_rows > 0) {
            while ($row = $result->fetch_assoc()) {
                $id = $row["id"];
                $symbol = $row["symbol"];
                $quantity = $row["quantity"];
                $amount = $row["amount"];
                $date = $row["date_of_issue"];
                echo "<tr>";
                echo "<td>$id</td>";
                echo "<td>$symbol</td>";
                echo "<td>$quantity</td>";
                echo "<td>$amount</td>";
                echo "<td>$date</td>";
                echo "<td><a href='managestock.php?delete=$id'>Delete</a></td>";
                echo "</tr>";
            }
        } else {
            echo "<tr><td colspan='6'>No stocks found.</td></tr>";
        }
        ?>
    </table>
</body>
</html>

<?php

$conn->close();
?>