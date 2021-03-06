<?php
//Include libraries
require __DIR__ . '/../vendor/autoload.php';
    
//Create instance of MongoDB client
$mongoClient = (new MongoDB\Client);

//Select a database
$db = $mongoClient->Qwerty;

//Extract the data that was sent to the server
$customerId = filter_input(INPUT_POST, 'customerId', FILTER_SANITIZE_STRING);
$date = filter_input(INPUT_POST, 'date', FILTER_SANITIZE_STRING);
$time = filter_input(INPUT_POST, 'time', FILTER_SANITIZE_STRING);
$BasketItems = filter_input(INPUT_POST, 'BasketItems', FILTER_SANITIZE_STRING);
$basketTotal = filter_input(INPUT_POST, 'basketTotal', FILTER_SANITIZE_STRING);
$status = filter_input(INPUT_POST, 'status', FILTER_SANITIZE_STRING);
$trackingNumber = filter_input(INPUT_POST, 'trackingNumber', FILTER_SANITIZE_STRING);

//insert basket
$dataArray = [
    "customerId" => $customerId, 
    "date" => $date, 
    "time" => $time,
    //"items" => $BasketItems, 
    "basketToatal" => $basketTotal, 
    "status" => $status,
    "trackingNumber" => $trackingNumber
 ];

//Add the new product to the database
$insertResult = $db->Transactions->insertOne($dataArray);

/*
//Specify how the documents will be updated
$updateCriteria = [
    '$set' => [ "BasketItems" => $items ]
];

//Find all shirts that match  this criteria
$updateRes = $db->CustomerUsers->updateOne($findCriteria, $updateCriteria);
*/
//Reply with success note
echo 'Total Spend: £' . $basketTotal;


