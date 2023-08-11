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

addDelivery = () =>{
    let totaldelivery = JSON.parse(localStorage.getItem("totaldelivery"));
    if(totaldelivery == null){
        totaldelivery = []
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
        let newDelivery = {
            product : product,
            description : description,
            price : price,
            quantity : quantity,
            total : total
        }
        totaldelivery.push(newDelivery)
        localStorage.setItem("totaldelivery", JSON.stringify(totaldelivery))
        window.location.reload() 
    }
}

getGrandTotal = () =>{
    let grandTotal = 0;
    let totaldelivery = JSON.parse(localStorage.getItem("totaldelivery"));
    if (totaldelivery != null && totaldelivery.length > 0) {
        
        for (let index = 0; index < totaldelivery.length; index++) {

            grandTotal  += parseFloat(totaldelivery[index]["total"]);
            grandTotal = grandTotal;


            
        }
    }
    document.querySelector('#grandTotal').innerHTML = grandTotal;
    
}



showDel = () =>{
    getGrandTotal();
    let totaldelivery = JSON.parse(localStorage.getItem("totaldelivery"));
    if (totaldelivery != null && totaldelivery.length > 0) {
        let table = document.querySelector('#deliveryTable');
        for (let index = 0; index < totaldelivery.length; index++) {
            let row = table.insertRow(1);
            let deliveryProduct = row.insertCell(0);
            let deliveryDescription = row.insertCell(1);
            let deliveryPrice = row.insertCell(2);
            let deliveryQuantity = row.insertCell(3);
            let deliveryTotal = row.insertCell(4);
            let deliveryAction = row.insertCell(5);

            deliveryAction.className = "text-center";


            deliveryProduct.innerHTML = totaldelivery[index]["product"];
            deliveryDescription.innerHTML = totaldelivery[index]["description"];
            deliveryPrice.innerHTML = totaldelivery[index]["price"];
            deliveryQuantity.innerHTML = totaldelivery[index]["quantity"];
            deliveryTotal.innerHTML = totaldelivery[index]["total"];

            getGrandTotal();

            let btn = document.createElement('input');
            btn.type = "button";
            btn.className = "btn";
            btn.value = "delete";
            btn.onclick = (function(index) {
                return function() {

                    if (confirm("Do you want to delete your delivery receipt data ?")) {
                        localStorage.clear();
                        window.location.reload();

                        totaldelivery.splice(index, 1) 
                        alert("item deleted")
                        window.location.reload();
                        localStorage.setItem("totaldelivery", JSON.stringify(totaldelivery)); 
                        getGrandTotal();
                    }


                        
                    
                      
                }
            })(index);
            deliveryAction.appendChild(btn);
        }
    }
}






clearButton = () => {
    if (confirm("Do you want to clear all your delivery receipt data ? This action cannot be un done")) {
        localStorage.clear();
        window.location.reload();
    }
    
}

getDate = () => {
    let today = new Date();
    return today.getDate() + "/" + (today.getMonth() + 1) + "/" + today.getFullYear() + '  '  + today.getHours() + ":" + today.getMinutes() + "<br>" ;
}


printData = () => { 
    var divContents = document.getElementById("allDelivery").innerHTML; 
    var a = window.open('', '', 'height=11000, width=1000'); 
    a.document.write('<html>'); 
    a.document.write('<body > <h4> Delivery Receipt : ' + getDate() + '<br>'); 
    a.document.write(divContents); 
    a.document.write('</body></html>'); 
    a.document.close(); 
    a.print(); 
} 

showDel();