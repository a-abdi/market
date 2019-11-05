
function save_good() {
  var name = $('#name').val();
  var price = $('#price').val();
  var imagefile = $('#file');

  var formData = new FormData();

  formData.append("image", imagefile[0].files[0]);
  formData.append("name", name);
  formData.append("price", price);
  axios.post('/profile', formData, {
    headers: {
      'Content-Type': 'multipart/form-data'
    }
  });
}