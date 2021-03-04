<?php
    //Include the PHP functions to be used on the page 
    include('common.php'); 
    include('AJAX\productIndexedSearch.php');

    //Output header and navigation 
    outputHTMLHeader("QWERTY | SEARCH_");
    pageHeader("SEARCH_", "guest");
?>
            <div class = "mainBodyGrid">
                <div class = "productPageGrid">
                    <div id = "sideBar">
                        <div class = "sideBar">
                            <h1>SORT_BY_</h1>
                            <button>Price (Lowest First)</button>
                            <button>Price (Highest First)</button>
                            <button>Name (A to Z)</button>
                            <button>Name (Z to A)</button>
                        </div>
                    </div>

                    <div id = "content">
                        <h1 class = "inPageHeader" style = "text-align: left;">SEARCH_</h1>
                        <div class = "productGrid" id = "productGrid">
                            
                        </div>
                    </div>
                    
<?php

    echo'           
                <script>
                    let productJSONs = \''.$jsonStr.'\';
                    let grid = document.getElementById("productGrid");

                    if (productJSONs === "]"){
                        grid.innerHTML = "<p class = \'pageNotice\' style = \'padding-left: 15px;\'>No results, unfortunately...</p>";
                    } else {
                    //Convert JSON to array of product objects
                    let products = JSON.parse(productJSONs);    
                    
                    let items = products.length;
                    let rows = 1;
                
                    //Create HTML table containing product data

                
                        if (items > 4){
                            rows = Math.ceil(items/4);
                            let gridString = "";
                            for(let i = 0; i > rows; i++){
                                gridString += "auto ";
                            }
                            grid.style.gridTemplateRows = gridString;
                        }
                
                        for(let i = 0; i < items || i < 4; i++){
                            grid.innerHTML += \'<div class = "productUnitGrid" id = "\'+ products[i]._id +\'">\' +
                                \'<img src = "\'+ products[i].img +\'">\' +
                                \'<h1>\'+ products[i].shirtName +\' - \'+ products[i].colour +\'</h1>\' +
                                \'<p>\'+ products[i].description +\'</p>\' +
                                \'<h2>£\'+ products[i].price +\'</h2>\' +
                                \'<button>Add to Basket</button>\' +
                            \'</div>\n\'; 
                        }
                    }
                </script>
            </div>
        </div>';
    //Outputs the page footer
    pageFooter(); 
?>