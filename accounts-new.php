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
                    
                    <div class = "loginGrid">
                        <div class = "banner">
                            <img src = "Assets\logo-white.png" class = "loginBanner">
                        </div>
                        <form action = "" id = "newUser">
                            <label for = "newUsrName"> Add email </label><br>
                            <input type = "text" id = "newUsrName" name = "newUsrName" autofocus><br>
                            
                            <label for = "FirstName"> First Name </label><br>
                            <input type = "text" id = "fName" name = "FirstName"><br>
                            
                            <label for = "LastName"> Last Name </label><br>
                            <input type = "text" id = "lName" name = "LastName"><br>
                            
                            <label for = "Address"> Address </label><br>
                            <input type = "text" id = "address" name = "Address"><br>

                            <label for = "PostCode"> Post Code </label><br>
                            <input type = "text" id = "postCode" name = "PostCode"><br>

                            <label for = "newPassword"> Create Password </label><br>
                            <input type = "password" id = "newPassword" name = "newPassword"><br>
                            
                            <label for = "confPassword"> Confirm Password </label><br>
                            <input type = "password" id = "confPassword" name = "confPassword"><br>

                            </form>
                            <div><p class = "userMessage" id  = "usrMsg"></p></div>

                        <!--Butons for navigating the site-->
                        <button class = "loginButton" action = ""> Submit </button>
                        <a class = "backButton" href = "accounts.php"> &lt Back </a>
                    </div>
                    
                    <div></div>
                </div>
            </div>

<?php
//Outputs the page footer
pageFooter(); 
?>
