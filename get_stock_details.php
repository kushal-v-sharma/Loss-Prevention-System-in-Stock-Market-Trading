<?php

$host = "127.0.0.1";
$username = "root";
$password = "student";
$database = "kushal";
$conn = new mysqli($host, $username, $password, $database);
if ($conn->connect_error) {
    die("Connection failed: " . $conn->connect_error);
}


$symbol = $_GET['symbol'];


$buy_query = "SELECT id, symbol, quantity, amount, time FROM buy_stock WHERE symbol = '$symbol'";
$buy_result = $conn->query($buy_query);


$sell_query = "SELECT id, symbol, quantity, amount, current_price, current_profit_loss, quantity_to_sell, time FROM sell_stock WHERE symbol = '$symbol'";
$sell_result = $conn->query($sell_query);
?>

<h2>Buy Details:</h2>
<table>
    <tr>
        <th>ID</th>
        <th>Symbol</th>
        <th>Quantity</th>
        <th>Amount</th>
        <th>Time</th>
    </tr>
    <?php while ($row = $buy_result->fetch_assoc()) { ?>
        <tr>
            <td><?php echo $row['id']; ?></td>
            <td><?php echo $row['symbol']; ?></td>
            <td><?php echo $row['quantity']; ?></td>
            <td><?php echo $row['amount']; ?></td>
            <td><?php echo $row['time']; ?></td>
        </tr>
    <?php } ?>
</table>

<h2>Sell Details:</h2>
<table>
    <tr>
        <th>ID</th>
        <th>Symbol</th>
        <th>Quantity</th>
        <th>Amount</th>
        <th>Current Price</th>
        <th>Current Profit/Loss</th>
        <th>Quantity to Sell</th>
        <th>Time</th>
    </tr>
    <?php while ($row = $sell_result->fetch_assoc()) { ?>
        <tr>
            <td><?php echo $row['id']; ?></td>
            <td><?php echo $row['symbol']; ?></td>
            <td><?php echo $row['quantity']; ?></td>
            <td><?php echo $row['amount']; ?></td>
            <td><?php echo $row['current_price']; ?></td>
            <td><?php echo $row['current_profit_loss']; ?></td>
            <td><?php echo $row['quantity_to_sell']; ?></td>
            <td><?php echo $row['time']; ?></td>
        </tr>
    <?php } ?>
</table>
