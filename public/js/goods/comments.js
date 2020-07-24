$(document).ready(function(x) {
  alert(x);
    comments_view(x)
})



function open_comments_view(create_comment, post_id){
    if(!$('#create_comment_view').length)
    {
    $("#"+ create_comment).append(
        '<div class="form-group mx-2" id= "create_comment_view"> \n\
            <textarea class="form-control  d-rtl text-right" autofocus="autofocus" cols="10" rows="4" id="comment_body"></textarea> \n\
            <button class="btn btn-primary mt-2" onclick="send_comment(comment_body,'+ post_id +')"> ثبت دیدگاه</button> \n\
        </div>');
    }
    else
    {
        $("#create_comment_view").remove();
    }
}

function send_comment(comment_body, post_id) {
    var message = $(comment_body).val();
    $(comment_body).val(" ");
    axios.post('/posts/'+ post_id +'/comments/create', {
        parent_id: " ",
        comment_body: message
      })
      .then(function (response) {
        response.data.comment.body
        $('#new_comments_view').append(
          '<div class="card  d-rtl text-right"> \n\
            <div class="card-body"> \n\
              <div class="card-title"> \n\
              <img src="https://img.icons8.com/fluent/48/000000/user-male-circle.png" class="rounded-circle z-depth-0" alt="avatar image" width="40" height="40"> \n\
                <small class="s-f">\n\
                  '+ response.data.comment.first_name +' '+ response.data.comment.last_name +' \n\
                  <br> \n\
                  '+ response.data.comment.created_at +' \n\
                </small> \n\
              </div> \n\
              <p class="card-text">'+ response.data.comment.body +'</p> \n\
            </div> \n\
          </div>');
      })
      .catch(function (error) {
        console.log(error);
      });
}


function comments_view(comments) {
  $('#new_comments_view').append(
  '<div id="{{$comment->id}}"> \n\
    <div class="card my-2"> \n\
        <div class="card-body py-1"> \n\
            <div class="card-title"> \n\
                <div class="d-flex bd-highlight mb-0"> \n\
                    <div class="mr-auto p-2 bd-highlight"> \n\
                        <button type="btn" class="btn btn-light btn-sm s-f" onclick="open_comments_view(create_comment, {{$goods->post_id}})">پاسخ</button> \n\
                    </div> \n\
                <div class="p-2 bd-highlight s-f d-flex align-items-center"> \n\
                        {{$comment->first_name}} {{$comment->last_name}} \n\
                </div> \n\
                    <div class="p-2 bd-highlight"> \n\
                        <img src="https://img.icons8.com/fluent/48/000000/user-male-circle.png" class="rounded-circle z-depth-0" alt="avatar image" width="40" height="40"> \n\
                    </div> \n\
                </div> \n\
                <div class="px-2 text-right d-rtl bd-highlight s-f mb-3"> \n\
                    @duration($comment->created_at) \n\
                </div> \n\
            </div> \n\
            <p class="card-text text-right d-rtl">{{$comment->body}}</p> \n\
        </div> \n\
    </div> \n\
</div>');
  }
