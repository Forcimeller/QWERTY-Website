<?php
    //Include the PHP functions to be used on the page 
    include('common.php'); 

    //Output header and navigation 
    outputHTMLHeader("QWERTY | LOG_IN_");
    pageHeader("MY_ACCOUNT_", "");

?>
            <div class = "mainBodyGrid">
                <div class = "productPageGrid">
                    <div id = "sideBar">
                    </div>
    
                    <div id = "content">
                    <h1 class = "inPageHeader" style = "text-align: left;" id = "pageTitle">BASKET_</h1>
                                <div class = "accountSettingsGrid" id = "accountSettingsGrid"> 

                                    <div class = "accountSettingsGridItem" id = "detailBox">
                                        <h1 class = "orderH1">ITEMS:</h1>
                                        <div id = "items">
                                            <p><i>Basket Empty</i></p>
                                        </div> 
                                        <h2 class = "orderH2" id = "subtotal"></h2>
                                        <button class = "navButton" onclick = "checkout()">PAY_NOW_</button>
                                        <button class = "navButton" onclick = "emptyBasket()" >EMPTY_BASKET_</button>
                                        <p style = "color: #FF0000;" id = "userInformer"></p>
                                    </div>

                                </div>

                        </div>
                    </div>                       
                </div>
                <script src = "JavaScript\basketFunctionality.js"></script>
                <script src = "JavaScript\basketAndCheckout.js"></script>
            </div>

<?php
//Outputs the page footer
pageFooter(); 
?>
