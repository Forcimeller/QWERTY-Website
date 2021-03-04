<?php

//Include libraries
require __DIR__ . '/vendor/autoload.php';
    
//Create instance of MongoDB client
$mongoClient = (new MongoDB\Client);

//Select a database
$db = $mongoClient->mongoDump;


$cursor = $db->Transactions->find();




//Output the resultsss
echo "<h1>Orders</h1>";
foreach ($cursor as $cust){
   echo '<form action="deleteorder.php" method="post">';
   echo "<p>";
   echo "Customer's ID: " . $cust['customerId'];
   echo "<br>";
   echo "Date: ". $cust['date'];
   echo "<br>";
   echo "Time: ". $cust['time'];
   echo "<br>";
   echo "Basket total: ". $cust['basketToatal'];
   echo "<br>";
   echo "Status: ". $cust['status'];
   echo "Tracking Number: ". $cust['trackingNumber'];
   echo '<input type="submit" value="Delete">';
   echo "</p>";

}


?>