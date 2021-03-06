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
    "userID" => new MongoDB\BSON\ObjectID($userId) 
 ];

//Find all shirts that match  this criteria
$cursor = $db->Basket->find($findCriteria);

$jsonStr = "";

//Format the response into a JSON readable in JavaScript
foreach ($cursor as $basket){
    $basketArrStr = "";
    foreach ($basket['BasketItems'] as $item){//recieve JSON for items
        $basketArrStr .= '{"itemID" : "'. $item['itemID'] .'", "quantity" : '. $item['quantity'] .'},';
    } 
    //Remove last comma
    $basketArrStr = substr($basketArrStr, 0, strlen($basketArrStr) - 1);
    

    //recieve JSON for whole basket
    $jsonStr .= '{"_id" : "'. $basket['_id'] .'","userId" : "'. $userId .'", "BasketItems" : ['. $basketArrStr .']}';
}

if($jsonStr == ""){

    $dataArray = [
        "userID" => new MongoDB\BSON\ObjectID($userId), 
        "BasketItems" => array(), 
        ];

    //Add the new product to the database
    $insertResult = $db->CustomerUsers->insertOne($dataArray);

    $findCriteria = [
        "userID" => new MongoDB\BSON\ObjectID($userId) 
     ];
    
    //Find all shirts that match  this criteria
    $cursor = $db->Basket->find($findCriteria);
    
    //Format the response into a JSON readable in JavaScript
    foreach ($cursor as $basket){
        $itemsArrStr = "";
        foreach ($basket['BasketItems'] as $item){//recieve JSON for items
            $itemsArrStr .= '{"itemID" : "'. $item['itemID'] .'", "quantity" : '. $item['quantity'] .'},';
        } 
        //Remove last comma
        $basketArrStr = substr($basketArrStr, 0, strlen($basketArrStr) - 1);
        
        //recieve JSON for whole order
        $jsonStr .= '{"_id" : "'. $basket['_id'] .'","userId" : "'. $basket['userId'] .'", "BasketItems" : ['. $basketArrStr .']}';
    }
}

//return value
echo $jsonStr;