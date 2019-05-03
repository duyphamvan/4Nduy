@foreach($comments as $comment)
    <div class="display-comment">
        <div class="row">
            <div class="col-sm-12 mb-4">
                <div class="col-sm-2 pl-0 pr-0">
                    <figure class="rev-thumb">
                        <img src="{{asset('storage/images/about.jpg')}}" class="" alt=""
                             style="border-radius: 50%; width: 54px; height: 50px; ">

                    </figure>
                </div>
                <div class="col-sm-10 mt-3 pl-0"style="font-size: 18px;">
                    <span class="username">{{ $comment->user->name }}</span>
                    <div class="display-5" style="font-size: 10px;margin-left: -22px;margin-top: -5px;">{{ $comment->created_at->diffForHumans()}}</div>
                </div>
            </div>
        </div>
        <div class="row">
            <div class="col-sm-10">

                <div style="max-width: 100%">{{ $comment->body }}</div>
                <hr>
{{--                <form  id="another-element" method="post" action="{{ route('reply.add') }}">--}}
{{--                    @csrf--}}
{{--                    <div class="form-group">--}}
{{--                        <textarea type="text" name="comment_body" required></textarea>--}}
{{--                        <input type="hidden" name="post_id" value="{{ $post_id }}"/>--}}
{{--                        <input type="hidden" name="comment_id" value="{{ $comment->id }}"/>--}}
{{--                    </div>--}}
{{--                    <div class="form-group">--}}
{{--                        <input type="submit" class="btn btn-info" value="Reply"/>--}}
{{--                    </div>--}}
{{--                </form>--}}
{{--                <hr>--}}
{{--                @include('home.replies', ['comments' => $comment->replies])--}}

            </div>

        </div>

    </div>

@endforeach
<script>
    $("#input-id").rating();
</script>
