<?php
    //Include the PHP functions to be used on the page 
    include('common.php'); 

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
                    <div class = "featuredProductUnitGrid">

                        <div>
                            <img src = "Assets\Shirts\CTRLZ-Grey.png">
                        </div>
    
                        <div>
                            <h1>QWE®TY CTRL + Z</h1>
                        </div>
    
                        <div>
                            <p>Original hand-sewn, ringspun shirt with signature Ctrl + Z design</p>
                        </div>                    
    
                        <div>
                            <h2>£75</h2>
                        </div>
    
                        <div>
                            <button>Add to Basket</button>
                        </div>

                    </div>

                    <div class = "featuredProductUnitGrid">

                        <div>
                            <img src = "Assets\Shirts\RedHat.png">
                        </div>
    
                        <div>
                            <h1>QWE®TY Fedora</h1>
                        </div>
    
                        <div>
                            <p>Original hand-sewn, ringspun shirt with ornate, embossed, Italian velvet in the shape of a hat</p>
                        </div>                    
    
                        <div>
                            <h2>£125</h2>
                        </div>
    
                        <div>
                            <button>Add to Basket</button>
                        </div>

                    </div>

                    <div class = "featuredProductUnitGrid">

                        <div>
                            <img src = "Assets\Shirts\logored.png">
                        </div>
    
                        <div>
                            <h1>QWE®TY CTRL + Z</h1>
                        </div>
    
                        <div>
                            <p>Original hand-sewn, ringspun shirt with signature Ctrl + Z design</p>
                        </div>                    
    
                        <div>
                            <h2>£75</h2>
                        </div>
    
                        <div>
                            <button>Add to Basket</button>
                        </div>

                    </div>

                    <div></div>
                </div>

            </div>

<?php
    //Outputs the page footer
    pageFooter(); 
?>