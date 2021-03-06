let basketJSON = "";
function addToBasket(shirtID){//Add a shirt to basket
    if (sessionStorage.loggedInUserId === ""){//check user is logged in
        alert("Please log in to add to the basket.");
        location.href = "accounts.php";
    
    }else{
        getBasket();
        basket = JSON.parse(basketJSON);
   
        let inBasket = false;
        
        for(let i = 0;i < basket.BasketItems.length; i++){
            if (basket.BasketItems[i].itemID === shirtID){
                basket.BasketItems[i].quantity += 1;
                inBasket = true;
            }else{
                inBasket = false;
            }
        } 

        if(!inBasket){
            shirtObj = {
                itemID: shirtID,
                quantity: 1,
            }
            basket.BasketItems.push(shirtObj)
        }

        updateBasket(basket, JSON.stringify(basket.BasketItems));
        alert("Item added to basket!");
    }
}


function updateBasket(basket, itemsSring){
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
    request.open("POST", "AJAX/pullUserBasket.php");
    request.setRequestHeader("Content-type", "application/x-www-form-urlencoded");
    
    //Send request
    request.send("id=" + basket._id + "&BasketItems=" + itemsSring);
}

function getBasket(){
    //Create request object 
    let request = new XMLHttpRequest();

    //Create event handler that specifies what should happen when server responds
    request.onload = () => {
        //Check HTTP status code
        if(request.status === 200){
            //Get data from server
            let responseData = request.responseText;
            basketJSON = responseData;
        }else
            alert("Error communicating with server: " + request.status);

    };

    //Set up request with HTTP method and URL 
    request.open("POST", "AJAX/pullUserBasket.php", false);
    request.setRequestHeader("Content-type", "application/x-www-form-urlencoded");
    
    //Send request
    request.send("id=" + sessionStorage.loggedInUserId);
}