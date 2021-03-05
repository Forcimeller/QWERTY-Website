<?php
//Include libraries
require __DIR__ . '/../vendor/autoload.php';
    
//Create instance of MongoDB client
$mongoClient = (new MongoDB\Client);

//Select a database
$db = $mongoClient->Qwerty;

//Find all of the customers that match  this criteria
$cursor = $db->Shirts->find();

//Output each customer as a JSON object with comma in between
$jsonStr = '['; //Start of array of customers in JSON


//Output the results
foreach ($cursor as $shirt){

    $jsonStr .= '{"_id" : "'. $shirt['_id'] .'", "shirtName" : "'. $shirt['shirtName'] .'","colour" : "'. $shirt['colour'] .'","price" : '. $shirt['price'] .',"stockQuantity" : '. $shirt['stockQuantity'] .',"description" : "'. $shirt['description'] .'","img" : "'. $shirt['img'] .'"},';
}

//Remove last comma
$jsonStr = substr($jsonStr, 0, strlen($jsonStr) - 1);

//Close array
$jsonStr .= ']';
