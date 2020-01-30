
function save_good(user_id) {
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
.catch(function (error) {
    
});
}

function readURL(input) {
  if (input.files && input.files[0]) {
      var reader = new FileReader();

      reader.onload = function (e) {
          $('#blah')
            .attr('src', e.target.result);
          $("#blah")
            .addClass("d-inline");
      };
      reader.readAsDataURL(input.files[0]);
  }
}





