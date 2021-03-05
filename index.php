<?php
    //Include the PHP functions to be used on the page 
    include('common.php');
    include('AJAX\recommendedProductPOST.php');

    //Output header and navigation 
    outputHTMLHeader("QWERTY | SPOTLIGHT_");
    pageHeader("SPOTLIGHT_", "guest");
?>

            <div class = "mainBodyGrid">
                <div class = "slideshowGrid">
                    <script src = "JavaScript\slideShow.js"></script>
                    <script>showSlides(slideIndex);</script>
                    <button class = "prev" onclick = "plusSlides(-1)">❮</button>
                    
                    <div class = "slideshow">

                        <!-- Full-width images with number and caption text -->
                        <div class="Slides fade" style="display: block;">
                            <img src="Assets\Slideshow\Slideshow-1.png" style = "width: 100%">
                        </div>

                        <div class="Slides fade" style="display: none;">
                            <img src="Assets\Slideshow\Slideshow-2.png" style = "width: 100%">
                        </div>

                        <div class="Slides fade" style="display: none;">
                            <img src="Assets\Slideshow\Slideshow-3.png" style = "width: 100%">
                        </div>
                        
                    </div>

                    <button class = "next" onclick = "plusSlides(1)">❯</button>
                </div>

                <div>
                    <h1 class = "inPageHeader">FEATURED_SHIRTS_</h1>
                </div>

                <div class = "featureGrid" style = "padding-left: 5%; padding-right: 5%;">
                    <div></div>
                    <div class = "featuredProductUnitGrid" id = "positionA">
                        <img src = "Assets\Shirts\CTRLZ-Grey.png">
                        <h1>QWE®TY CTRL + Z</h1>
                        <p>Original hand-sewn, ringspun shirt with signature Ctrl + Z design</p>
                        <h2>£75</h2>
                        <button>Add to Basket</button>
                    </div>

                    <div class = "featuredProductUnitGrid" id = "positionB">
                        <img src = "Assets\Shirts\RedHat-Grey.png">
                        <h1>QWE®TY Fedora</h1>
                        <p>Original hand-sewn, ringspun shirt with ornate, embossed, Italian velvet in the shape of a hat</p>  
                        <h2>£125</h2>
                        <button>Add to Basket</button>
                    </div>

                    <div class = "featuredProductUnitGrid" id = "positionC">
                        <img src = "Assets\Shirts\logo-red.png">
                        <h1>QWE®TY CTRL + Z</h1>
                        <p>Original hand-sewn, ringspun shirt with signature Ctrl + Z design</p>
                        <h2>£75</h2>
                        <button>Add to Basket</button>
                    </div>

                    <div></div>
                </div>
            </div>


<?php

    echo '
    <form action = "index.php" method = "post">
        <input type = "hidden" name = "idA" value = "" required> 
    </form>

    <form action = "index.php" method = "post">
        <input type = "hidden" name = "idB" value = "" required> 
    </form>

    <form action = "index.php" method = "post">
        <input type = "hidden" name = "idC" value = "" required> 
    </form>

    ';

    echo '
    <script  type=\'module\'>
        "use strict";

        //Import recommender class
        import {Recommender} from \'./JavaScript/recommender.js\';

        //Create recommender object - it loads its state from local storage
        let recommender = new Recommender();
        
        /* Set up button to call search function. We have to do it here 
            because search() is not visible outside the module. */
        document.getElementById("SearchButton").onclick = search;
        
        //Display recommendation
        window.onload = showRecommendation;
        
        //Searches for products in database
        function search(){
            //Extract the search text
            let searchText = document.getElementById("SearchInput").value;
            
            //Add the search keyword to the recommender
            recommender.addKeyword(searchText);
            showRecommendation();
            
            //#FIXME# PERFORM SEARCH FOR PRODUCTS
        }
        
        //Display the recommendation in the document
        function showRecommendation(){
            document.getElementById("RecomendationDiv").innerHTML = recommender.getTopKeyword();
        }
    </script>    
    ';

    //Outputs the page footer
    pageFooter(); 
?>