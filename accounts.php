<?php
    //Include the PHP functions to be used on the page 
    include('common.php'); 

    //Output header and navigation 
    outputHTMLHeader("QWERTY | LOG_IN_");
    pageHeader("MY_ACCOUNT_", "");

?>
            <script>
            if(sessionStorage.loggedInUserId !== undefined){
                location.href = "accounts-settings.php";
            }
            </script>

            <div class = "mainBodyGrid">
                <div class = "loginContainer">
                    <div></div>
                    
                    <div class = "loginGrid">
                        <div class = "banner">
                            <img src = "Assets\logo-white.png" class = "loginBanner">
                        </div>
                        <button class = "loginButton" onclick = "location.href = 'accounts-existing.php'">Login</button>
                        <button class = "loginButton" onclick = "location.href = 'accounts-new.php'">Register for free</button>
                        <hr>
                        <button class = "loginButton" onclick = "location.href = 'CMS/index.html'" >Member of Staff</button>
                    </div>
                    
                    <div></div>
                </div>
            </div>

<?php
//Outputs the page footer
pageFooter(); 
?>
