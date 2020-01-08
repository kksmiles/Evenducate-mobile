``@extends('layouts/master')

@section('css')
        <link rel="stylesheet" type="text/css" href="{{ URL::asset('css/feed.css') }}">
@endsection

@section('title')
    Locations
@endsection

@section('content')

<div class="container">
    <div class="row">
       <div id="locations">
         @csrf
         <input type="text" class="searchinput font-weight-bold" name="location_name" id="location_name" placeholder="Search Locations">
           <div id="locationList">

           </div>
       </div>
    </div>
    <br><br>
    <div class="row">
        <div class="col-lg-7">
            @foreach($locations as $location)
                <div class="row">
                    <div class="col-12">
                        <a href="/locations/{{ $location->id }}" style="text-decoration: none; color : black;">
                            <div class="card mb-3">
                                <div class="row no-gutters">
                                    <div class="col-4 mt-3">
                                        <img src="{{ $location->locationImage() }}" class="card-img" alt="...">
                                    </div>
                                    <div class="col-8">
                                        <div class="card-body">

                                            <p class="eventtitle">
                                                {{ $location->name }}
                                            </p>
                                            <p class="card-text eventplace">
                                                {{ $location->place_name }}
                                            </p>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </a>
                    </div>
                </div>
            @endforeach
            {{ $locations->links() }}
        </div>
        <div class="col-lg-4 ml-5 d-none d-lg-block">
            @include('layouts.multiplemarkerforlocation')
        </div>
    </div>
</div>

<script>

    $(document).ready(function(){


        $('#location_name').keyup(function(){
            var query = $(this).val();
            if(query != '')
            {
             var _token = $('input[name="_token"]').val();
             $.ajax({
              url:"{{ route('autocomplete.fetch.locations') }}",
              method:"POST",
              data:{query:query, _token:_token},
              success:function(data){
               $('#locationList').fadeIn();
               $('#locationList').html(data);
              }
             });
            }
        });


        $(document).on('click', '#locationitem', function(){
            $('#location_name').val($(this).text());
            $('#location_id').val($(this).data('value'));
            $('#locationList').fadeOut();
        });

    });
</script>

@endsection
