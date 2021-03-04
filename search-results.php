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
                        <div class = "sideBar" id = "sidebar">
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

                <script>
                let sidebar = document.getElementById("sidebar");

                if (\''.$jsonStr.'\' !== "]"){
                    let shirts = JSON.parse(\''.$jsonStr.'\');                                
                    
                    sidebar.innerHTML = "<h1>SORT_BY_</h1> \n" +
                                        "<button onclick = lowTOhighPrice()>Price (Lowest First)</button> \n" +
                                        "<button onclick = highTOlowPrice()>Price (Highest First)</button> \n" +
                                        "<button onclick = aTOzAlphabetical()>Name (A to Z)</button> \n" +
                                        "<button onclick = zTOaAlphabetical()>Name (Z to A)</button> \n";
                    
                    function aTOzAlphabetical(){
                        function comparison(a, b) {
                            if (a.shirtName +\' - \'+ a.colour < b.shirtName +\' - \'+ b.colour){
                            return -1;
                            
                            }else if (a.shirtName +\' - \'+ a.colour > b.shirtName +\' - \'+ b.colour){
                            return 1;
                            
                            }else {
                                return 0;
                            }
                        }
                        shirts.sort(comparison);
                        displayItems();
                    }
                    
                    function zTOaAlphabetical(){
                        function comparison(a, b) {
                            if (b.shirtName +\' - \'+ b.colour < a.shirtName +\' - \'+ a.colour){
                            return -1;
                            
                            }else if (b.shirtName +\' - \'+ b.colour > a.shirtName +\' - \'+ a.colour){
                            return 1;
                            
                            }else {
                                return 0;
                            }
                        }
                        shirts.sort(comparison);
                        displayItems();
                    }
                    
                    function highTOlowPrice(){
                        shirts.sort(function(a, b){return b.price - a.price});
                        displayItems();
                    }
                    
                    function lowTOhighPrice(products){
                        shirts.sort(function(a, b){return a.price - b.price});
                        displayItems();
                    }

                    function displayItems(){//Shows Sorted items on product grid
                        let grid = document.getElementById("productGrid");
                        grid.innerHTML = "";
                        let items = shirts.length;
                        let rows = 1;
                    
                        if (items > 4){//calculates the number of rows four need to be made
                            rows = Math.ceil(items/4);
                            let gridString = "";
                            for(let i = 0; i > rows; i++){
                                gridString += "auto ";
                            }
                            grid.style.gridTemplateRows = gridString;
                        }
                    
                        //Populate Grid with products
                        for(let i = 0; i < items || i < 4; i++){
                            grid.innerHTML += \'<div class = "productUnitGrid" id = "\'+ shirts[i]._id +\'">\' +
                                \'<img src = "\'+ shirts[i].img +\'">\' +
                                \'<h1>\'+ shirts[i].shirtName +\' - \'+ shirts[i].colour +\'</h1>\' +
                                \'<p>\'+ shirts[i].description +\'</p>\' +
                                \'<h2>£\'+ shirts[i].price +\'</h2>\' +
                                \'<button>Add to Basket</button>\' +
                            \'</div>\n\'; 
                        }
                    }

                }else{
                        sidebar.innerHTML = "<h1>SORT_BY_</h1> \n" +
                                            "<button disabled>Price (Lowest First)</button> \n" +
                                            "<button disabled>Price (Highest First)</button> \n" +
                                            "<button disabled>Name (A to Z)</button> \n" +
                                            "<button disabled>Name (Z to A)</button> \n";

                    }

                </script>
            </div>
        </div>';
    //Outputs the page footer
    pageFooter(); 
?>