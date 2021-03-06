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

                                    <div class = "accountSettingsGridItem">
                                        <h1 class = "orderH1">ITEMS:</h1>
                                        <p>1 x QWE®TY Original, Black | £40</p>
                                        <p>2 x QWE®TY Red Hat, White | £125</p>
                                        <button class = "navButton">PAY_NOW_</button>
                                        <p style = "color:red;" id = "userInformer"></p>
                                    </div>

                                </div>

                        </div>
                    </div>                       
                </div>
                <script src = "JavaScript\userSettingsPage.js"></script>
            </div>

<?php
//Outputs the page footer
pageFooter(); 
?>
