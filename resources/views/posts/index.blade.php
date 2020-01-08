@extends('layouts.master')

@section('title')
    Posts of {{ $event->title }}
@endsection

@section('css')
    <link rel="stylesheet" href="{{ URL::asset('css/eventdetail.css') }}">

@endsection

@section('content')

<div class="container eventcard">
    <div class="row">
        <div class="col-3">

        </div>
        <div class="col-6 eventcard">
            <div class="row">
                <div class="card">
                  <div class="card-header">
                    <b>Create Post </b>
                  </div>
                  <div class="card-body">
                      <form action="/events/{{ $event->id }}/posts" method="post" enctype="multipart/form-data">
                          @csrf
                          <input type="hidden" name="event_id" value="{{ $event->id }}">
                          <div class="form-group">
                              <textarea name="description" rows="4" cols="53" class="form-control"
                               placeholder="Talk about this Event"></textarea>
                          </div>

                          <div class="custom-file">
                            <input type="file" class="custom-file-input" name="img_path"  id="customFile">
                            <label class="custom-file-label" for="customFile">Choose file</label>
                          </div>
                          <button style="bottom: 5px; right:5px; position: absolute;" type="submit" class="btn btn-primary">Post</button>
                      </form>

                    <br><br>
                  </div>
                </div>
            </div>

                    @foreach($posts as $post)
                        <div class="row">

                            <div class="col-1">
                                <img src="{{ App\Profile::find($post->user_id)->profileImage() }}"  width="50px" height="50px" style=" margin-top: 10px; margin-left: 10px; border-width: 1px; border-color: gray; border-style: solid; border-radius : 200px" alt="">
                            </div>
                            <div class="col-10 ml-4 mt-4">
                                <a href="#" style="text-decoration: none; color: black;">
                                    <b>{{ App\User::find($post->user_id)->name }}</b>
                                </a>
                            </div>
                        </div>
                        <div class="row mt-3 ml-2">
                            {{ $post->description }}
                        </div>
                        <div class="row mt-3 ml-2">
                            <img src="{{ App\Post::find($post->id)->postImage() }}" width="95%" alt="">
                        </div>

                        <span id="like">
                             {{ $likecounts[$post->id] }} Likes
                        </span> <br>
                        @if($likechecks[$post->id])
                            <button id="btnLike">Unlike</button>
                        @endif
                        @if(!$likechecks[$post->id])
                            <button id="btnLike">Like</button>
                        @endif

                        <br>
                        <input type="text" name="comment" id="comment" placeholder="Add Comment" value="">
                        <button id="btnComment">Comment</button>
                        <div id="comments">
                            @foreach($comments[$post->id] as $comment)
                                <li> {{ $comment->description }} </li>
                            @endforeach
                        </div>
                    @endforeach
                    {{ $posts->links() }}


        </div>
        <div class="col-3">

        </div>
    </div>

</div>

    <script>

        $(document).ready(function(){

            $('#btnLike').click(function(){
                var query = {{ $post->id }};
                var _token = $('input[name="_token"]').val();
                $.ajax({
                    url:"{{ route('post.fetch.likes') }}",
                    method:"POST",
                    data:{query: query, _token: _token},
                    success:function(data){
                        $('#like').html(data);
                    }
                });
            });

            $('#btnComment').click(function(){
                var query = {{ $post->id }};
                var comment = $('#comment').val();
                var _token = $('input[name="_token"]').val();
                $.ajax({
                    url:"{{ route('post.fetch.comments') }}",
                    method:"POST",
                    data:{query: query, comment: comment, _token: _token},
                    success:function(data){
                        $('#comments').html(data);
                    }
                });
            });

        });
    </script>

@endsection
