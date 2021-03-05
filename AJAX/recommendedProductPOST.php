<?php
//Include libraries
require __DIR__ . '/../vendor/autoload.php';
    
//Create instance of MongoDB client
$mongoClient = (new MongoDB\Client);

//Select a database
$db = $mongoClient->Qwerty;

//Extract the data that was sent to the server
$idA = filter_input(INPUT_POST, 'idA', FILTER_SANITIZE_STRING);
$idB = filter_input(INPUT_POST, 'idB', FILTER_SANITIZE_STRING);
$idC = filter_input(INPUT_POST, 'idC', FILTER_SANITIZE_STRING);

//Create a PHP array with the search criteria
/*
$findCriteriaA = [
    '$text' => [ '$search' => $idA] 
];*/

$findCriteriaB = [
    '_id' => new MongoDB\BSON\ObjectID($idB)
];

$findCriteriaC = [
    '_id' => new MongoDB\BSON\ObjectID($idC)
];

//Find all shirts that match each criteria
/*$cursorA = $db->Shirts->find($findCriteriaA);*/
$cursorB = $db->Shirts->find($findCriteriaB);
$cursorC = $db->Shirts->find($findCriteriaC);

//Initialise the JSON strings
$jsonStrA = "[";
$jsonStrB = "";
$jsonStrC = "";

//Format the response into JSONs readable in JavaScript
/*foreach ($cursorA as $shirt){
    $jsonStrA .= '{"_id" : "'. $shirt['_id'] .'", "shirtName" : "'. $shirt['shirtName'] .'","colour" : "'. $shirt['colour'] .'","price" : '. $shirt['price'] .',"stockQuantity" : '. $shirt['stockQuantity'] .',"description" : "'. $shirt['description'] .'","img" : "'. $shirt['img'] .'"},';
}*/

foreach ($cursorB as $shirt){
    $jsonStrB = '{"_id" : "'. $shirt['_id'] .'", "shirtName" : "'. $shirt['shirtName'] .'","colour" : "'. $shirt['colour'] .'","price" : '. $shirt['price'] .',"stockQuantity" : '. $shirt['stockQuantity'] .',"description" : "'. $shirt['description'] .'","img" : "'. $shirt['img'] .'"},';
}

foreach ($cursorC as $shirt){
    $jsonStrC = '{"_id" : "'. $shirt['_id'] .'", "shirtName" : "'. $shirt['shirtName'] .'","colour" : "'. $shirt['colour'] .'","price" : '. $shirt['price'] .',"stockQuantity" : '. $shirt['stockQuantity'] .',"description" : "'. $shirt['description'] .'","img" : "'. $shirt['img'] .'"},';
}

//Remove last comma from JSONs
$jsonStrA = substr($jsonStrA, 0, strlen($jsonStrA) - 1);
$jsonStrB = substr($jsonStrB, 0, strlen($jsonStrB) - 1);
$jsonStrC = substr($jsonStrC, 0, strlen($jsonStrC) - 1);

$jsonStrA .= "]";