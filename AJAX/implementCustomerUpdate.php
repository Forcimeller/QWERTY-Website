<?php
//Include libraries
require __DIR__ . '/../vendor/autoload.php';
    
//Create instance of MongoDB client
$mongoClient = (new MongoDB\Client);

//Select a database
$db = $mongoClient->Qwerty;

//Extract the data that was sent to the server
$userId = filter_input(INPUT_POST, 'id', FILTER_SANITIZE_STRING);
$field = filter_input(INPUT_POST, 'field', FILTER_SANITIZE_STRING);
$value = filter_input(INPUT_POST, 'value', FILTER_SANITIZE_STRING);

//Create a PHP array with the search criterion
$findCriteria = [
    "_id" => new MongoDB\BSON\ObjectID($userId) 
 ];

//Specify how the documents will be updated
$updateCriteria = [
    '$set' => [ $field => $value ]
];

//Find all shirts that match  this criteria
$updateRes = $db->CustomerUsers->updateOne($findCriteria, $updateCriteria);

//Reply with success note
echo 'Number of documents updated: ' . $updateRes->getModifiedCount();


