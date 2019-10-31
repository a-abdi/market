function save_good() {
    var name = $('#name').val();
    var price = $('#price').val();

    alert("Page is loaded");

    axios.post('/profile', {
        name: name,
        price: price
      })
      .then(function (response) {
        console.log(response);
      })
      .catch(function (error) {
        console.log(error);
      });
    
}