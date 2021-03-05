<?php
    //Include the PHP functions to be used on the page 
    include('common.php'); 
    include('AJAX\singleProductRetieval.php');

    //Output header and navigation 
    outputHTMLHeader("QWERTY | Shirt");
    pageHeader("", "guest");

    echo '
    <script type = \'module\'>

        //Import recommender class
        import {Recommender} from \'./JavaScript/recommender.js\';

        //Create recommender object - it loads its state from local storage
        let recommender = new Recommender();

        //Add the search Viewing to the recommender
        recommender.addViewing("'.$search_string.'");
    </script>';

?>

            <div class = "singleItemGrid" id = "singleItem">

            </div>

<?php
    //Script for loading products
    echo'       <script>
                    let JSONs = \''.$jsonStr.'\';                    
                    let grid = document.getElementById("singleItem");
                    if (JSONs === ""){
                        grid.innerHTML = "<p class = \'pageNotice\' style = \'padding-left: 15px; color: #FFFFFF;\'>Product Not found!</p>";
                    
                    } else {
                        let product = JSON.parse(JSONs);
                        //Convert JSON to array of product objects
                            
                    
                        //Create HTML table containing product data
                        grid.innerHTML = \'<div style = "background-color: #00000000;"></div>\' +
                            \'<img src = "\'+ product.img +\'">\' +
                            \'<div class = "detailsGrid"> \' +
                                \'<h1>\'+ product.shirtName +\' - \'+ product.colour +\'</h1>\' +
                                \'<p>\'+ product.description +\'</p>\' +
                                \'<h2>£\'+ product.price +\'</h2>\' +
                                \'<button>Add to Basket</button>\' +
                            \'</div>\' +
                            \'<div style = "background-color: #00000000;"></div>\'; 
                    }
                </script>';

//Outputs the page footer
pageFooter(); 
?>
