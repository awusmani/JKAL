
window.onload = main;

function main(){

	let password = document.getElementById("password");
	let error = document.getElementById("invPass");
	let login = document.getElementById("login");
	let username = document.getElementById("username").value;
	let submit = document.getElementById("submit");

	login.onclick = function(){

		let data = $("#submit").serialize();

		$.ajax({
    
		type : 'POST',
		url  : 'getAccount.php',
		data : data,
		
			success :  function(response)
			{      
				if(response==="Login Success")
				{
				 
					submit.submit();
				
				}
			else{
			 
					error.innerHTML = "Invalid Login.";
				
				}
			}
		});

	}

	document.addEventListener('keypress', function (e){
		let key = e.which || e.keyCode;
		if(key === 13){
			login.click();
		}
	});

}
