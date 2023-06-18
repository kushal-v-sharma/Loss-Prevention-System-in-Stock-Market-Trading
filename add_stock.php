<?php
$hostname = '127.0.0.1';
$username = 'root';
$password = 'student';
$database = 'kushal';


$conn = mysqli_connect($hostname, $username, $password, $database);

if (!$conn) {
    die("Connection failed: " . mysqli_connect_error());
}

if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    
    $symbol = $_POST['symbol'];
    $quantity = $_POST['quantity'];
    $amount = $_POST['amount'];
    $dateOfIssue = $_POST['date_of_issue'];

   
    $sql = "INSERT INTO stocks (symbol, quantity, amount, date_of_issue) VALUES ('$symbol', $quantity, $amount, '$dateOfIssue')";

    
    if (mysqli_query($conn, $sql)) {
        echo "Stock added successfully!";
    } else {
        echo "Error: " . $sql . "<br>" . mysqli_error($conn);
    }

    
    mysqli_close($conn);
}
?>

<!DOCTYPE html>
<html>
<head>
<link rel="stylesheet" href="style15.css">
    <script src="script2.js"></script>
    <title>Add Stock</title>
</head>
<body background="bg7.jpg">
    <header>
    <h1>Add Stock</h1>
</header>
    <div>
        <button class="btn btn-primary"><a href="index.html">Home</a></button>
        <button class="btn btn-primary"><a href="main.html">Dashboard</a></button>
        <button class="btn btn-primary"><a href="managestock.php">Manage Stock</a></button>
        <button class="btn btn-primary"><a href="stockhistory.php">Stock History</a></button>
        <button class="btn btn-primary"><a href="viewlivestock.html">Live Stock</a></button>
        <button class="btn btn-primary"><a href="logoutadmin.html">Log Out</a></button>
      </div> 
      <br>
    <form method="POST" action="<?php echo $_SERVER['PHP_SELF']; ?>">
        <label for="symbol">Symbol:</label>
        <input type="text" name="symbol" required><br><br>

        <label for="quantity">Quantity:</label>
        <input type="number" name="quantity" required><br><br>

        <label for="amount">Amount:</label>
        <input type="number" name="amount" required><br><br>

        <label for="date_of_issue">Date of Issue:</label>
        <input type="date" name="date_of_issue" required><br><br>

        <input type="submit" value="Add Stock">
    </form>
    <h1 style="color:orchid"><marquee direction="left">Add Stocks from Live Stocks</marquee></h1>
    <iframe src="viewlivestock.html" height="500" width="1500" title="description"></iframe>
</body>
</html>

