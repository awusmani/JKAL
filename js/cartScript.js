

function request_access($this){
    let request_data = $this.id;
    
    let dataString = 'lang=' + request_data;


    $.ajax({

    	type: "POST",
    	url: "AddToCart.php",
    	data: dataString,
    	cache: false,
    	success: function(response){

    		location.reload();
    	}

    });

    return false;
    
}



