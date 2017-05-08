$(document).ready(function() {
    $('.searchbox input[type="text"]').on("input", function() {
        let input = $(this).val();
        let dropdown = $(this).siblings(".result");
        if (input.length) {
            $.get("../JKAL/searchProcessing.php" , {keyword:input}).done(function(data) {
                dropdown.html(data)
            });
        } else {
            dropdown.empty();
        }
    });

    $(document).on("click", ".result p", function() {
        $(this).parents(".searchbox").find('input[type="text"]').val($(this).text());
        $(this).parent(".result").empty();
    });

    /*
        left = 37
        up = 38
        down = 39
        right = 40
        enter = 13
    */
    
    /*
    $(document).keydown(function(e) {
        console.log(e.keyCode);
        $(this).parent(".result").empty();
    });
    */
});