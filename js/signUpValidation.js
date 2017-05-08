
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
			error.innerHTML += "Error: Passwords dont match";
		}

		var data = $("#submit").serialize();

		$.ajax({

		type : 'POST',
		url  : 'getUsername.php',
		data : data,
			success :  function(response)
			{
				if(response=="New User")
				{

					submit.submit();

				}
			else{

					error.innerHTML += "Error: Username Taken";

				}
			}
		});
	}

	document.addEventListener('keypress', function (e){
		let key = e.which || e.keyCode;
		if(key === 13){
			signUp.click();
		}
	});
}
