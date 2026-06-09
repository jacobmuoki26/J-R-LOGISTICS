function showSignup(){

    document
    .getElementById("loginForm")
    .classList.add("hidden");

    document
    .getElementById("signupForm")
    .classList.remove("hidden");
}
function showOTP(){

document
.getElementById(
"OTP"
)
.classList.remove(
"hidden"
);

}
function showLogin(){

    document
    .getElementById("signupForm")
    .classList.add("hidden");

    document
    .getElementById("loginForm")
    .classList.remove("hidden");
}

function togglePassword(inputId, button){

const input =
document.getElementById(inputId);

console.log(input);

if(input.type=="password"){

input.type="text";

button.innerHTML="Hide";

}

else{

input.type="password";

button.innerHTML="Show";

}

}
