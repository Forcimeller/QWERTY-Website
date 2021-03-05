function checkUser(email, usrPassword){
    //Create request object 
    let request = new XMLHttpRequest();

    //Create event handler that specifies what should happen when server responds
    request.onload = () => {
        //Check HTTP status code
        if(request.status === 200){
            //Get data from server
            let responseData = request.responseText;

            if(responseData === "Login sucessful"){
                document.getElementById("usrMsg").innerHTML = responseData;
                getID(email, usrPassword);
            }else{
                document.getElementById("usrMsg").innerHTML = responseData;
            }

        }
        else
            alert("Error communicating with server: " + request.status);
    };

    //Set up request with HTTP method and URL 
    request.open("POST", "AJAX/checkUserExistence.php");
    request.setRequestHeader("Content-type", "application/x-www-form-urlencoded");
    

    //Send request
    request.send("email=" + email + "&password=" + usrPassword);
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

            //Add data to session storage
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

function login(){ 
    //Extract registration data
    let email = document.getElementById("usrName").value;
    let usrPassword = document.getElementById("usrPassword").value;   

    if (email === "") { // Validation: Must have a User Name.
        document.getElementById("usrMsg").innerHTML = "You MUST enter an email address.";

    }else if (usrPassword === ""){ // Validation: Must have a password.
        document.getElementById("usrMsg").innerHTML = "You MUST enter a password.";

    }else{
        document.getElementById("usrMsg").innerHTML = "";
        checkUser(email, usrPassword);
    }

}