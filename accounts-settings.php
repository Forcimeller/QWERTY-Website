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
                        <div class = "sideBar" id = "sidebarContent">
                            <h1>OPTIONS_</h1>
                            <button class = "clickedButton" disabled>ACCOUNT_SETTINGS_</button>
                            <button class = "sideBarButton" onclick = "loadOrderHistoryPage()">ORDER_HISTORY</button>
                            <button class = "sideBarButton" onclick = "signOut()">SIGN_OUT_</button>
                            <p id = "userInformer" class = "userMessage" style = "font-size: 11; color: red;"></p>
                        </div>
                    </div>
    
                    <div id = "content">
                        <h1 class = "inPageHeader" style = "text-align: left;" id = "pageTitle">ACCOUNT_SETTINGS</h1>
                        <div class = "accountSettingsGrid" id = "accountSettingsGrid"> 

                            <!--Change email form-->
                            <div id = "changeUserEmail" class = "accountSettingsGridItem">
                                <h2>Change Email</h2>
                                <p id = "currentEmail"></p>
                                <label for = "newEmail"> New Email Address </label>
                                <input type = "text" id = "newEmail" name = "newEmail">
                                <button class = "sideBarButton" style = "font-weight: normal;" onclick = "changeEmail()"> Change </button>
                            </div>

                            <div id = "changeAddress" class = "accountSettingsGridItem">
                                <h2>Change Address</Address></h2>
                                <p id = "currentAdd"></p>
                                <label for = "newAdd"> New Address </label>
                                <input type = "text" id = "newAdd" name = "newAdd">
                                <label for = "newPost"> New Post Code </label>
                                <input type = "text" id = "newPost" name = "newPost">
                                <button class = "sideBarButton" style = "font-weight: normal;" onclick = "changeAddress()"> Change </button>
                            </div>
                                                                
                            <!--Change password form-->
                            <div id = "changePassword" class = "accountSettingsGridItem">
                                <h2>Change Password</h2>
                                <label for = "currPass"> Current Password </label>
                                <input type = "text" id = "currPass" name = "currPass">
                                <label for = "newPass"> New Password </label>
                                <input type = "text" id = "newPass" name = "newPass">
                                <label for = "confNewPass"> Confirm New Password </label>
                                <input type = "text" id = "confNewPass" name = "confNewPass">
                                <button class = "sideBarButton" style = "font-weight: normal;" onclick = "changePassword()"> Change </button>
                            </div>

                            <!--Delete user form-->
                            <div id = "deleteUser" class = "accountSettingsGridItem" style = "background-color: red;">
                                <h2>Delete Acccount &amp; Data</h2>
                                <label for = "usrName"> Email </label>
                                <input type = "text" id = "usrName" name = "usrName">
                                <label for = "password"> Password </label>
                                <input type = "text" id = "password" name = "password">
                                <button class = "sideBarButton" style = "font-weight: normal;" onclick = "deleteAccount()"> Delete </button>
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
