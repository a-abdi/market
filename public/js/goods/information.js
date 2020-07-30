
$(document).ready(function() {
   
    var goods_id = get_cookie('goods_id');
    axios.get('/goods/'+ goods_id +'/comments', {
        params: {
        //   ID: 12345
        }
      })
      .then(function (response) {
        comments_view(response.data.comments);
      })
      .catch(function (error) {
        console.log(error);
      })
      .finally(function () {
        // always executed
      });
})
