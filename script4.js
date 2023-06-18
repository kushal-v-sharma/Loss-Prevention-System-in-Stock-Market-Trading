
const stocks = [
  { name: "AAPL", price: 300.50, change: -5.25, percentChange: -1.72 },
  { name: "GOOGL", price: 1500.00, change: 10.75, percentChange: 0.72 },
  { name: "AMZN", price: 2500.25, change: -3.50, percentChange: -0.14 },
  { name: "NTPC", price: 173.30, change: -1.80, percentage: -1.03},
  { name: "BABA", price: 83.98, change: -1.79, percentage: -2.09},
  { name: "TWTR", price: 53.70, change: 0, percentage: 0},
  { name: "SBI", price: 575.15, change: +0.95, percentage: 0.17},
  { name: "HITECHGEAR", price: 385.50, change: +64.25, percentage:	20.00},
  { name: "Nifty 50", price: 18593.85, change:	+59.75, percentage:	+0.32},
  { name: "BSE Sensex", price:	62787.47, change:	+240.36, percentage:	+0.38},
  { name: "Nifty Bank", price:	44101.65, change:	+163.80, percentage:	+0.37},
  { name: "Nasdaq 100", price:	14546.64, change:	+105.13, percentage:	+0.73},
  { name: "S&P 500", price:	4282.37, change:	+61.35, percentage:	+1.45},
  { name: "Yes Bank", price:	16.15, change:	-0.25, percentage:	-1.52},
  { name: "Tata Motors", price:	546.25, change:	+10.35, percentage:	+1.93},
  { name: "ICICI Bank", price:	947.00, change:	+8.85, percentage:	+0.94},
  { name: "Zee Entertainment", price:	200.35, change:	+6.85, percentage:	+3.54},
  { name: "Goldman Sachs CPSE", price:	42.00, change:	+0.21, percentage:	+0.50},
  { name: "Axis Gold", price:	50.99, change:	-0.58, percentage:	-1.12},
  { name: "Axis Nifty", price:	198.99, change:	+1.24, percentage:	+0.63},
  { name: "BHARAT 22", price:	64.08, change:	+0.54, percentage:	+0.85}
];


function updateStockTable() {
  const table = document.getElementById("stockTable");

  
  while (table.rows.length > 1) {
    table.deleteRow(1);
  }

  
  stocks.forEach(stock => {
    const row = table.insertRow();
    row.insertCell().innerText = stock.name;
    row.insertCell().innerText = stock.price.toFixed(2);
    row.insertCell().innerText = stock.change.toFixed(2);
    row.insertCell().innerText = stock.percentChange.toFixed(2) + "%";
  });
}


setInterval(() => {
 
  stocks.forEach(stock => {
    stock.price += Math.random() * 10 - 5;
    stock.change += Math.random() * 2 - 1;
    stock.percentChange = (stock.change / stock.price) * 100;
  });

  
  updateStockTable();
}, 5000);


updateStockTable();
