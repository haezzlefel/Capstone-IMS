$(document).ready( function () {
    $('#table').DataTable({
      "responsive": true,
      "bPaginate": false,
      "bInfo" : false
    });
  } );

/// my new code this is for checking
  function updateStockCard(productCode, quantity) {
    // Find the row with the matching product code in the Stock Card table
    let table = document.getElementById("table");
    let rows = table.getElementsByTagName("tr");

    for (let i = 1; i < rows.length; i++) { // Start from 1 to skip the header row
        let cells = rows[i].getElementsByTagName("td");
        let currentProductCode = cells[0].textContent;

        if (currentProductCode === productCode) {
            let stockOnHandCell = cells[5]; // Index of Stock On Hand column
            let stockOnHand = parseInt(stockOnHandCell.textContent);
            stockOnHand += quantity;

            stockOnHandCell.textContent = stockOnHand;
            // Update other columns if needed
            // ...
            break; // Exit the loop after updating the row
        }
    }
}

function addStock() {
  updateStockCard(productCode, quantity);
}
