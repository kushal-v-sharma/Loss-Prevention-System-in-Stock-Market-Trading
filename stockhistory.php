<!DOCTYPE html>
<html>
<head>
    <title>Stock History</title>
    <link rel="stylesheet" type="text/css" href="style2.css">
    <script src="script2.js"></script>
    
</head>
<body background="bg8.jpg">
    <header>
        <h1>Stock History</h1>
        <div>
            <button class="btn btn-primary"><a href="index.html">Home</a></button>
            <button class="btn btn-primary"><a href="main.html">Dashboard</a></button>
            <button class="btn btn-primary"><a href="add_stock.php">Add Stock</a></button>
            <button class="btn btn-primary"><a href="managestock.php">Manage Stock</a></button>
            <button class="btn btn-primary"><a href="viewlivestock.html">Live Stock</a></button>
            <button class="btn btn-primary"><a href="logoutadmin.html">Log Out</a></button>
        </div>
    </header>
    <br>
    <form id="stock-history-form" method="post" action="<?php echo htmlspecialchars($_SERVER["PHP_SELF"]); ?>">
        <label for="start-date">Start Date:</label>
        <input type="date" id="start-date" name="startDate" required>

        <label for="end-date">End Date:</label>
        <input type="date" id="end-date" name="endDate" required>

        <input type="submit" value="Submit">
    </form>
<br>
    <div id="stock-history">
        <?php
        if ($_SERVER["REQUEST_METHOD"] == "POST") {
            
            $host = '127.0.0.1';
            $dbUsername = 'root';
            $dbPassword = 'student';
            $dbName = 'kushal';

            
            $mysqli = new mysqli($host, $dbUsername, $dbPassword, $dbName);

            
            if ($mysqli->connect_error) {
                die("Connection failed: " . $mysqli->connect_error);
            }

            
            function sanitize_input($value)
            {
                $value = trim($value);
                $value = stripslashes($value);
                $value = htmlspecialchars($value);
                return $value;
            }

            $startDate = sanitize_input($_POST['startDate']);
            $endDate = sanitize_input($_POST['endDate']);

            
            $insertQuery = "INSERT INTO stock_history (startDate, endDate) VALUES ('$startDate', '$endDate')";
            $insertResult = $mysqli->query($insertQuery);

            if ($insertResult) {
                
                $retrieveQuery = "SELECT symbol, amount, quantity, date_of_issue FROM stocks WHERE date_of_issue BETWEEN '$startDate' AND '$endDate'";
                $retrieveResult = $mysqli->query($retrieveQuery);

                if ($retrieveResult && $retrieveResult->num_rows > 0) {
                    
                    echo '<table>';
                    echo '<tr><th>Symbol</th><th>Amount</th><th>Quantity</th><th>Date of Issue</th></tr>';
                    while ($row = $retrieveResult->fetch_assoc()) {
                        echo '<tr>';
                        echo '<td>' . $row['symbol'] . '</td>';
                        echo '<td>' . $row['amount'] . '</td>';
                        echo '<td>' . $row['quantity'] . '</td>';
                        echo '<td>' . $row['date_of_issue'] . '</td>';
                        echo '</tr>';
                    }
                    echo '</table>';
                } else {
                    echo 'No stock history found for the given date range.';
                }
            } else {
                echo 'Error: Failed to add stock history to the database.';
            }

            
            $mysqli->close();
        }
        ?>
    </div>
</body>
</html>
