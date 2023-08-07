const loginbutton = document.getElementById('loginbutton');
const loginerror = document.getElementById('invalidlogin');
const username = document.getElementById('Username');
const password = document.getElementById('password');
const itemid = document.getElementById('ProductID');
const itemname = document.getElementById('description');
const quantity = document.getElementById('squantity');
const category = document.getElementById('Kategori');
const pushbutton = document.getElementById('addButton');
var items = [];

class item {
    id;
    itemname;
    quantity;
    category;
}

pushbutton.addEventListener('click' , function() {
    var dynamicitem = new item();
    dynamicitem.id = itemid.value;
    dynamicitem.itemname = itemname.value;
    dynamicitem.quantity = quantity.value;
    dynamicitem.category = category.value;
    items.push(dynamicitem);
    localStorage.setItem('items' , JSON.stringify(items));
    console.log(items[0].itemname);
    itemid.textContent = '';
    itemname.textContent = '';
    quantity.textContent = '';
    category.textContent = '';

})