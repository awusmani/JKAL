

function request_access($this){
    var request_data = $this.id;
    alert();
    $.post( "request_access",{ request_data: request_data},function(json) {
        
         $("#request-access").hide();
         console.log("requested access complete");
    })
}

function runAjax(){

	return

	$.ajax({

		type : 'POST',
		url  : 'AddToCart.php',
		data : data,
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

