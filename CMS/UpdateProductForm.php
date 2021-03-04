<?php

//Include libraries
require __DIR__ . '/vendor/autoload.php';
    
//Create instance of MongoDB client
$mongoClient = (new MongoDB\Client);

//Select a database
$db = $mongoClient->mongoDump;

$cursor = $db->Shirts->find();

echo "<h1>Products</h1>";   
foreach ($cursor as $cust){
    echo '<form action="ReplaceProduct.php" method="post">';
    echo 'Shirt Name: <input type="text" name="shirtName" value="' . $cust['shirtName'] . '" required><br>';
    echo 'Colour: <input type="text" name="colour" value="' . $cust['colour'] . '" required><br>';
    echo 'Price: <input type="text" name="price" value="' . $cust['price'] . '" required><br>'; 
    echo 'Stock Quantity: <input type="text" name="quantity" value="' . $cust['stockQuantity'] . '" required><br>'; 
    echo 'Description: <input type="text" name="description" value="' . $cust['description'] . '" required><br>'; 
    echo 'Image type: <input type="text" name="picture" value="' . $cust['img'] . '" required><br>';
    echo '<input type="hidden" name="id" value="' . $cust['_id'] . '" required>'; 
    echo '<input type="submit">';
    echo '</form><br>';
}

 echo 
 '<a href="navigation.html"><h1>Back</h1></a>
 <a href="index.html"><h1>Sign out</h1></a>';

 
 