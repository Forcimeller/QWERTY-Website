let userJSON;

//Sets all of the relevant pageDetails
const pageContent = document.getElementById("content");
const settingsGrid = document.getElementById("accountSettingsGrid");
const sideBarContent = document.getElementById("sidebarContent");
const pageTitle = document.getElementById("pageTitle");
const currentEmailParagraph = document.getElementById("currentEmail");
const currentAddressParagraph = document.getElementById("currentAdd");
const userInformationParagraph = document.getElementById("userInformer");
const newEmail = document.getElementById("newEmail");
const newAddress = document.getElementById("newAdd");
const newPostCode = document.getElementById("newPost");
const currentPassword = document.getElementById("currPass");
const newPassword = document.getElementById("newPass");
const newPassConfimation = document.getElementById("confNewPass");
const username = document.getElementById("usrName");
const password = document.getElementById("password");

function changeEmail(){
    let userObj = JSON.parse(userJSON);

    let email = newEmail.value;
    if(email === ""){
        userInformationParagraph.innerHTML = "Please type in a new email";
    }else if(email === userObj.email){
        userInformationParagraph.innerHTML = "You already have that email!";
    }else{
        implementChange("email", email);
        userInformationParagraph.innerHTML = "Email Update Complete!";
        currentEmailParagraph.innerHTML = "Current Email: " + email;
        email = "";
    }
}

function changeAddress(){
    let userObj = JSON.parse(userJSON);

    let address = newAddress.value;
    let postcode = newPostCode.value;

    if(address === "" || postcode === ""){
        userInformationParagraph.innerHTML = "Add <b>BOTH<b> an address and a postcode.";
    }else if(address === userObj.address || postcode === userObj.postcode){
        userInformationParagraph.innerHTML = "You already have those address details";
    }else{
        implementChange("address", address);
        implementChange("postcode", postcode);
        userInformationParagraph.innerHTML = "Address Update Complete!";
        currentAddressParagraph.innerHTML = "Current Address: " + address + "<br>" + "Postcode: " + postcode;
        newAddress.value = "";
        newPostCode.value = "";
    }
}

function regExValidation(password){

    let validationRuleNumber = /[0-9]+/; // Checks for Numbersgit 
    let validationRuleLetter = /[A-z]+/;  // Checks for Letters
    let letterresult = password.match(validationRuleLetter);
    let numberresult = password.match(validationRuleNumber);

    if (letterresult === null){ // Validation 6: Passwords Must contain at least 1 letter.
        return false;

    }else if (numberresult === null){ // Validation 7: Passwords Must have at least 1 number.
        return false;

    }else
        //All Validation conditions met
        return true;
    
}

function changePassword(){
    let userObj = JSON.parse(userJSON);
    
    let oldPass = userObj.usrPasswd;
    let newPass = newPassword.value;
    let confPass = newPassConfimation.value;

    if (oldPass !== currentPassword.value) { // Validation: Must have a User Name.
        userInformationParagraph.innerHTML = "You MUST enter the correct previous password.";

    }else if (newPass === ""){ // Validation: Must have a password.
        userInformationParagraph.innerHTML = "You MUST enter a password.";

    }else if (newPass !== confPass){ // Validation: Passwords Must Match.
        userInformationParagraph.innerHTML = "The passwords do not match.";

    }else if (newPass.length < 6){  // Validation: Passwords Must have a length of at least 6 characters.
        userInformationParagraph.innerHTML = "Passwords must have more than 6 letters.";

    }else if (!(regExValidation(newPass))){
        userInformationParagraph.innerHTML = "Passwords must use both numbers and letters.";

    }else{
        implementChange("usrPasswd", newPass);
        userInformationParagraph.innerHTML = "New password set!";
        currentPassword.value = "";
        newPassword.value = "";
        newPassConfimation.value = "";
    }

}

function signOut(){
    sessionStorage.loggedInUserId = "";
    console.log("User signed out.");
    location.href = "index.php";
}

function deleteAccount(){
    let userObj = JSON.parse(userJSON);

    if(username.value !== userObj.email){
        userInformationParagraph.innerHTML = "That username was incorrect";
    }else if(password.value !== userObj.usrPasswd){
        userInformationParagraph.innerHTML = "That password was incorrect";
    }else{
        //Create request object 
        let request = new XMLHttpRequest();

        //Create event handler that specifies what should happen when server responds
        request.onload = () => {
            //Check HTTP status code
            if(request.status === 200){
                //Get data from server
                let responseData = request.responseText;

                //Add data to page
                console.log(responseData);
                alert("Your account has been removed.");
                signOut();

            }
            else
                alert("Error communicating with server: " + request.status);
        };

        //Set up request with HTTP method and URL 
        request.open("POST", "AJAX/deleteCustomerProfile.php", false);
        request.setRequestHeader("Content-type", "application/x-www-form-urlencoded");
        

        //Send request
        request.send("id=" + sessionStorage.loggedInUserId);
    }

}

//JSON Strings for loadOrderHistoryPage() function
let userOrderJSON = ""; 
let shirtJSON = "";

function loadOrderHistoryPage(){
    sideBarContent.innerHTML = "<h1>OPTIONS_</h1> \n" +
                                "<button class = 'sideBarButton' onclick = 'loadAccountSettingsPage()'> ACCOUNT_SETTINGS_ </button> \n" +
                                "<button class = 'clickedButton' disabled> ORDER_HISTORY_ </button> \n" +
                                "<button class = 'sideBarButton' onclick = 'signOut()'> SIGN_OUT_ </button> \n";
    
    pageTitle.innerHTML = 'ORDER_HISTORY_ \n';
    settingsGrid.innerHTML = "";
    
    getUserOrder();

    if (userOrderJSON === ""){
        pageContent.innerHTML += '<h3 class = "orderH3">No orders yet...</h3>'
    }else{
        let orders = JSON.parse(userOrderJSON);
        let ultimateHTMLString = "";

        

        for(let i = 0; i < orders.length; i++){
            console.log(orders.length);
            let orderHTMLString = "";
            let order = orders[i];

            orderHTMLString += '<div> \n' +
                                        '<h1 class = "orderH1">ORDER NUMBER: '+ order._id +'</h1> \n' +
                                        '<h3 class = "orderH3">DATE: '+ order.date +'</h3> \n' +
                                        '<h3 class = "orderH3">Order total: '+ order.basketToatal +'</h3> \n' +
                                        '<h3 class = "orderH3">STATUS: '+ order.status +'</h3> \n' +
                                        '<h3 class = "orderH3">TRACKING NUMBER: '+ order.trackingNumber +'</h3> \n' +
                                        '<h1 class = "orderH1">ITEMS:</h1> \n';

            for(let j = 0; i < order.items.length; i++){
                getShirtSummary(order.items[i].itemID);
                shirt = JSON.parse(shirtJSON)
                orderHTMLString += '<p>'+ order.items[i].quantity +' x '+ shirt.shirtName +', '+ shirt.colour +' | £'+ shirt.price +'</p> \n';
            }
            orderHTMLString += '</div> \n'
            ultimateHTMLString += orderHTMLString;
        }
        settingsGrid.innerHTML += ultimateHTMLString 
    }

    settingsGrid.innerHTML += '</div> \n </div>';

}

function loadAccountSettingsPage(){
   location.href = "accounts-settings.php";
}

function fillSettingsPage(){
    let userObj = JSON.parse(userJSON);
    pageTitle.innerHTML = "ACCOUNT_SETTINGS_: " + userObj.usrFName + " " + userObj.usrLName;
    currentEmailParagraph.innerHTML = "Current Email: " + userObj.email;
    currentAddressParagraph.innerHTML = "Current Address: " + userObj.address + "<br>" + "Postcode: " + userObj.postcode;
}

function getUserDetails(){

        //Create request object 
        let request = new XMLHttpRequest();

        //Create event handler that specifies what should happen when server responds
        request.onload = () => {
            //Check HTTP status code
            if(request.status === 200){
                //Get data from server
                let responseData = request.responseText;
                userJSON = responseData;
            }else
                alert("Error communicating with server: " + request.status);

        };

        //Set up request with HTTP method and URL 
        request.open("POST", "AJAX/pullCustomerProfile.php", false);
        request.setRequestHeader("Content-type", "application/x-www-form-urlencoded");
        
        //Send request
        request.send("id=" + sessionStorage.loggedInUserId);
}

function implementChange(field, value){
    //Create request object 
    let request = new XMLHttpRequest();

    //Create event handler that specifies what should happen when server responds
    request.onload = () => {
        //Check HTTP status code
        if(request.status === 200){
            //Get data from server
            let responseData = request.responseText;

            //Add data to page
            console.log(responseData);
            return responseData;
        }
        else
            alert("Error communicating with server: " + request.status);
    };

    //Set up request with HTTP method and URL 
    request.open("POST", "AJAX/implementCustomerUpdate.php", false);
    request.setRequestHeader("Content-type", "application/x-www-form-urlencoded");
    

    //Send request
    request.send("id=" + sessionStorage.loggedInUserId + "&field=" + field + "&value=" + value);
}

function getShirtSummary(id){
    //Create request object 
    let request = new XMLHttpRequest();

    //Create event handler that specifies what should happen when server responds
    request.onload = () => {
        //Check HTTP status code
        if(request.status === 200){
            //Get data from server
            let responseData = request.responseText;
            shirtJSON = responseData;
        }else
            alert("Error communicating with server: " + request.status);

    };

    //Set up request with HTTP method and URL 
    request.open("POST", "AJAX/singleProductSummary.php", false);
    request.setRequestHeader("Content-type", "application/x-www-form-urlencoded");

    //Send request
    request.send("id=" + id);
}

function getUserOrder(){
    //Create request object 
    let request = new XMLHttpRequest();

    //Create event handler that specifies what should happen when server responds
    request.onload = () => {
        //Check HTTP status code
        if(request.status === 200){
            //Get data from server
            let responseData = request.responseText;
            userOrderJSON = responseData;
            console.log(userOrderJSON)
        }else
            alert("Error communicating with server: " + request.status);

    };

    //Set up request with HTTP method and URL 
    request.open("POST", "AJAX/pullUserOrders.php", false);
    request.setRequestHeader("Content-type", "application/x-www-form-urlencoded");
    
    //Send request
    request.send("id=" + sessionStorage.loggedInUserId);
}


getUserDetails();
fillSettingsPage();