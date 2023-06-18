<?php
$stockPrices = array(
    "AAPL" => 150.25,
    "GOOGL" => 2500.50,
    "AMZN" => 3500.75,
    "MSFT" => 300.60,
    
);


foreach ($stockPrices as $symbol => $price) {
    $randomChange = rand(-100, 100) / 100; 
    $livePrice = $price + ($price * $randomChange);
    $stockPrices[$symbol] = round($livePrice, 2);
}


header('Content-Type: application/json');
echo json_encode($stockPrices);
?>
