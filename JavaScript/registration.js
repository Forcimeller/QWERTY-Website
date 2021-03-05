function register(email, fName, lName, usrAddress, postCode, usrPassword){
    //Create request object 
    let request = new XMLHttpRequest();

    //Create event handler that specifies what should happen when server responds
    request.onload = () => {
        //Check HTTP status code
        if(request.status === 200){
            //Get data from server
            let responseData = request.responseText;

            //Add data to page
            document.getElementById("usrMsg").innerHTML = responseData;
        }
        else
            alert("Error communicating with server: " + request.status);
    };

    //Set up request with HTTP method and URL 
    request.open("POST", "AJAX/addCustomer.php");
    request.setRequestHeader("Content-type", "application/x-www-form-urlencoded");
    

    //Send request
    request.send("email=" + email + "&fName=" + fName + "&address=" + usrAddress + "&lName=" + lName + "&postCode=" + postCode + "&password=" + usrPassword);
}

function getID(email, usrPassword){
        //Create request object 
        let request = new XMLHttpRequest();

        //Create event handler that specifies what should happen when server responds
        request.onload = () => {
            //Check HTTP status code
            if(request.status === 200){
                //Get data from server
                let responseData = request.responseText;

                //Add data to page
                sessionStorage.loggedInUserId = responseData;
            }
            else
                alert("Error communicating with server: " + request.status);
        };
    
        //Set up request with HTTP method and URL 
        request.open("POST", "AJAX/pullCustomerId.php");
        request.setRequestHeader("Content-type", "application/x-www-form-urlencoded");
        
    
        //Send request
        request.send("email=" + email + "&password=" + usrPassword);
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

function registerNew(){ 
    
    //Extract registration data
    let email = document.getElementById("newUsrName").value;
    let fName = document.getElementById("fName").value;
    let lName = document.getElementById("lName").value;
    let usrAddress = document.getElementById("address").value;
    let postCode = document.getElementById("postCode").value;
    let usrPassword = document.getElementById("newPassword").value;   
    let confPassword = document.getElementById("confPassword").value;

    if (email === "") { // Validation 1: Must have a User Name.
        document.getElementById("usrMsg").innerHTML = "You MUST enter an email address.";

    }else if (newPassword === ""){ // Validation 3: Must have a password.
        document.getElementById("usrMsg").innerHTML = "You MUST enter a password.";

    }else if (confPassword !== usrPassword){ // Validation 4: Passwords Must Match.
        document.getElementById("usrMsg").innerHTML = "The passwords do not match.";

    }else if (usrPassword.length < 6){  // Validation 5: Passwords Must have a length of at least 6 characters.
        document.getElementById("usrMsg").innerHTML = "Passwords must have more than 6 letters.";

    }else if (!(regExValidation(usrPassword))){
        document.getElementById("usrMsg").innerHTML = "Passwords must use both numbers and letters.";

    }else{
        document.getElementById("usrMsg").innerHTML = "";
        register(email, fName, lName, usrAddress, postCode, usrPassword);
        getID(email, usrPassword);
    }

}