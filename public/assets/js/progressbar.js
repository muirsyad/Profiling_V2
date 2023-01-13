$(document).ready(function() {
    console.log("test1");
    fetchcomments();

    function fetchcomments()
    {
        console.log("test");
        $.ajax({
            type: "GET",
            url: "/fetch-comments",
            dataType: "json",
            sucess: function(response){
                console.log(response);
            }
        })
    }
});
