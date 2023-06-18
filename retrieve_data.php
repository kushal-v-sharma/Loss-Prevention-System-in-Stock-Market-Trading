<?php
  
  $servername = "127.0.0.1";
  $username = "root";
  $password = "student";
  $database = "kushal";
  $conn = new mysqli($servername, $username, $password, $database);

  
  $symbol = $_GET['symbol'];

  
  $sql = "SELECT id, symbol, quantity, amount FROM buy_stock WHERE symbol = '$symbol';"
       . "SELECT id, symbol, quantity, amount, current_price, current_profit_loss, quantity_to_sell FROM sell_stock WHERE symbol = '$symbol';";
  $result = $conn->multi_query($sql);

  $data = array();

  if ($result) {
    do {
      if ($res = $conn->store_result()) {
        while ($row = $res->fetch_assoc()) {
          $data[] = $row;
        }
        $res->free();
      }
    } while ($conn->more_results() && $conn->next_result());
  }

  
  $conn->close();

  
  echo json_encode($data);
?>
