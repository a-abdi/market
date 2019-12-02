function exit(){
    alert("Hello! I am an alert box!!");
}

function enabel_shadow(elment)
{
    
    $("#"+ elment.id +"")
        .addClass("shadow-sm text-primary");
}

function disable_shadow(elment)
{
    $("#"+ elment.id +"")
        .removeClass("shadow-sm text-primary");
    
}