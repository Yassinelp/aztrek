$(document).ready(function(){
    $(".slider").slippry({
        captions:false,
        transition:'horizontal',
        speed:2000,
    })
});

$(document).ready(function(){
    $("#nav-toogle").sidr ({
        name:"respNav",
        source:".main-nav",
        displace: false,
    })
})

$(document).on("click", function (){
    $.sidr('close','respNav');
})