<?php
//Include libraries
require __DIR__ . '/../vendor/autoload.php';
    
//Create instance of MongoDB client
$mongoClient = (new MongoDB\Client);

//Select a database
$db = $mongoClient->Qwerty;

//Get name and address strings - need to filter input to reduce chances of SQL injection etc.
$email = filter_input(INPUT_POST, 'email', FILTER_SANITIZE_STRING);
$fName = filter_input(INPUT_POST, 'fName', FILTER_SANITIZE_STRING);
$lName = filter_input(INPUT_POST, 'lName', FILTER_SANITIZE_STRING);
$address = filter_input(INPUT_POST, 'address', FILTER_SANITIZE_STRING);
$postCode = filter_input(INPUT_POST, 'postCode', FILTER_SANITIZE_STRING);
$password = filter_input(INPUT_POST, 'password', FILTER_SANITIZE_STRING);


if($email != "" && $address != "" && $password != ""){//Check query parameters 
    
    //STORE REGISTRATION DATA IN MONGODB
    $dataArray = [
        "email" => $email, 
        "usrFName" => $fName, 
        "usrLName" => $lName,
        "address" => $address, 
        "postcode" => $postCode, 
        "usrPasswd" =>$password
     ];
    
    //Add the new customer to the database
    $insertResult = $db->CustomerUsers->insertOne($dataArray);
    
    //Output message confirming registration
    echo 'Thank you for registering, ' . $fName;
}
else{//A query string parameter cannot be found
    echo 'There is an error. Please contact us using the links in the footer';
}

