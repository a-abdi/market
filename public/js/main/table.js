function table(value){
    $('#entry_table').html(
    '<table class="table table-hover table-dark"> \n\
        <thead> \n\
            <tr id="table_header"> \n\
            </tr> \n\
        </thead>   \n\
        <tbody id="table_body"> \n\
        </tbody> \n\
    </table>')
}

function table_header(header) {
    var i;
    for(i = 0 ; i < header.lenght; i++){
        $('#table_header').append('<th scope="col">'+ header[i] +'</th>');
    }
}

function table_body(response,id_body) {
    var row = 1;
    response.data.forEach(function(entry) {
        $('#'+ id_body +'').append(
        '<tr id ="'+ entry['id'] +'"> \n\
            <th class="py-3 d-flex align-items-center" scope="row">'+ row++ +'</th> \n\
            <td><img src="/'+ entry['img_src'] +'" class="pointer" alt="'+ entry['name'] +'" onclick="details_image('+ entry['id'] +')" style="max-width: 5rem;" height="50rem"></td> \n\
            <td class="py-3">'+ entry['name'] +'</td> \n\
            <td class="py-3">'+ entry['price'] +'</td> \n\
            <td class="py-3">'+ entry['created_at'] +'</td> \n\
            <td class="py-3">'+ entry['id'] +'</td> \n\
            <td class="py-3">'+ entry['user_id'] +'</td> \n\
            <td><button class="btn btn-outline-danger" onclick="delete_good('+ entry['id'] +')"> حذف</button> </td> \n\
            <td><button class="btn btn-outline-info" onclick="users({{$good->user_id}})"> لینک</button> </td> \n\
        </tr>')
    });

}

