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