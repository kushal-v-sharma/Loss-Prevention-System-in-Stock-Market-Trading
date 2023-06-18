
var stocks = [
    { symbol: "AAPL", openPrice: 135.82, quantity: 100 },
    { symbol: "AMZN", openPrice: 3351.13, quantity: 50 },
    { symbol: "GOOG", openPrice: 2314.77, quantity: 75 }
  ];
  
  
  function displayStocks() {
    var stockList = document.getElementById("stock-list");
    stockList.innerHTML = "";
    
    for (var i = 0; i < stocks.length; i++) {
      var stock = stocks[i];
      
      var row = document.createElement("tr");
      var symbolCell = document.createElement("td");
      symbolCell.textContent = stock.symbol;
      row.appendChild(symbolCell);
      
      var openPriceCell = document.createElement("td");
      openPriceCell.textContent = stock.openPrice;
      row.appendChild(openPriceCell);
      
      var quantityCell = document.createElement("td");
      quantityCell.textContent = stock.quantity;
      row.appendChild(quantityCell);
      
      var actionCell = document.createElement("td");
      var deleteButton = document.createElement("button");
      deleteButton.textContent = "Delete";
      deleteButton.onclick = (function(stock) {
        return function() {
          deleteStock(stock);
        };
      })(stock);
      actionCell.appendChild(deleteButton);
     
    }
  }  
  