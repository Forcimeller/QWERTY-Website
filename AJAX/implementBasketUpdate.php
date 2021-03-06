<?php
//Include libraries
require __DIR__ . '/../vendor/autoload.php';
    
//Create instance of MongoDB client
$mongoClient = (new MongoDB\Client);

//Select a database
$db = $mongoClient->Qwerty;

//Extract the data that was sent to the server
$BasketId = filter_input(INPUT_POST, 'id', FILTER_SANITIZE_STRING);
$items = filter_input(INPUT_POST, 'BasketItems', FILTER_SANITIZE_STRING);

//Create a PHP array with the search criterion
$findCriteria = [
    "_id" => new MongoDB\BSON\ObjectID($BasketId) 
 ];

//Specify how the documents will be updated
$updateCriteria = [
    '$set' => [ "BasketItems" => $items ]
];

//Find all shirts that match  this criteria
$updateRes = $db->CustomerUsers->updateOne($findCriteria, $updateCriteria);

//Reply with success note
//echo 'Number of documents updated: ' . $updateRes->getModifiedCount();
echo $items;


