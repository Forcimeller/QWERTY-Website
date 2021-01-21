<?php

#including the common.php file

    include('Common.php'); 
	
 #Calling  the functions required for the page + the unique HTML code for the home page

    outputheader("QWERTY STORE | Shirts for the qwerky");

    outputSearchnavigation();

    ?>


<div class="slideshow">

  
    <div class="Slides fade">
      <img src="Images/placeholder2.png" style="width:100%">

    </div>

    <div class="Slides fade">
      <img src="Images/placeholder333.png" style="width:100%">

    </div>

    <div class="Slides fade">
      <img src="Images/placeholder33.png" style="width:100%">
    </div>

    
    <a class="prev" onclick="plusSlides(-1)">&#10094;</a>
    <a class="next" onclick="plusSlides(1)">&#10095;</a>
    <script>showSlides(slideIndex);</script>
  </div>
  <br>

<div class = "featured-header">
  <h1 class ="featured-header-text">Featured Products</h1>
</div>

<hr>

<div class ="featured">
  <div class="row">
    <div class="column">
      <a href="ProductDetails.php"><img src="Images/Shirtmodel.jpg" style="width:100%"></a>
      <h2 class="Product-name"> Product Name</h2>
      <h2 class="Product-price"> 0.00</h2>
    </div>
    <div class="column">
      <img src="Images/Shirtmodel2.jpg"  style="width:100%">
      <h2 class="Product-name"> Product Name</h2>
      <h2 class="Product-price"> 0.00</h2>
    </div>
    <div class="column">
      <img src="Images/Shirtmodel3.jpg"  style="width:100%">
      <h2 class="Product-name"> Product Name</h2>
      <h2 class="Product-price"> 0.00</h2>
    </div>
  </div>
</div>


<!-- Function to output the footer -->
<?php
    outputfooter();
?>


