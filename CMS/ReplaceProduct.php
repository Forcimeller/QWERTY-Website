<?php

//Include libraries
require __DIR__ . '/vendor/autoload.php';
    
//Create instance of MongoDB client
$mongoClient = (new MongoDB\Client);

//Select a database
$db = $mongoClient->mongoDump;

//Extract the customer details 
$shirtName= filter_input(INPUT_POST, 'shirtName', FILTER_SANITIZE_STRING);
$colour = filter_input(INPUT_POST, 'colour', FILTER_SANITIZE_STRING);
$price = filter_input(INPUT_POST, 'price', FILTER_SANITIZE_STRING);
$stockQuantity = filter_input(INPUT_POST, 'quantity', FILTER_SANITIZE_STRING);
$description = filter_input(INPUT_POST, 'description', FILTER_SANITIZE_STRING);
$img = filter_input(INPUT_POST, 'picture', FILTER_SANITIZE_STRING);
$id = filter_input(INPUT_POST, 'id', FILTER_SANITIZE_STRING);

//Criteria for finding document to replace
$replaceCriteria = [
    "_id" => new MongoDB\BSON\ObjectID($id)
];

//Data to replace
$dataArray = [
    "shirtName" => $shirtName, 
    "colour" => $colour, 
    "price" => $price,
    "quantity" => $stockQuantity,
    "description" => $description,
    "picture" => $img,
 ];


//Replace customer data for this ID
$updateRes = $db->Shirts->replaceOne($replaceCriteria, $dataArray);
    
//Echo result back to user
if($updateRes->getModifiedCount() == 1)
    echo 'Products have been sucessfully updated.';
else
    echo 'Error in updating products.';


