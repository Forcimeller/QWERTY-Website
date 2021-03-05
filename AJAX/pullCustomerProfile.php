<?php
//Include libraries
require __DIR__ . '/../vendor/autoload.php';
    
//Create instance of MongoDB client
$mongoClient = (new MongoDB\Client);

//Select a database
$db = $mongoClient->Qwerty;

//Extract the data that was sent to the server
$userId = filter_input(INPUT_POST, 'id', FILTER_SANITIZE_STRING);
//Create a PHP array with the search criterion
$findCriteria = [
    "_id" => new MongoDB\BSON\ObjectID(userId) 
 ];

//Find all shirts that match  this criteria
$cursor = $db->CustomerUsers->find($findCriteria);

//Initialise the JSON string
$jsonStr = "";

//Format the response into a JSON readable in JavaScript
foreach ($cursor as $user){
    $jsonStr = '{"_id" : "'. $user['_id'] .'", "usrFName" : "'. $user['usrFName'] .'", "usrLName" : "'. $user['usrLName'] .'", "usrPasswd" : '. $user['usrPasswd'] .',  "email" : '. $user['email'] .', "phoneNumber" : "'. $user['phoneNumber'] .'", "address" : "'. $user['address'] .'", "postcode" : "'. $user['postcode'] .'"}';
}

echo $jsonStr;


