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
    "customerId" => new MongoDB\BSON\ObjectID($userId) 
 ];

//Find all shirts that match  this criteria
$cursor = $db->Transactions->find($findCriteria);

//Initialise the JSON string
$jsonStr = '['; 

//Format the response into a JSON readable in JavaScript

foreach ($cursor as $order){
    $orderArrStr = "";
    foreach ($order['items'] as $item){//recieve JSON for items
        $orderArrStr .= '{"itemID" : "'. $item['itemID'] .'", "quantity" : '. $item['quantity'] .'},';
    } 
    //Remove last comma
    $orderArrStr = substr($orderArrStr, 0, strlen($orderArrStr) - 1);
    
    //recieve JSON for whole order
    $jsonStr .= '{"_id" : "'. $order['_id'] .'","customerId" : "'. $order['customerId'] .'", "date" : "'. $order['date'] .'", "items" : ['. $orderArrStr .'], "basketToatal" : '. $order['basketToatal'] .', "status" : "'. $order['status'] .'", "trackingNumber" : "'. $order['trackingNumber'] .'"},';
}

//Remove last comma
$jsonStr = substr($jsonStr, 0, strlen($jsonStr) - 1);

//Close array
$jsonStr .= ']';

//return value
echo $jsonStr;