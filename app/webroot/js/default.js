$(".img-responsive img").each(function () {
    $(this).removeAttr("style");
    $(this).removeAttr("class");
    $(this).addClass("img-responsive")
});
$(document).ready(function(){
    $("#description").click(function(){
        $(".content_des").toggle();
    });
});