let basketJSON = "";

function addToBasket(shirtID){//Add a shirt to basket
    if (sessionStorage.loggedInUserId === ""){//check user is logged in
        alert("Please log in to add to the basket.");
        location.href = "accounts.php";
    
    }else{
        if (sessionStorage.basket === undefined || sessionStorage.basket === ""){
            basket = {
                userID : sessionStorage.loggedInUserId,
                BasketItems : []
                    };

            sessionStorage.basket = JSON.stringify(basket);
        }

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
            };
            basket.BasketItems.push(shirtObj);
        }

        updateBasket(basket);
        document.getElementById("addButton").innerHTML = "Added to basket!"
    }
    
}

function updateBasket(basket){
    sessionStorage.basket = JSON.stringify(basket);
}

function getBasket(){
    basketJSON = sessionStorage.basket;
}




