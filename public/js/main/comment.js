
function open_goods_comments_view(create_comment_id, comment_body_id, goods_id, parent_id) {
    if(!$('#create_comment_view').length) {
      if(typeof(create_comment_id) == 'object') {
      create_comment_id = $(create_comment_id).attr('id')
      }
      $("#"+ create_comment_id).append(
         '<div class="form-group mt-4 mr-4" id= "create_comment_view"> \n\
              <textarea class="form-control  d-rtl text-right" autofocus="autofocus" cols="10" rows="6" id="comment_body_id"></textarea> \n\
              <button class="btn btn-primary mt-2" onclick="send_goods_comment('+ comment_body_id +','+ goods_id +','+ parent_id +')"> ثبت دیدگاه</button> \n\
          </div>');
    }
    else {
        $("#create_comment_view").remove();
    }
}

function send_goods_comment(comment_body_id, goods_id, parent_id) {
    var message = $(comment_body_id).val();
    $(comment_body_id).val(" ");
    axios.post('/goods/'+ goods_id +'/comment/create', {
        parent_id: parent_id,
        comment_body: message
      })
      .then(function (response) {
        if(comment.parent_id) {
          comment_view('comment_child'+ comment.parent_id, response.data.comment)
        }
        else{
          comment_view('new_comments_view_id', response.data.comment)
        }
      })
      .catch(function (error) {
        console.log(error);
      });
}

// display all comments
function comments_view(comments) {
  $.each(comments, function(key, comment) {
      $('#comments_view_id').append(
      '<div id = comment_'+ comment.id +'> \n\
      </div>');
      if(comment.parent_id) {
        comment_view('comment_child'+ comment.parent_id, comment)
      }
      else{
        comment_view('comment_'+ comment.id, comment)
      }
  });
}

// display only one comments
function comment_view(comment_view_id, comment) {
   $("#"+ comment_view_id).append(
    '<div class="my-4 mr-4" id=comment_child'+ comment.id+'>\n\
      <div id = open_reply_view'+ comment.id+'> \n\
        <div class="card"> \n\
          <div class="card-body py-1"> \n\
            <div class="card-title"> \n\
                <div class="d-flex bd-highlight mb-0"> \n\
                    <div class="mr-auto p-2 bd-highlight"> \n\
                        <button type="btn" class="btn btn-light btn-sm s-f" id=btn_'+ comment.id +'>پاسخ</button> \n\
                    </div> \n\
                <div class="p-2 bd-highlight s-f d-flex align-items-center"> \n\
                        '+ comment.first_name +' '+ comment.last_name +' \n\
                </div> \n\
                    <div class="p-2 bd-highlight"> \n\
                        <img src="https://img.icons8.com/fluent/48/000000/user-male-circle.png" class="rounded-circle z-depth-0" alt="avatar image" width="40" height="40"> \n\
                    </div> \n\
                </div> \n\
                <div class="px-2 text-right d-rtl bd-highlight s-f mb-3"> \n\
                  '+ comment.created_at +'\n\
                </div> \n\
            </div> \n\
            <div class="p-3"> \n\
              <p class="card-text text-right d-rtl">'+ comment.body +'</p> \n\
            </div> \n\
          </div> \n\
        </div> \n\
      </div> \n\
    </div>')
    $("#btn_"+ comment.id).click(function(){
      open_goods_comments_view('open_reply_view'+ comment.id, 'comment_body_id', comment.goods_id, comment.id);
    });
    
}
