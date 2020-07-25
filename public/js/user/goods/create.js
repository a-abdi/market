
function create_goods(user_id) {
    var name = $('#name').val();
    var price = $('#price').val();
    var imagefile = $('#file');

    var formData = new FormData();

    formData.append("image", imagefile[0].files[0]);
    formData.append("name", name);
    formData.append("price", price);
    axios.post('/users/'+ user_id +'/goods/create', formData, {
      headers: {
        'Content-Type': 'multipart/form-data'
      }
    }).then(function (response) {
        if(response.data.error) {
          $("#msg").html(
            '<div class="alert text-center alert-danger" width="200px"> \n\
              '+ response.data.error +' \n\
            </div>'
          );
        } else {
            $("#msg").html(
              '<div class="alert text-center alert-success" width="200px"> \n\
                  کالا با موفقبت ثبت شد \n\
              </div>'
            );
          
          $("#name").val("");  
          $("#price").val("");
          $("#file").val("");
        }
      })
    .catch(function (e) {
    if(e.response.status == 422){
      validationErrors = e.response.data.errors;
      if(validationErrors.name){
          error = validationErrors.name[0];
      }else if(validationErrors.price) {
          error = validationErrors.price[0];
      }else{
        error = validationErrors.image[0];
      }

      $("#msg").html(
        '<div class="alert text-center alert-danger d-rtl" width="200px"> \n\
          '+ error +' \n\
        </div>'
      ) 
    }
    
  });
}





