@foreach($comments as $comment)
    <div class="display-comment" id="comment-{{$comment->id}}">
        <div class="thumbnail-image" style="width: 12%; float: left;">
            <figure class="rev-thumb">
                <img src="{{asset('storage/'.$comment->user->image)}}" class="" alt=""
                     style="border-radius: 50%; width: 54px; height: 50px; ">

            </figure>
        </div>
        <div class="username-date-now" style="font-size: 18px;width: 88%">
            <span class="username">{{ $comment->user->name }}</span>
            <div class="display-5" style="font-size: 10px;">{{ $comment->created_at->diffForHumans()}}</div>
        </div>
        <div class="row">
            <div class="col-sm-10 pl-0">

                <div style="max-width: 100%; font-size: 14px">{{ $comment->body }}</div>
                <hr>
                <div id="comment-box-{{$comment->id}}" class="comment-box">
                    <button type="button" class="btn btn-secondary comment-button"
                            onclick="showCommentBox({{$comment->id}})"><i class="far fa-comment-alt"></i> Reply
                    </button>
                    <form id="comment-form-{{$comment->id}}" method="post" action="{{ route('reply.add') }}">
                        @csrf
                        <div class="form-group">
                            <textarea type="text" name="comment_body" required></textarea>
                            <input type="hidden" name="post_id" value="{{ $post_id }}"/>
                            <input type="hidden" name="comment_id" value="{{ $comment->id }}"/>
                        </div>
                        <div class="form-group">
                            @if(auth()->check())
                                <input type="submit" class="btn btn-info" value="Reply"/>
                            @else
                                <input onclick="return confirm('You need to be logged in to perform this operation')" type="submit" class="btn btn-info" value="Reply"/>
                            @endif
                            {{--                            onclick="sendReply({{$post_id}}, {{$comment->id}})"--}}
                        </div>
                    </form>
                    <hr>
                </div>
            </div>
        </div>
        @include('home.replies', ['comments' => $comment->replies])
    </div>

@endforeach
<script>
    $("#input-id").rating();

    function showCommentBox(id) {
        hideCommentBoxes();

        $('#comment-box-' + id + ' form').show();
        $('#comment-box-' + id + ' .comment-button').hide();
    }

    function hideCommentBoxes() {
        $('.comment-box form').hide();
        $('.comment-box .comment-button').show();
    }

    // function sendReply(postId, commentId) {
    //     let content = $('#comment-form-' + commentId + ' textarea').val();
    //     let token = $('#comment-form-' + commentId + ' input[name=_token]').val();
    //     $.post('/reply/store', {
    //         comment_body: content,
    //         comment_id: commentId,
    //         post_id: postId,
    //         _token: token
    //     })
    //         .done(function (data) {
    //             $('#comment-' + data.comment_id).append(
    //                 `<div class="display-comment">
    //                 <div class="thumbnail-image" style="width: 12%; float: left;">
    //                     <figure class="rev-thumb">
    //                         <img src="https://laraveldaily.com/wp-content/uploads/2018/12/online-courses.png" class="" alt=""style="border-radius: 50%; width: 54px; height: 50px; ">
    //                     </figure>
    //                 </div>
    //                 <div class="username-date-now" style="font-size: 18px;width: 88%">
    //                     <span class="username">${data.reply.user.name}</span>
    //                     <div class="display-5" style="font-size: 10px;"></div>
    //                 </div>
    //
    //                 <div class="row">
    //                     <div class="col-sm-10 pl-0">
    //                         <div style="max-width: 100%; font-size: 14px">${data.reply.body}</div>
    //                         <hr>
    //                     </div>
    //             </div>`
    //             );
    //             hideCommentBoxes();
    //         })
    //         .fail(function () {
    //             alert("You need to be logged in to perform this operation");
    //         });
    // }

</script>
<style>
    .comment-box form {
        display: none;
    }
</style>
