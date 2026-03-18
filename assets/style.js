function log(event){
    console.log("Button clicked");
    
    let username = document.getElementById("username").value;
    let password = document.getElementById("password").value;
if(!username){
    document.getElementById("username-error").innerHTML = "Please enter username";
    return false;
}
if(!password){
    document.getElementById("password-error").innerHTML = "Please enter password";
    return false;
}
}

