basket = JSON.parse(sessionStorage.basket);
shirtJSON = ""
let subtotal = 0;
function fillBasketItems(){
    let htmlString = "";
    for(let i = 0; i < basket.BasketItems.length; i++){
        getShirtSummary(basket.BasketItems[i].itemID);
        shirt = JSON.parse(shirtJSON);
        htmlString += '<p>'+ basket.BasketItems[i].quantity +' x '+ shirt.shirtName +', '+ shirt.colour +' | £'+ shirt.price +'</p> \n';
        subtotal += shirt.price * basket.BasketItems[i].quantity;
    }
    document.getElementById("items").innerHTML = htmlString;
    document.getElementById("subtotal").innerHTML = "Subtotal: £" + subtotal;

}


function getShirtSummary(id){
    //Create request object 
    let request = new XMLHttpRequest();

    //Create event handler that specifies what should happen when server responds
    request.onload = () => {
        //Check HTTP status code
        if(request.status === 200){
            //Get data from server
            let responseData = request.responseText;
            shirtJSON = responseData;
        }else
            alert("Error communicating with server: " + request.status);

    };

    //Set up request with HTTP method and URL 
    request.open("POST", "AJAX/singleProductSummary.php", false);
    request.setRequestHeader("Content-type", "application/x-www-form-urlencoded");

    //Send request
    request.send("id=" + id);
}

function checkout(){
    if (sessionStorage.basket === undefined || sessionStorage.basket === ""){
        document.getElementById("userInformer").innerHTML = "You can't buy <i>nothing</i>! Visit the 'All shirts' page to see what we have to offer."
    }else if(sessionStorage.loggedInUserId === undefined || sessionStorage.loggedInUserId === ""){
        document.getElementById("userInformer").innerHTML = "You <i>MUST</i> sign in to checkout."
    }else{
        let productString = "["

        for(let i = 0; i < basket.BasketItems.length; i++){
            productString += JSON.stringify(basket.BasketItems[i]) + ","
        }

        productString += "]"

        let now = new Date();
        let dateString = now.getDate() + "/" + (now.getMonth() + 1) + "/" + now.getFullYear();
        let timeString = now.getHours() + ":" + now.getMinutes();

        storeTransaction(sessionStorage.loggedInUserId, dateString, timeString, productString, subtotal, "Order Received", "UNAVAILABLE")
    }
}

function storeTransaction(customerId, date, time, itemString, basketTotal, status, trackingNumber){
    //Create request object 
    let request = new XMLHttpRequest();

    //Create event handler that specifies what should happen when server responds
    request.onload = () => {
        //Check HTTP status code
        if(request.status === 200){
            //Get data from server
            let responseData = request.responseText;
            console.log(responseData);
        }else
            alert("Error communicating with server: " + request.status);

    };

    //Set up request with HTTP method and URL 
    request.open("POST", "AJAX/storeTransaction.php");
    request.setRequestHeader("Content-type", "application/x-www-form-urlencoded");
    
    //Send request
    request.send("customerId=" + customerId + "&date=" + date + "&time=" + time + "&BasketItems=" + itemString + 
                    "&basketTotal=" + basketTotal + "&status=" +  status + "&trackingNumber=" + trackingNumber);
}

function emptyBasket(){
    sessionStorage.basket = "";
    location.href = "basket.php";
}

fillBasketItems();