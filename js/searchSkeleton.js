/*
    <!--HTML Snippet-->
    <!--jquery-->
    <head>
        <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.2.1/jquery.min.js"></script>
    </head>

    <body>
        <div class="search">
            <!-- autocomplete feature? -->
            <input type="text" autocomplete="off" placeholder="Search for item...">
            <div class="result"></div>
        </div>
    </body>
*/
window.onload = search();

function search() {
    $("input[type=text].search").on("input", function() {
        let input = this.value;
        let dropdown = this.siblings(".result");
        if (input.length) {
            $.get("../searchProcessing.php" , {word:input}).done(function(data) {
                dropdown.html(data)
            });
        } else {
            dropdown.empty();
        }
    });
}
