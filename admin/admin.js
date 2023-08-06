// Admin Login Validations

function validateForm(){
    var userName = document.getElementById("username").value;
    var password = document.getElementById("password").value;

    //Perform Number & Password Validation
    if(userName === "" || password === ""){
        alert("Mobile Number and Password field is empty."); // Empty Field
        return false;
    }
    const user = /^[a-zA-Z]+$/;
    if(!user.test(userName)){
        alert("Username should only contain letters.") // Only Letters
        return false;
    }

    return true;

}