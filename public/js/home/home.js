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
function get_image_info(id) {
    // $(location).attr('href','login');
    window.location.href = "/image/"+ id +"";
    //param
    //  /search/user_id/1/good_id/4
    //string
    //  /search/?user_id=1&good_id=4
}
 
