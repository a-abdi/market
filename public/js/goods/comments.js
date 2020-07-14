function comments_view(new_comments, post_id){
    if(!$('#show_comments').length)
    {
    $("#"+ new_comments).append(
        '<div class="form-group mx-2" id= "show_comments"> \n\
            <textarea class="form-control  d-rtl text-right" autofocus="autofocus" cols="10" rows="4" id="comment_body"></textarea> \n\
            <button class="btn btn-primary mt-2" onclick="send_comment(comment_body,'+ post_id +')"> ثبت دیدگاه</button> \n\
        </div>');
    }
    else
    {
        $("#show_comments").remove();
    }
}

function send_comment(comment_id, post_id) {
    var message = $(comment_id).val();
    $(comment_id).val(" ");
    axios.post('/posts/'+ post_id +'/comments/create', {
        parent_id: " ",
        comment_body: message
      })
      .then(function (response) {
        $('#primary_card').append(
          '<div class="d-rtl text-right container mb-2"> \n\
            <div class="row"> \n\
              <div class="col"> \n\
                '+ message +' \n\
              </div> \n\
            </div> \n\
          </div>');
      })
      .catch(function (error) {
        console.log(error);
      });

}