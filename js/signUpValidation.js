
window.onload = main;

function main(){

	let password = document.getElementById("password");
	let confpass = document.getElementById("confirmPassword");
	let error = document.getElementById("invPass");
	let signUp = document.getElementById("signUp");
	let submit = document.getElementById("submit");
	let username = document.getElementById("username").value;
	let errorUser = document.getElementById("invUser");
	

	signUp.onclick = function(){

		let sub = false;

		if(password.value !== confpass.value){

			error.innerHTML = "Error: password doesnt match";

		}
		else{
			error.innerHTML = "";
			sub = true;
		}

		let data = $("#submit").serialize();

		$.ajax({

		type : 'POST',
		url  : 'getUsername.php',
		data : data,

			success :  function(response)
			{
				if(response=="New User")
				{
					errorUser.innerHTML = "";

					if(sub)
					{
						submit.submit();
					}
				}
			else{
					errorUser.innerHTML = "</br>Error: username taken";
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
