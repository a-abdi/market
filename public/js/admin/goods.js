function deletegoods(good_id)
{
    var result = confirm('آیا کالا مورد نظر خذف شود؟');
    if(result){
        axios.delete('/admin/goods/delete', {
            params:{ id: good_id }
            
        }).then(function(response) {
            $('#'+ good_id +'').remove();
            console.log(response.data);
        }).catch(function(error) {
            console.log(error);
        });
    }
}