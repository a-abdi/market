function enabel_show_seller(id){
    $("#"+id+"")
        .removeClass("d-none");
    $("#"+id+"")
        .addClass("d-block");
}

function disable_show_seller(id){
    $("#"+id+"")
        .removeClass("d-block");
    $("#"+id+"")
        .addClass("d-none");
}