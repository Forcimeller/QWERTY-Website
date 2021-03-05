<?php
    //Include the PHP functions to be used on the page 
    include('common.php'); 

    //Output header and navigation 
    outputHTMLHeader("QWERTY | LOG_IN_");
    pageHeader("MY_ACCOUNT_", "");

?>

            <div class = "mainBodyGrid">
                <div class = "loginContainer">
                    <div></div>
                    <script src = "JavaScript\login.js"></script>
                    <div class = "loginGrid">

                        <form action = "" id = "existingUser">
                            <label for = "usrName"> Email </label><br>
                            <input type = "text" id = "usrName" name = "usrName" autofocus><br>
                            <label for = "usrPassword"> Password </label><br>
                            <input type = "password" id = "usrPassword" name = "usrPassword"><br>
                            
                        </form>
                        <div><p class = "userMessage" id  = "usrMsg"></p></div>

                        <!--Butons for navigating the site-->
                        <button class = "loginButton" onclick = "login()"> Submit </button>
                        <a class = "backButton" href = "accounts.php"> &lt Back </a>
                    </div>
                    
                    <div></div>
                </div>
            </div>

<?php
//Outputs the page footer
pageFooter(); 
?>
