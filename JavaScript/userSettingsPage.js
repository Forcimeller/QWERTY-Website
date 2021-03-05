let userObj = undefined;

//Sets all of the relevant pageDetails
const pageContent = document.getElementById("content");
const sideBarContent = document.getElementById("sideBar");
const pageTitle = document.getElementById("pageTitle");
const currentEmailParagraph = document.getElementById("currentEmail");
const currentPhoneParagraph = document.getElementById("currentPhone");
const currentAdressParagraph = document.getElementById("currentAdd");
const newEmail = document.getElementById("newEmail");
const newPhoneNumber = document.getElementById("newPhone");
const newAddress = document.getElementById("newAdd");
const newPostCode = document.getElementById("newPost");
const currentPassword = document.getElementById("currPass");
const newx = document.getElementById("newPass");
const newPassConfimation = document.getElementById("confNewPass");
const username = document.getElementById("usrName");
const password = document.getElementById("password");

getUserDetails();
fillSettingsPage();

function changeEmail(){}

function changePhone(){}

function changePassword(){}

function changeAddress(){}

function deleteAccount(){}

function signOut(){}

function loadOrderHistoryPage(){}

function fillSettingsPage(){}

function getUserDetails(){
        //Create request object 
        let request = new XMLHttpRequest();

        //Create event handler that specifies what should happen when server responds
        request.onload = () => {
            //Check HTTP status code
            if(request.status === 200){
                //Get data from server
                let responseData = request.responseText;


                if(responseData !== ""){
                    userObj = JSON.parse(responseData);

                }else{
                    console.log("Error: user not found.")
                }
    
            }
            else
                alert("Error communicating with server: " + request.status);
        };
    
        //Set up request with HTTP method and URL 
        request.open("POST", "AJAX/checkUserExistence.php");
        request.setRequestHeader("Content-type", "application/x-www-form-urlencoded");
        
    
        //Send request
        request.send("id=" + sessionStorage.loggedInUserId);
}
