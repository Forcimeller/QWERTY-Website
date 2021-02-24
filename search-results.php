<?php
    //Include the PHP functions to be used on the page 
    include('common.php'); 

    //Output header and navigation 
    outputHTMLHeader("QWERTY | SEARCH_");
    pageHeader("SEARCH_", "guest");
?>

            <div class = "mainBodyGrid">
                <div class = "productPageGrid">
                    <div id = "sideBar">
                        <div class = "sideBar">
                            <h1>SORT_BY_</h1>
                            <button>Price (Lowest First)</button>
                            <button>Price (Highest First)</button>
                            <button>Name (A to Z)</button>
                            <button>Name (Z to A)</button>
                        </div>
                    </div>

                    <div id = "content">
                        <h1 class = "inPageHeader" style = "text-align: left;">SEARCH_</h1>
                        <div class = "productGrid">
    
                            <div class = "productUnitGrid">
                                <img src = "Assets\Shirts\CTRLZ-Grey.png">
                                <h1>QWE®TY CTRL + Z</h1>
                                <p>Original hand-sewn, ringspun shirt with signature Ctrl + Z design</p>                
                                <h2>£75</h2>
                                <button>Add to Basket</button>
                            </div>
    
                            <div class = "productUnitGrid">
                                    <img src = "Assets\Shirts\logored.png">
                                    <h1>QWE®TY Fedora</h1>
                                    <p>Original hand-sewn, ringspun shirt with ornate, embossed, Italian velvet in the shape of a hat</p>
                                    <h2>£125</h2>
                                    <button>Add to Basket</button>
                            </div>
    
                            <div class = "productUnitGrid">
                                <img src = "Assets\Shirts\RedHatDarkGrey.png">
                                <h1>QWE®TY CTRL + Z</h1>
                                <p>Original hand-sewn, ringspun shirt with signature Ctrl + Z design</p>
                                <h2>£75</h2>
                                <button>Add to Basket</button>
                            </div>

                            <div class = "productUnitGrid">
                                <img id = "picture" src = "Assets\Shirts\logogrey.png">                         
                                <h1 id = "title">QWE®TY CTRL + Z</h1>                         
                                <p id = "description">Original hand-sewn, ringspun shirt with signature Ctrl + Z design</p>
                                <h2 id = "price">£75</h2>
                                <button id = "basketButton">Add to Basket</button>
    
                            </div>
    
                        </div>
                    </div>
                </div>
            </div>

<?php
    //Outputs the page footer
    pageFooter(); 
?>