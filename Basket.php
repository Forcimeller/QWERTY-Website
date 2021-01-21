<?php

#including the common.php file

    include('Common.php'); 
	
 #Calling  the functions required for the page + the unique HTML code for the pages basket and checkout box 

    outputheader("QWERTY STORE | Basket");

    outputSearchnavigation();

    ?>


<div class="checkout">
    <div class="checkout-content">
      <h1>Summary</h1>

      <h3>Total:</h3>
      <br>


      <button class="pay" type="button">Pay Now</button>

    </div>

  </div>


  <div class="product-buy">
    <div class="product-buy-content">
      <h1> Product Name</h1>
      <ul>
       
        <h3> 0.00</h3>
        <h3> quantity: 0</h3>
        
      </ul>

      <img src="Images/Shirtmodel3.jpg">
      <button class="Remove" type="button">Remove</button>
      <button class="Remove" type="button">Update</button>
      <br>
      <div class="dropdown">
        <label for="quantity">quantity:</label>
        <input type="text" id="quantity" name="quantity">
      </div>

    </div>
  </div>
<!-- Function to output the footer -->
<?php
    outputfooter();
?>

