var menuItems = document.querySelectorAll(".addMenuItem");

for(var index = 0; index < menuItems.length; index++){
    menuItems[index].addEventListener("click", function(event){
        document.querySelector(".itemSelectedTable .menuItem_" + event.target.value + " input").value = 1;
        document.querySelector(".itemSelectedTable .menuItem_" + event.target.value).classList.remove("hidden");
        document.querySelector(".itemSelectedTable .menuItem_" + event.target.value).classList.add("selected");
        document.querySelector(".menuItem_" + event.target.value + " .subAmount").innerHTML =
        parseFloat(document.querySelector(".menuItem_" + event.target.value).dataset["price"]).toFixed(2).replace(",", "").replace(".", ",");

        // Update total price
        document.querySelector(".totalAmount").innerHTML = 
            (parseFloat(document.querySelector(".totalAmount").innerHTML) +
            parseFloat(document.querySelector(".menuItem_" + event.target.value).dataset["price"])).toFixed(2);
    });
}

var selectedMenuItemsInput = document.querySelectorAll(".itemSelectedTable input");

for(var index = 0; index < selectedMenuItemsInput.length; index++){
    selectedMenuItemsInput[index].addEventListener("change", function(event){
        if(event.target.value == 0){
            document.querySelector(".itemSelectedTable .menuItem_" + event.target.name).classList.add("hidden");
            document.querySelector(".itemSelectedTable .menuItem_" + event.target.name).classList.remove("selected");
            document.querySelector(".menuItem_" + event.target.name + " .subAmount").innerHTML =
                parseFloat(document.querySelector(".menuItem_" + event.target.name).dataset["price"]).toFixed(2).replace(",", "").replace(".", ",");
        } else {
            document.querySelector(".menuItem_" + event.target.name + " .subAmount").innerHTML =
                (parseFloat(document.querySelector(".menuItem_" + event.target.name).dataset["price"]) * event.target.value).toFixed(2).replace(",", "").replace(".", ",");
        }

        // update total price
        var selectedItems = document.querySelectorAll(".itemSelectedTable .selected .subAmount");
        var total = 0;

        for(var selectedIndex = 0; selectedIndex < selectedItems.length; selectedIndex++){
            var currentSelectedItem = selectedItems[selectedIndex];
            total = total + parseFloat(currentSelectedItem.innerHTML.replace(",", "."));
        }

        document.querySelector(".totalAmount").innerHTML = total.toFixed(2).replace(",", "").replace(".", ",");
    }); 
}

var clearButton = document.querySelector("#clearOrder");

if(clearButton != null){
    clearButton.addEventListener("click", function(event){
        var selectedItems = document.querySelectorAll(".itemSelectedTable .selected");
        
        for(var index = 0; index < selectedItems.length; index++){
            var selectedItem = selectedItems[index];

            selectedItem.classList.remove("selected");
            selectedItem.classList.add("hidden");
            selectedItem.querySelector("input").value = 0;
        }

        document.querySelector(".totalAmount").innerHTML = "0,00";
    });
} else {
    console.error("ERROR: No clear button found!")
}

var payOrderButton = document.querySelector("#payOrder");

if(payOrderButton != null){
    payOrderButton.addEventListener("click", function(event){
        // create order data string
        var orderData = new Array();    
        var selectedItemInputs = document.querySelectorAll(".itemSelectedTable .selected input");
        var modal = document.querySelector("#myModal");

        if(selectedItemInputs.length > 0){
            for(var index = 0; index < selectedItemInputs.length; index++){
                var selectedItemInput = selectedItemInputs[index];
                
                orderData.push({"id": selectedItemInput.name, "amount": selectedItemInput.value});
            }

            // stringify the orderData
            orderData = JSON.stringify(orderData);

            var http = new XMLHttpRequest();
            var token = document.querySelector('meta[name="csrf-token"]').getAttribute('content');
            var url = '/kassa/pay';
            http.open('POST', url,true);
            http.setRequestHeader('Content-Type', 'application/x-www-form-urlencoded');
            http.setRequestHeader('X-CSRF-TOKEN', token);
            http.send(orderData);

            var selectedItems = document.querySelectorAll(".itemSelectedTable .selected");
            
            for(var index = 0; index < selectedItems.length; index++){
                var selectedItem = selectedItems[index];

                selectedItem.classList.remove("selected");
                selectedItem.classList.add("hidden");
                selectedItem.querySelector("input").value = 0;
            }

            document.querySelector(".totalAmount").innerHTML = "0,00";
        } else {
            
        }
    });
} else {
    console.error("ERROR: No payOrder button found!")
}

document.getElementsByClassName("close")[0].addEventListener("click", function(event){
    document.querySelector("#myModal").style.display = "none";
});

window.onclick = function(event){
    var modal = document.querySelector("#myModal");
    if(event.target == modal){
        modal.style.display = "none";
    }
}
window.addMenuItem = function (id) {
        var row = document.querySelector(".itemSelectedTable .menuItem_" + id);
        if (row) {
            row.classList.remove("hidden");
            row.classList.add("selected");
            var input = row.querySelector("input");
            var currentValue = parseInt(input.value) || 0;
            input.value = currentValue + 1; // verhoog met 1
            row.querySelector(".subAmount").innerHTML = (parseFloat(row.dataset["price"]) * input.value).toFixed(2).replace(".", ",");
            window.updateTotal();
        }
}
window.updateTotal = function () {
    var selectedItems = document.querySelectorAll(".itemSelectedTable .selected .subAmount");
    var total = 0;
    for (var selectedIndex = 0; selectedIndex < selectedItems.length; selectedIndex++) {
        total += parseFloat(selectedItems[selectedIndex].innerHTML.replace(",", "."));
    }
    document.querySelector(".totalAmount").innerHTML = total.toFixed(2).replace(".", ",");
}
document.querySelector('form').addEventListener('reset', function () {
    // Alle menuItem-rijen verbergen en deselecteren
    document.querySelectorAll('.itemSelectedTable tr[class^="menuItem_"]').forEach(function (row) {
        row.classList.add('hidden');
        row.classList.remove('selected');
        row.querySelector("input").value = 0;
        if (row.querySelector(".subAmount")) {
            row.querySelector(".subAmount").innerHTML = parseFloat(row.dataset["price"]).toFixed(2).replace(".", ",");
        }
    });
     // Totaalbedrag resetten
    document.querySelector(".totalAmount").innerHTML = "0,00";
});