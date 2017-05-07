
window.onload = main;

function main(){

	let password = document.getElementById("password");
	let confpass = document.getElementById("confirmPassword");
	let error = document.getElementById("invPass");
	let signUp = document.getElementById("signUp");
	let submit = document.getElementById("submit");
	let username = document.getElementById("username").value;

	signUp.onclick = function(){
		if(password.value !== confpass.value){
			error.innerHTML = "Error: Passwords dont match";
		}
		else{
			submit.submit();
		}
	}
}
