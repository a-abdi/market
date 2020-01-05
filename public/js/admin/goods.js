$( document ).ready(function() {
    $("#input_search").on("change paste keyup", function() {
        if(!$(this).val()){
            axios.get('/admin/goods', {
                params: {
                  axios: true
                }
            })
            .then(function (response) {
                $('#table_body').html('');
                table_body(response,'table_body');
            })
            .catch(function (error) {
            console.log(error);
            })
            .finally(function () {
            // always executed
            });  
        }
     });
});


function deletegood(good_id)
{
    var result = confirm('آیا کالا مورد نظر خذف شود؟');
    if(result){
        axios.delete('/admin/goods/delete', {
            params:{ id: good_id }
            
        }).then(function(response) {
            $('#'+ good_id +'').remove();
            
        }).catch(function(error) {
            
        });
    }
}

function details_image(id)
{
    window.location.href = "/image/"+ id +"";
}

function users(id) {
    window.location.href = "/admin/users/"+id+"";
}