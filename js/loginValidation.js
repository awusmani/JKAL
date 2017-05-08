
window.onload = main;

function main(){

	let password = document.getElementById("password");
	let error = document.getElementById("invPass");
	let login = document.getElementById("login");
	let username = document.getElementById("username").value;
	let submit = document.getElementById("submit");

	login.onclick = function(){

		$.ajax({

		type : 'POST',
		url  : 'getAccount.php',
			success :  function(response)
			{

				if(response=="Login Success")
				{

					submit.submit();

				}
			else{

					error.innerHTML = "Invalid Login.";

				}
			}
		});

	}

}
