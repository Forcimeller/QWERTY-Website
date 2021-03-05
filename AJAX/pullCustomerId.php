<?php
//Include libraries
require __DIR__ . '/../vendor/autoload.php';
    
//Create instance of MongoDB client
$mongoClient = (new MongoDB\Client);

//Select a database
$db = $mongoClient->Qwerty;

//Extract the data that was sent to the server
$email = filter_input(INPUT_POST, 'email', FILTER_SANITIZE_STRING);
$password = filter_input(INPUT_POST, 'password', FILTER_SANITIZE_STRING);

//Create a PHP array with the search criterion
$findCriteria = [
    "email" => $email, 
    "usrPasswd" =>$password
 ];

//Find all shirts that match  this criteria
$cursor = $db->CustomerUsers->find($findCriteria);

//Initialise the JSON string
$outputString= "";

//Format the response into a JSON readable in JavaScript
foreach ($cursor as $id){
    $outputString = $id['_id'];
}

echo $outputString;


