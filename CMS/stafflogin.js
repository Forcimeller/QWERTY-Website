

let staff = {};
staff.ID = "STAFF123";
staff.password = "qwerty";
localStorage[staff.ID] = JSON.stringify(staff);
let staffobj = JSON.parse(localStorage[staff.ID]); // Parsing through local storage and converting the ID variable to an object after it had been stringified


function login() { 
    
    let ID = document.getElementById("idinput").value
    let password = document.getElementById("password").value;


    //Checks users email input to see if it can find a match, this is in the case of the details not being found 
    if (ID != (staffobj.ID) && password !=  (staffobj.password)) {
       
        document.getElementById("LoginFailure").innerHTML = "ID and password not recognized";
        
        return false;
    }

    else if
       (ID != (staffobj.ID)) {
       
        document.getElementById("LoginFailure").innerHTML = "ID  not recognized";
        
        return false; 
    }

    else if
       (password != (staffobj.password)) {
       
        document.getElementById("LoginFailure").innerHTML = "Password  not recognized";
        
        return false; 
    }

//Storing staff data in local storage



if (password === staffobj.password) {//Successful login

    window.location.href = "navigation.html";

   
    sessionStorage.loggedinID = staffobj.ID;
    
}




  

}
console.log(staffobj.password);


function validatelogin(){ //Variables for the password and password are declaired, if statements check whether or not the  if statement is true, if so the error is printed.




    var x = document.forms["myform"]["idinput"].value;
    var y = document.forms["myform"]["password"].value;


    if (x == "" &&  y == "") {

        document.getElementById("LoginFailure").innerHTML = "ID and password must be filled out";
       return false;
    }

    else if (x == "") {
        document.getElementById("LoginFailure").innerHTML = "ID must be filled out";
        return false;
    }

    

   else if (y == "") {
        document.getElementById("LoginFailure").innerHTML = "Password must be filled out";
        return false;

    }

   

    




}
