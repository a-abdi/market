function onmouseover_display_block(id){
    $("#"+ id)
        .removeClass("d-none");
    $("#"+ id)
        .addClass("d-block");
}

function onmouseover_display_none(id){
    $("#"+ id)
        .removeClass("d-block");
    $("#"+ id)
        .addClass("d-none");
}