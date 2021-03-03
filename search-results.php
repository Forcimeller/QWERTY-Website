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
                        <div class = "productGrid" id = "productGrid">
                            
                        </div>
                    </div>
                </div>
            </div>

<?php
    //Outputs the page footer
    pageFooter(); 
?>