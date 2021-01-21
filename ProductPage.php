<?php
    
#including the Common.php file

    include('Common.php'); 

    outputheader("QWERTY STORE | Products");
    outputSearchnavigation();

    #Calling  the functions required for the page + the unique HTML code for the product listings

    ?>

</div>

<div class="side-settings">

    <h1>Sort by</h1>

    <ul>
        <li> Price (Low-High) </li>
        <li> Price (High-Low) </li>
        <li> Alphabetical</li>
        <li>Newest</li>
    </ul>
    <br>

    <h2>Newest</h2>
    <ul>
        <li>Colour</li>
        <li>Size</li>
    </ul>



</div>

<div class="row">
        <div class="products">
            <a href="ProductDetails.html"><img src="Images/Shirtmodel.jpg" style="width:100%"></a>
            <h2 class="Product-name"> Product Name</h2>
            <h2 class="Product-price"> 0.00</h2>
        </div>
        <div class="products">
            <a href="ProductDetails.html"><img src="Images/Shirtmodel2.jpg" style="width:100%"></a>
            <h2 class="Product-name"> Product Name</h2>
            <h2 class="Product-price"> 0.00</h2>
        </div>
        <div class="products">
            <a href="ProductDetails.html"><img src="Images/Shirtmodel3.jpg" style="width:100%"></a>
            <h2 class="Product-name"> Product Name</h2>
            <h2 class="Product-price"> 0.00</h2>
        </div>
    </div>


<!-- Function to output the footer -->
<?php
    outputfooter();
?>

