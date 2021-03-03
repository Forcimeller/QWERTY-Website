<?php



//Include libraries
require __DIR__ . '/vendor/autoload.php';
    
//Create instance of MongoDB client
$mongoClient = (new MongoDB\Client);

//Select a database
$db = $mongoClient->mongoDump;


$cursor = $db->Shirts->find();




//Output the resultsss
echo "<h1Current Stock</h1>";
foreach ($cursor as $cust){
  
   echo "<p>";
   echo "Shirt's Name: " . $cust['shirtName'];
   echo "<br>";
   echo "Colour: ". $cust['colour'];
   echo "<br>";
   echo "Price: ". $cust['price'];
   echo "<br>";
   echo "Quantity: ". $cust['stockQuantity'];
   echo "<br>";
   echo "Description: ". $cust['description'];
   echo "<br>";
   echo "Image path: ". $cust['img'];
   echo "</p>";

}



