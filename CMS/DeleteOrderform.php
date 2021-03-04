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
   echo "<br>";
   echo "Tracking Number: ". $cust['trackingNumber'];
   echo "<br>";
   echo '<input type="submit" value="Delete">';
   echo '<input type="text" name="id" value="' . $cust['_id'] . '" required>';
   echo "</p>";

}

echo '<a href="navigation.html"><h1>Back</h1></a>';
echo ' <a href="index.html"><h1>Sign out</h1></a>';
