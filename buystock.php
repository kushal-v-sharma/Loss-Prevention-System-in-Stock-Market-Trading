<!DOCTYPE html>
<html>
<head>
<link rel="stylesheet" type="text/css" href="style2.css">
    <script src="script2.js"></script>
    <title>Buy Stocks</title>
    
    <style>
        table {
            border-collapse: collapse;
        }
        table, th, td {
            border: 1px solid black;
            padding: 5px;
        }
    </style>
</head>
<body background="bg10.jpg" >
<header>
        <h1>Buy Stock</h1>
    </header>
    <div>
        <button class="btn btn-primary"><a href="index.html">Home</a></button>
        <button class="btn btn-primary"><a href="dashboard.html">Dashboard</a></button>
        <button class="btn btn-primary"><a href="sell_stock.php">Sell Stock</a></button>
        <button class="btn btn-primary"><a href="live.html">Live Stock</a></button>
        <button class="btn btn-primary"><a href="stockdetail.php">Stock Detail</a></button>
        <button class="btn btn-primary"><a href="changepass.php">Change Password</a></button>
        <button class="btn btn-primary"><a href="logoutuser.html">Log Out</a></button>
    </div>
    <br>

    <?php
       
        $servername = "127.0.0.1";
        $username = "root";
        $password = "student";
        $dbname = "kushal";

        $conn = new mysqli($servername, $username, $password, $dbname);
        if ($conn->connect_error) {
            die("Connection failed: " . $conn->connect_error);
        }

        
        $sql = "SELECT * FROM stocks";
        $result = $conn->query($sql);
        if ($result->num_rows > 0) {
            echo "<table>";
            echo "<tr><th>ID</th><th>Symbol</th><th>Amount</th><th>Quantity</th><th>Date of Issue</th><th>Action</th></tr>";
            while($row = $result->fetch_assoc()) {
                echo "<tr>";
                echo "<td>".$row["id"]."</td>";
                echo "<td>".$row["symbol"]."</td>";
                echo "<td>".$row["amount"]."</td>";
                echo "<td>".$row["quantity"]."</td>";
                echo "<td>".$row["date_of_issue"]."</td>";
                echo "<td><button onclick='showPaymentOptions(".$row["id"].")'>Buy</button></td>";
                echo "</tr>";
            }
            echo "</table>";
        } else {
            echo "No stocks available.";
        }

        $conn->close();
    ?>

    <div id="paymentOptionsContainer" style="display: none;">
        <h2>Select Payment Method</h2>
        <button onclick="showCardDetailsForm('credit')">Credit Card</button>
        <button onclick="showCardDetailsForm('debit')">Debit Card</button>
    </div>

    <div id="cardDetailsFormContainer" style="display: none;">
        <h3>Card Details</h3>
        <form id="cardDetailsForm" onsubmit="makePayment(event)">
            <label for="cardNumber">Card Number:</label>
            <input type="text" id="cardNumber" required><br>

            <label for="expiryDate">Expiry Date:</label>
            <input type="text" id="expiryDate" required><br>

            <label for="cvv">CVV:</label>
            <input type="text" id="cvv" required><br>

            <input type="submit" value="Make Payment">
        </form>
    </div>

    <script>
        var selectedStockId;

        function showPaymentOptions(id) {
            selectedStockId = id;
            var paymentOptionsContainer = document.getElementById("paymentOptionsContainer");
            paymentOptionsContainer.style.display = "block";
        }

        function showCardDetailsForm(paymentMethod) {
            var cardDetailsFormContainer = document.getElementById("cardDetailsFormContainer");
            cardDetailsFormContainer.style.display = "block";
            document.getElementById("cardDetailsForm").reset();
            document.getElementById("cardNumber").focus();
            
        }

        function makePayment(event) {
            event.preventDefault();

            var cardNumber = document.getElementById("cardNumber").value;
            var expiryDate = document.getElementById("expiryDate").value;
            var cvv = document.getElementById("cvv").value;

            
            var xmlhttp = new XMLHttpRequest();
            xmlhttp.open("POST", "store_stock_details.php", true);
            xmlhttp.setRequestHeader("Content-type", "application/x-www-form-urlencoded");
            xmlhttp.onreadystatechange = function() {
                if (this.readyState === 4 && this.status === 200) {
                    
                }
            };
            xmlhttp.send("stockId=" + selectedStockId);

            
            var xmlhttp2 = new XMLHttpRequest();
            xmlhttp2.open("POST", "store_card_details.php", true);
            xmlhttp2.setRequestHeader("Content-type", "application/x-www-form-urlencoded");
            xmlhttp2.onreadystatechange = function() {
                if (this.readyState === 4 && this.status === 200) {
                    
                    alert("Payment successful!");
                    resetForms();
                }
            };
            xmlhttp2.send("cardNumber=" + cardNumber + "&expiryDate=" + expiryDate + "&cvv=" + cvv + "&amount=" + calculateStockAmount(selectedStockId));

            
            resetForms();
        }

        function resetForms() {
            var paymentOptionsContainer = document.getElementById("paymentOptionsContainer");
            var cardDetailsFormContainer = document.getElementById("cardDetailsFormContainer");
            var cardDetailsForm = document.getElementById("cardDetailsForm");

            paymentOptionsContainer.style.display = "none";
            cardDetailsFormContainer.style.display = "none";
            cardDetailsForm.reset();
        }

        function calculateStockAmount(stockId) {
            
            return 100;
        }
    </script>
</body>
</html>
