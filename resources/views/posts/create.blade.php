@extends('layouts.master')

@section('title')
    Create Post for {{ $event->title }}
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
                      @include('layouts.errors')

                    <br><br>
                  </div>
                </div>
            </div>
        </div>
        <div class="col-3">

        </div>
    </div>

</div>


@endsection
