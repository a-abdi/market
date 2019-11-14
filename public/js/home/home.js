
$( document ).ready(function() {
    axios.get('/goods')
    .then(function (response) {
        if(response.data.error) {

        } else {
            show(response,"main");    
        }
    })
    .catch(function (error) {
        
    });
});
function info_image(id) {
   
    
    // $(location).attr('href','login');
    window.location.href = "infoimage/?id="+id+"";
}
 
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