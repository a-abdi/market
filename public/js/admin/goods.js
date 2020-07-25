$( document ).ready(function() {
    $("#input_search").on("change paste keyup", function() {
        $('#alert').hide()
        if(!$(this).val()){
            axios.get('/admin/goods/js')
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


function delete_good(good_id)
{
    var result = confirm('آیا کالا مورد نظر خذف شود؟');
    if(result){
        axios.delete('/admin/goods/delete', {
            params:{ id: good_id }
            
        }).then(function(response) {
            $('#'+ good_id ).remove();
            
        }).catch(function(error) {
            
        });
    }
}

function details_goods(goods_id)
{
    window.location.href = "/goods/"+ goods_id;
}

function users(user_id) {
    window.location.href = "/admin/users/"+ user_id;
}