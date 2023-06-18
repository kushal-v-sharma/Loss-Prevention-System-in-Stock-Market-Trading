<!DOCTYPE html>
<html>
<head>
    <title>Sell Stock Page</title>
    <link rel="stylesheet" type="text/css" href="style2.css">
    <style>
        table {
            border-collapse: collapse;
        }

        table, th, td {
            border: 1px solid black;
            padding: 5px;
        }
    </style>
    <script src="https://code.jquery.com/jquery-3.6.0.min.js"></script>
    <script>
        $(document).ready(function() {
            updateCurrentPrices(); 

            function updateCurrentPrices() {
                $('.current-price').each(function() {
                    var symbol = $(this).data('symbol');
                    var priceCell = $(this);

                    $.ajax({
                        url: 'get_live_price.php',
                        type: 'POST',
                        data: { symbol: symbol },
                        success: function(response) {
                            priceCell.text(response);
                            calculateProfitLoss();
                        },
                        error: function() {
                            priceCell.text('N/A');
                        }
                    });
                });

                setTimeout(updateCurrentPrices, 5000); 
            }

            function calculateProfitLoss() {
                $('tr.stock-row').each(function() {
                    var row = $(this);
                    var quantity = parseInt(row.find('.quantity').text());
                    var amount = parseFloat(row.find('.amount').text());
                    var currentPrice = parseFloat(row.find('.current-price').text());
                    var profitLoss = (currentPrice - amount) * quantity;

                    row.find('.profit-loss').text(profitLoss.toFixed(2));
                });
            }

            $('.sell-button').on('click', function() {
                var row = $(this).closest('tr');
                var sellForm = row.find('.sell-form');
                var quantityToSell = parseInt(sellForm.val());
                var quantity = parseInt(row.find('.quantity').text());
                var symbol = row.find('.symbol').text();
                var amount = parseFloat(row.find('.amount').text());
                var currentPrice = parseFloat(row.find('.current-price').text());
                var profitLoss = parseFloat(row.find('.profit-loss').text());

                if (quantityToSell > 0 && quantityToSell <= quantity) {
                    quantity -= quantityToSell;
                    row.find('.quantity').text(quantity);
                    sellForm.val('');
                    calculateProfitLoss();

                    $.ajax({
                        url: 'store_sell_data.php',
                        type: 'POST',
                        data: {
                            symbol: symbol,
                            quantity: quantityToSell,
                            amount: amount,
                            currentPrice: currentPrice,
                            profitLoss: profitLoss
                        },
                        success: function(response) {
                            alert('Stock sold successfully.');
                            updateBuyStockTable(symbol, quantityToSell);
                        },
                        error: function() {
                            alert('Error occurred while selling stock.');
                        }
                    });
                } else {
                    alert('Invalid quantity to sell.');
                }
            });

            function updateBuyStockTable(symbol, quantityToSell) {
                $.ajax({
                    url: 'update_buy_stock.php',
                    type: 'POST',
                    data: {
                        symbol: symbol,
                        quantityToSell: quantityToSell
                    },
                    success: function(response) {
                        alert('Buy stock table updated.');
                    },
                    error: function() {
                        alert('Error occurred while updating buy stock table.');
                    }
                });
            }
        });
    </script>
</head>
<body background="bg11.jpg">
<header>
        <h1>Sell Stock Page</h1>
        </header>
        <div>
            <button class="btn btn-primary"><a href="index.html">Home</a></button>
            <button class="btn btn-primary"><a href="dashboard.html">Dashboard</a></button>
            <button class="btn btn-primary"><a href="buystock.php">Buy Stock</a></button>
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

    
    $sql = "SELECT id, symbol, quantity, amount FROM buy_stock";
    $result = $conn->query($sql);

    if ($result->num_rows > 0) {
       
        echo "<table>";
        echo "<tr><th>ID</th><th>Symbol</th><th>Quantity</th><th>Amount</th><th>Current Price</th><th>Profit/Loss</th><th>Action</th></tr>";

        while ($row = $result->fetch_assoc()) {
            
            $symbol = $row["symbol"];
            $currentPrice = getLivePrice($symbol);
            $profitLoss = ($currentPrice - $row["amount"]) * $row["quantity"];

           
            echo "<tr class='stock-row'>";
            echo "<td>".$row["id"]."</td>";
            echo "<td class='symbol'>".$row["symbol"]."</td>";
            echo "<td class='quantity'>".$row["quantity"]."</td>";
            echo "<td class='amount'>".$row["amount"]."</td>";
            echo "<td><span class='current-price' data-symbol='".$symbol."'>Loading...</span></td>";
            echo "<td class='profit-loss'>".$profitLoss."</td>";
            echo "<td>";
            echo "<input type='number' class='sell-form' placeholder='Quantity to Sell'>";
            echo "<button class='sell-button'>Sell</button>";
            echo "</td>";
            echo "</tr>";
        }

        echo "</table>";
    } else {
        echo "No data available";
    }

    
    $conn->close();

    
    function getLivePrice($symbol) {
        
        return rand(10, 100);
    }
    ?>
</body>
</html>
