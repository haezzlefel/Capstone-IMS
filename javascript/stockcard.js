$(document).ready( function () {
    $('#table').DataTable({
      "responsive": true,
      "bPaginate": false,
      "bInfo" : false
    });
  } );

/// my new code this is for checking
function updateStockQuantity(productCode, quantity) {
  let table = document.getElementById("table");
  let rows = table.getElementsByTagName("tr");

  for (let i = 1; i < rows.length; i++) {
      let cells = rows[i].getElementsByTagName("td");
      let currentProductCode = cells[0].textContent;

      if (currentProductCode === productCode) {
          let stockOnHandCell = cells[5]; // Index of Stock On Hand column
          let stockOnHand = parseInt(stockOnHandCell.textContent);
          stockOnHand += quantity;

          stockOnHandCell.textContent = stockOnHand;
          break;
      }
  }
}
// Example usage to test the function
updateStockQuantity("101-0001", 5); // Increase stock of product 101-0001 by 5
