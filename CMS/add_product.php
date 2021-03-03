<?php

//Include libraries
require __DIR__ . '/vendor/autoload.php';
    
//Create instance of MongoDB client
$mongoClient = (new MongoDB\Client);

//Select a database
$db = $mongoClient->mongoDump;

//Select a collection 
$collection = $db->Shirts;

//Extract the data that was sent to the server
$shirtName= filter_input(INPUT_POST, 'shirtName', FILTER_SANITIZE_STRING);
$colour = filter_input(INPUT_POST, 'colour', FILTER_SANITIZE_STRING);
$price = filter_input(INPUT_POST, 'price', FILTER_SANITIZE_STRING);
$stockQuantity = filter_input(INPUT_POST, 'quantity', FILTER_SANITIZE_STRING);
$description = filter_input(INPUT_POST, 'description', FILTER_SANITIZE_STRING);
$img = filter_input(INPUT_POST, 'picture', FILTER_SANITIZE_STRING);
//Convert to PHP array
$dataArray = [
    "shirtname" => $shirtName, 
    "colour" => $colour, 
    "price" => $price,
    "quantity" => $stockQuantity,
    "description" => $description,
    "picture" => $img,
 ];

//Add the new product to the database
$insertResult = $collection->insertOne($dataArray);
    
//Echo result back to user
if($insertResult->getInsertedCount()==1){
    echo 'Shirt added.';
    echo ' New document id: ' . $insertResult->getInsertedId();
}
else {
    echo 'Error adding shirt';
}






