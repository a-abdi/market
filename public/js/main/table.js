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
        $('#'+ id_body +'').append('<tr id ="'+ entry['id'] +'"> \n\
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

}

