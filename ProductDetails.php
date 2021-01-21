<?php

#including the common.php file

    include('Common.php'); 
	
 #Calling  the functions required for the page + the unique HTML code for the product details page

    outputheader("QWERTY STORE | Product Details");

    outputSearchnavigation();

    ?>


<div class="product">
        <img src="Images/Shirtmodel.jpg" style="width:100%">
    </div>


    <div class="product-details">
        <div class="detail-text">
            <h1>Product Name</h1>
            <h2>Price</h2>

            <br>
            <label for="shirts">Size:</label>
            <select name="shirts" id="shirts">
                <option value="small">S</option>
                <option value="medium">M</option>
                <option value="large">L</option>
                <option value="extra-large">XL</option>
            </select>
            <label for="Colour">Colour:</label>
            <select name="shirts" id="shirts">
                <option value="Black">Black</option>
                <option value="Red">Red</option>
                <option value="Grey">Grey</option>
                <option value="Dark-Grey">Dark Grey</option>
                <option value="White">White</option>
            </select>

            <br>

            <ul>
                <li>Turn heads on the streets while rocking this shirt!</li>
                <li>Made from the finest cotten out there</li>
                <li>Availabe in a large range of sizes</li>

            </ul>

            <br>

            <button type="button" class="add"> Add to cart</button>
        </div>
    </div>


    
<!-- Function to output the footer -->
<?php
    outputfooter();
?>





