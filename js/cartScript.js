

function request_access($this){
    var request_data = $this.id;
    alert();
    $.post( "request_access",{ request_data: request_data},function(json) {
        
         $("#request-access").hide();
         console.log("requested access complete");
    })
}
