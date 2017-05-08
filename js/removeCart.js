

function request_access2($this){
    let request_data = $this.id;

    let dataString = 'lang=' + request_data;


    $.ajax({

    	type: "POST",
    	url: "RemoveFromCart.php",
    	data: dataString,
    	cache: false,
    	success: function(response){
    		location.reload();
    	}

    });

    return false;
    
}



