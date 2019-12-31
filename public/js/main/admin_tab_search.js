
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

function good_search(input_id)
{
    var value = document.getElementById(input_id).value;
    switch (type) 
    {
        case 'name':
            search(value,type);
            break;
        case 'price':
            search(value,type);
            break;
        case 'created_at':
            search(value,type);
            break;
        case 'id':
            search(value,type);
            break;
        case 'user_id':
            search(value,type);
    }
}

function search(value,type)
{
    axios.get('/admin/goods/search', {
        params: {
          value: value,
          type: type
        }
      })
        .then(function (response) {
            var row = 1;
            $('#table_body').html('');
                response.data.forEach(function(entry) {
                    $('#table_body').append('<tr id ="'+ entry['id'] +'"> \n\
                        <th scope="row">'+ row++ +'</th> \n\
                        <td><img src="/'+ entry['img_src'] +'" class="pointer" alt="'+ entry['name'] +'" onclick="details_image('+ entry['id'] +')" style="max-width: 5rem;" height="50rem"></td> \n\
                        <td>'+ entry['name'] +'</td> \n\
                        <td>'+ entry['price'] +'</td> \n\
                        <td>'+ entry['created_at'] +'</td> \n\
                        <td>'+ entry['id'] +'</td> \n\
                        <td>'+ entry['user_id'] +'</td> \n\
                        <td><button class="btn btn-outline-danger" onclick="deletegood('+ entry['id'] +')"> حذف</button> </td> \n\
                    </tr>')
            });
      })
      .catch(function (error) {
        console.log(error);
      })
      .finally(function () {
        // always executed
      });  
}