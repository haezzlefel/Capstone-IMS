getTotal = () => {
    let price = document.querySelector('#price').value;
    let quantity = document.querySelector('#quantity').value;
    if(isNaN(price) || isNaN(quantity)){
         alert("Quantity and Price Must be valid numbers")
    }else{
        let total = parseFloat( price * quantity);
        document.querySelector('#total').value = total.toFixed(2);
    }
}

addStock = () =>{
    let totalstock = JSON.parse(localStorage.getItem("totalstock"));
    if(totalstock == null){
        totalstock = []
    }
    
    let product = document.querySelector('#product').value;
    let description = document.querySelector('#description').value;
    let price = document.querySelector('#price').value;
    let quantity = document.querySelector('#quantity').value;

    if (product == "" || product == null) {
        alert("please enter a product")
    }else if (description == "" || description == null) {
        alert("please enter a description")
    }else if (price == "" || isNaN(price)) {
        alert("enter a valid number")
    }else if (quantity == "" || isNaN(quantity)) {
        alert("enter a valid quantity")
    }else{
        let total = parseFloat( price * quantity);
        total = total.toFixed(2);     
        let newStock = {
            product : product,
            description : description,
            price : price,
            quantity : quantity,
            total : total
        }
        totalstock.push(newStock)
        localStorage.setItem("totalstock", JSON.stringify(totalstock))
        window.location.reload() 
    }
}

getGrandTotal = () =>{
    let grandTotal = 0;
    let totalstock = JSON.parse(localStorage.getItem("totalstock"));
    if (totalstock != null && totalstock.length > 0) {
        
        for (let index = 0; index < totalstock.length; index++) {

            grandTotal  += parseFloat(totalstock[index]["total"]);
            grandTotal = grandTotal;


            
        }
    }
    document.querySelector('#grandTotal').innerHTML = grandTotal;
    
}



showSto = () =>{
    getGrandTotal();
    let totalstock = JSON.parse(localStorage.getItem("totalstock"));
    if (totalstock != null && totalstock.length > 0) {
        let table = document.querySelector('#stockTable');
        for (let index = 0; index < totalstock.length; index++) {
            let row = table.insertRow(1);
            let stockProduct = row.insertCell(0);
            let stockDescription = row.insertCell(1);
            let stockPrice = row.insertCell(2);
            let stockQuantity = row.insertCell(3);
            let stockTotal = row.insertCell(4);
            let stockAction = row.insertCell(5);

            stockAction.className = "text-center";


            stockProduct.innerHTML = totalstock[index]["product"];
            stockDescription.innerHTML = totalstock[index]["description"];
            stockPrice.innerHTML = totalstock[index]["price"];
            stockQuantity.innerHTML = totalstock[index]["quantity"];
            stockTotal.innerHTML = totalstock[index]["total"];

            getGrandTotal();

            let btn = document.createElement('input');
            btn.type = "button";
            btn.className = "btn";
            btn.value = "delete";
            btn.onclick = (function(index) {
                return function() {

                    if (confirm("Do you want to delete your stock receipt data ?")) {
                        localStorage.clear();
                        window.location.reload();

                        totalstock.splice(index, 1) 
                        alert("item deleted")
                        window.location.reload();
                        localStorage.setItem("totalstock", JSON.stringify(totalstock)); 
                        getGrandTotal();
                    }


                        
                    
                      
                }
            })(index);
            stockAction.appendChild(btn);
        }
    }
}






clearButton = () => {
    if (confirm("Do you want to clear all your stock receipt data ? This action cannot be un done")) {
        localStorage.clear();
        window.location.reload();
    }
    
}

getDate = () => {
    let today = new Date();
    return today.getDate() + "/" + (today.getMonth() + 1) + "/" + today.getFullYear() + '  '  + today.getHours() + ":" + today.getMinutes() + "<br>" ;
}


printData = () => { 
    var divContents = document.getElementById("allStock").innerHTML; 
    var a = window.open('', '', 'height=11000, width=1000'); 
    a.document.write('<html>'); 
    a.document.write('<body > <h4> Stock Receipt : ' + getDate() + '<br>'); 
    a.document.write(divContents); 
    a.document.write('</body></html>'); 
    a.document.close(); 
    a.print(); 
} 

showSto();

/// my new code this is for checking
function updateStockCard(productCode, quantity) {
    let table = document.getElementById("table");
    let rows = table.getElementsByTagName("tr");

    for (let i = 1; i < rows.length; i++) { 
        let cells = rows[i].getElementsByTagName("td");
        let currentProductCode = cells[0].textContent;

        if (currentProductCode === productCode) {
            let stockOnHandCell = cells[5]; 
            let stockOnHand = parseInt(stockOnHandCell.textContent);
            stockOnHand += quantity;

            stockOnHandCell.textContent = stockOnHand;
            
            break; 
        }
    }
}

function addStock() {
  updateStockCard(productCode, quantity);
}
