$(document).ready( function () {
    $('#table').DataTable({
      "responsive": true,
      "bPaginate": false,
    });
  } );

    "bInfo" : false
/// my new code this is for checking
// stockcard.js

showSto = (totalstock) => {
  let grandTotal = getGrandTotal(totalstock);

  if (totalstock != null && totalstock.length > 0) {
      let table = document.querySelector('#table tbody');
      table.innerHTML = ''; // Clear the existing table rows

      for (let index = 0; index < totalstock.length; index++) {
          // Create table row and cells
          let row = table.insertRow();
          let cells = [];
          for (let i = 0; i < 10; i++) {
              cells.push(row.insertCell(i));
          }

          // Populate cells with data
          cells[0].textContent = totalstock[index]["product"];
          cells[1].textContent = totalstock[index]["description"];
          cells[2].textContent = totalstock[index]["price"];
          cells[3].textContent = totalstock[index]["total"];
          cells[4].textContent = totalstock[index]["quantity"];
          cells[5].textContent = totalstock[index]["quantity"]; // Stock On Hand
          cells[6].textContent = totalstock[index]["quantity"]; // Ending Balance
          cells[7].textContent = totalstock[index]["quantity"]; // Stock Receipt
          cells[8].textContent = "0"; // Delivery Receipt
          cells[9].textContent = "0"; // Variance
      }

      document.querySelector('#grandTotal').textContent = grandTotal;

      // Initialize DataTable
      $(document).ready(function () {
          $('#table').DataTable({
              "responsive": true,
              "bPaginate": false,
              "bInfo": false
          });
      });
  }
};
