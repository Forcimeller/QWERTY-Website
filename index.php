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
                    <div id = "positionA">
                        <div class = "featuredProductUnitGrid">
                            <img src = "Assets\Shirts\CTRLZ-Grey.png">
                            <h1>QWE®TY CTRL + Z</h1>
                            <p>Original hand-sewn, ringspun shirt with signature Ctrl + Z design</p>
                            <h2>£75</h2>
                            <button>Add to Basket</button>
                        </div>
                    </div>

                    <div id = "positionB">
                        <div class = "featuredProductUnitGrid">
                            <img src = "Assets\Shirts\RedHat-Grey.png">
                            <h1>QWE®TY Fedora</h1>
                            <p>Original hand-sewn, ringspun shirt with ornate, embossed, Italian velvet in the shape of a hat</p>  
                            <h2>£125</h2>
                            <button>Add to Basket</button>
                        </div>
                    </div>

                    <div id = "positionC">
                        <div class = "featuredProductUnitGrid">
                            <img src = "Assets\Shirts\logo-red.png">
                            <h1>QWE®TY CTRL + Z</h1>
                            <p>Original hand-sewn, ringspun shirt with signature Ctrl + Z design</p>
                            <h2>£75</h2>
                            <button>Add to Basket</button>]
                        </div>
                    </div>

                    <div></div>
                </div>
            </div>


<?php

    echo '
    <form action = "index.php" method = "post" id = "formA">
        <input type = "hidden" name = "idA" value = "" required> 
    </form>

    <form action = "index.php" method = "post" id = "formB">
        <input type = "hidden" name = "idB" value = "" required> 
    </form>

    <form action = "index.php" method = "post" id = "formC">
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
        
        if("'.$jsonStrA.'" === "]" && "'.$jsonStrB.'" === "" && "'.$jsonStrC.'" === ""){//Ensures this has not been done already
            //
            let topKeyword = recommender.getTopKeyword();
            console.log("TOP KEYWORD: " + topKeyword);
            let topViewing, secondTopViewing = recommender.getTopViewing();
            
            //Set all the elemnet IDs
            let A = document.getElementById("formA")
            let B = document.getElementById("formB")
            let C = document.getElementById("formC")
            let AValue = document.getElementById("idA")
            let BValue = document.getElementById("idB")
            let CValue = document.getElementById("idC")

            if(topKeyword !== ""){
                AValue.value = topKeyword; 
                A.submit();
            }

            if(topViewing !== ""){
                BValue.value = topViewing;
                B.submit();
            }

            if(secondTopViewing !== ""){
                CValue.value = secondTopViewing;
                C.submit();
            }

            function fillRecommended(position, jSONdocument){
                let recommendation = JSON.parse(jSONdocument);
                let element = document.getElementById(position);
                
                grid.innerHTML += \'<div onclick = location.href="item.php?id=\'+ recommendation._id +\'" class = "featuredProductUnitGrid" id = "\'+ recommendation._id +\'">\' +
                    \'<img src = "\'+ recommendation.img +\'">\' +
                    \'<h1>\'+ recommendation.shirtName +\' - \'+ recommendation.colour +\'</h1>\' +
                    \'<p>\'+ recommendation.description +\'</p>\' +
                    \'<h2>£\'+ recommendation.price +\'</h2>\' +
                    \'<button>Add to Basket</button>\' +
                \'</div>\n\'; 

            }

        }

    </script>    
    ';

    //Outputs the page footer
    pageFooter(); 
?>