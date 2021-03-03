window.onload = implementSearch();

//Downloads JSON description of products from server
function implementSearch(){
    //Create request object 
    let request = new XMLHttpRequest();

    //Create event handler that specifies what should happen when server responds
    request.onload = () => {
        //Check HTTP status code
        if(request.status === 200){
            //Add data from server to page            
            displayProducts(request.responseText);
        }
        else
            alert("Error communicating with server: " + request.status);
    };

    //Set up request and send it
    request.open("GET", "AJAX/productIndexedSearch.php?tags=Red");
    request.send();
}

//Loads products into page
function displayProducts(productJSONs){
    //Convert JSON to array of product objects
    let products = JSON.parse(productJSONs);    
    let grid = document.getElementById("productGrid");
    let items = products.length;
    let rows = 1;

    //Create HTML table containing product data
    if (1 > items){
        grid.innerHTML = "<p>No results, unfortunately...</p>";
    } else {

        if (items > 4){
            rows = Math.ceil(items/4);
            let gridString = "";
            for(let i = 0; i > rows; i++){
                gridString += "auto ";
            }
            grid.style.gridTemplateRows = gridString;
        }

        for(let i = 0; i < items || i < 4; i++){
            grid.innerHTML += '<div class = "productUnitGrid" id = "'+ products[i]._id +'">' +
                '<img src = "'+ products[i].img +'">' +
                '<h1>'+ products[i].shirtName +' - '+ products[i].colour +'</h1>' +
                '<p>'+ products[i].description +'</p>' +
                '<h2>£'+ products[i].price +'</h2>' +
                '<button>Add to Basket</button>' +
            '</div>\n'; 
        }

    }
    
}