<div id="{{$comment->id}}">
    <div class="card my-2">
        <div class="card-body py-1">
            <div class="card-title">
                <div class="d-flex bd-highlight mb-0">
                    <div class="mr-auto p-2 bd-highlight">
                        <button type="btn" class="btn btn-light btn-sm s-f">پاسخ</button>
                    </div>
                <div class="p-2 bd-highlight s-f d-flex align-items-center">
                        {{$comment->first_name}} {{$comment->last_name}}
                </div>
                    <div class="p-2 bd-highlight">
                        <img src="https://img.icons8.com/fluent/48/000000/user-male-circle.png" class="rounded-circle z-depth-0" alt="avatar image" width="40" height="40">
                    </div>
                </div>
                <div class="px-2 text-right d-rtl bd-highlight s-f mb-3">
                    @duration($comment->created_at) 
                </div>
            </div>
            <p class="card-text text-right d-rtl">{{$comment->body}}</p>
        </div>
    </div>
</div>