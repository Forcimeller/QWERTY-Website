<?php
    //Include the PHP functions to be used on the page 
    include('common.php'); 

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
                        <div class = "productGrid">

<?php

//Include libraries
require __DIR__ . '/vendor/autoload.php';
    
//Create instance of MongoDB client
$mongoClient = (new MongoDB\Client);

//Select a database
$db = $mongoClient->Qwerty;

//Extract the data that was sent to the server
$search_string = filter_input(INPUT_GET, 'tags', FILTER_SANITIZE_STRING);

//Create a PHP array with our search criteria
$findCriteria = [
     "tags" => $search_string 
    ];

//Find all of the customers that match  this criteria
$cursor = $db->Shirts->find($findCriteria);

//Output the results
foreach ($cursor as $shirt){

   echo '
        <div class = "productUnitGrid" id = '. $shirt['_id'] .'>
            <img src = "'. $shirt['img'] .'">
            <h1>'. $shirt['shirtName'] .' - '. $shirt['colour'] .'</h1>
            <p>'. $shirt['description'] .'</p>                
            <h2>£'. $shirt['price'] .'</h2>
            <button>Add to Basket</button>
        </div>
    ';
}

?>
    
                        </div>
                    </div>
                </div>
            </div>

<?php
    //Outputs the page footer
    pageFooter(); 
?>