<!DOCTYPE html>
<html>
<head>
    <title>Stock Details</title>
    <link rel="stylesheet" type="text/css" href="style4.css">
    <style>
        body {
            font-family: Arial, sans-serif;
            margin: 20px;
        }

        h2 {
            margin-bottom: 10px;
        }

        table {
            border-collapse: collapse;
        }

        table, th, td {
            border: 1px solid black;
            padding: 5px;
        }
    </style>
</head>
<body background="bg12.jpg">
<header>
        <h1>Stock Details</h1>
    </header>
    <div>
        <button class="btn btn-primary"><a href="index.html">Home</a></button>
        <button class="btn btn-primary"><a href="dashboard.html">Dashboard</a></button>
        <button class="btn btn-primary"><a href="buystock.php">Buy Stock</a></button>
        <button class="btn btn-primary"><a href="sell_stock.php">Sell Stock</a></button>
        <button class="btn btn-primary"><a href="live.html">Live Stock</a></button>
        <button class="btn btn-primary"><a href="changepass.php">Change Password</a></button>
        <button class="btn btn-primary"><a href="logoutuser.html">Log Out</a></button>
    </div>
    <br>
    <?php
    
    $host = "127.0.0.1";
    $username = "root";
    $password = "student";
    $database = "kushal";
    $conn = new mysqli($host, $username, $password, $database);
    if ($conn->connect_error) {
        die("Connection failed: " . $conn->connect_error);
    }

    
    $symbols_query = "SELECT DISTINCT symbol FROM buy_stock";
    $symbols_result = $conn->query($symbols_query);
    ?>

    <h2>Select a Symbol:</h2>
    <form id="symbolForm">
        <select name="symbol" onchange="getStockDetails(this.value)">
            <option value="">Select Symbol</option>
            <?php while ($row = $symbols_result->fetch_assoc()) { ?>
                <option value="<?php echo $row['symbol']; ?>"><?php echo $row['symbol']; ?></option>
            <?php } ?>
        </select>
    </form>
    <br>

    <div id="stockDetails"></div>

    <script>
        function getStockDetails(symbol) {
            if (symbol === "") {
                document.getElementById("stockDetails").innerHTML = "";
                return;
            }

            var xhr = new XMLHttpRequest();
            xhr.onreadystatechange = function() {
                if (xhr.readyState === XMLHttpRequest.DONE) {
                    if (xhr.status === 200) {
                        document.getElementById("stockDetails").innerHTML = xhr.responseText;
                    } else {
                        console.log("Error: " + xhr.status);
                    }
                }
            };
            xhr.open("GET", "get_stock_details.php?symbol=" + symbol, true);
            xhr.send();
        }
    </script>
</body>
</html>
