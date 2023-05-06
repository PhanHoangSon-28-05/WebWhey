$(document).ready(function(){
    var bs_boxCount = $(".bs_box").length;
    console.log(bs_boxCount);
    var bs_boxToShow = 6;
    var bs_boxIncrement = 4;

    $(".bs_box").slice(0, bs_boxToShow).show();
    $("#loadMore").on("click", function(e){
        e.preventDefault();
        bs_boxToShow = bs_boxToShow + bs_boxIncrement;
        $(".bs_box:hidden").slice(0, bs_boxIncrement).slideDown();
        if(bs_boxToShow >= bs_boxCount) {
            $("#loadMore").text("Không còn phần tử").addClass("nobs_box");
        }
    });
});