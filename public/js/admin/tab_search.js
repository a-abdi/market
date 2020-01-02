
var type = 'name';

function search_name(id_input,id_type_search)
{
    $("#"+id_type_search+"").text('بر اساس نام کالا');
    $("#"+id_input+"").attr("placeholder","نام کالا را وارد کنید");
    type = 'name';
}

function search_price(id_input,id_type_search)
{
    $("#"+id_type_search+"").text('بر اساس قیمت کالا');
    $("#"+id_input+"").attr("placeholder","قیمت کالا را وارد کنید");
    type = 'price';
}

function search_created_at(id_input,id_type_search)
{
    $("#"+id_type_search+"").text('بر اساس تاریخ ارسال کالا');
    $("#"+id_input+"").attr("placeholder","تاریخ ارسال کالا را وارد کنید");
    type = 'created_at';
}

function search_id(id_input,id_type_search)
{
    $("#"+id_type_search+"").text('کالا id بر اساس');
    $("#"+id_input+"").attr("placeholder","id کالا را وارد کنید");
    type = 'id';
}

function search_user_id(id_input,id_type_search)
{
    $("#"+id_type_search+"").text('کالا user_id بر اساس');
    $("#"+id_input+"").attr("placeholder","user_id کالا را وارد کنید");
    type = 'user_id';
}


function good_search(input_id,id_table_body)
{
    var value = document.getElementById(input_id).value;
    axios.get('/admin/goods/search', {
        params: {
          value: value,
          type: type
        }
      })
        .then(function (response) {
          
            $('#table_body').html('');
            table_body(response,id_table_body);
               
      })
      .catch(function (error) {
        console.log(error);
      })
      .finally(function () {
        // always executed
      });  
}