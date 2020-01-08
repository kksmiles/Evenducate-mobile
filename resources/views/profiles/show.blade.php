@extends('layouts.master')

@section('css')
<link rel="stylesheet" href="{{ URL::asset('css/profile.css') }}">
<link rel="stylesheet" href="{{ URL::asset('css/feed.css') }}">
@endsection

@section('title')
  {{ $user->name }}'s profile
@endsection

@section('content')
  <div class="container">
    <div class="profilecard" style="padding-bottom : 30px;">
      <div class="row" style="padding-top: 5%;">
        <div class="col-1">

        </div>
        <div class="col-3">
          <img src="{{ $profile->profileImage() }}" width="200px" height="200px" style="border-width: 1px; border-color: gray; border-style: solid; border-radius : 200px" alt="">
        </div>
        <div class="col-8">
          <div class="row">
              <h5>
                <span style="font-size: 25px;">{{ $user->name }}</span>
                @if(auth()->id() == $profile->user_id)
                    <a style="text-decoration: none; color: black;" href="/profiles/{{ $profile->id }}/edit" class="editprofile font-weight-bold ml-3">Edit Profile</button>
                    <a href="" style="color: black;" class="ml-3"><i class="fas fa-cog settingsicon"></i></a>
                @else
                @if($followcheck)
                    <button type="button" name="btnFollow" id="btnFollow" class="editprofile font-weight-bold ml-3">Following</button>
                @endif
                @if(!$followcheck)
                    <button type="button" name="btnFollow" id="btnFollow" class="editprofile font-weight-bold ml-3">Follow</button>
                @endif
                    <form>
                        @csrf
                    </form>

                    <script>

                        $(document).ready(function(){

                            $('#btnFollow').click(function(){
                                var query = {{ $profile->id }};
                                var _token = $('input[name="_token"]').val();
                                $.ajax({
                                    url:"{{ route('follow.fetch.followers')}}",
                                    method:"POST",
                                    data:{query: query, _token: _token},
                                    success:function(data){
                                        $('#follower').html(data);
                                    }
                                });
                            });

                        });
                    </script>
                @endif
              </h5>
          </div>
          <div class="row">
            <b>{{ $user->speakingEvents->count()+$user->organizingEvents->count() }} &nbsp;</b>Events
            <b class="ml-3" id="follower">{{ $profile->followers->count() }}</b>  &nbsp; Followers
            <b class="ml-3">{{ $user->follows->count() }}  </b> &nbsp; Followings
          </div>
          <div class="row mt-2">
            <b>{{ $profile->title }}</b>
          </div>
          <div class="row mt-2">
            {{ $profile->description }}
          </div>
          <div class="row mt-2">
            <a href="http://{{ $profile->website }}">{{ $profile->website }}</a>
          </div>
        </div>

      </div>
    </div>


    <div class="profilecard mt-2">
      <div class="row">
        <nav style="margin: auto;">
          <div class="nav nav-tabs" id="nav-tab" role="tablist">
            <a class="nav-item nav-link active" id="nav-home-tab" data-toggle="tab" href="#nav-home" role="tab" aria-controls="nav-home" aria-selected="true">Organizer</a>
            <a class="nav-item nav-link" id="nav-profile-tab" data-toggle="tab" href="#nav-profile" role="tab" aria-controls="nav-profile" aria-selected="false">Speaker</a>
          </div>
        </nav>
        <div class="tab-content" id="nav-tabContent">
          <div class="tab-pane fade show active" id="nav-home" role="tabpanel" aria-labelledby="nav-home-tab">
              @foreach($organizingEvents as $organizingEvent)
                  <div class="row">
                    <div class="col-1">

                    </div>
                    <div class="col-10">
                        <a href="/events/{{ $organizingEvent->id }}" style="text-decoration: none; color : black;">
                            <div class="card mb-3">
                                <div class="row no-gutters">
                                    <div class="col-4 mt-3">
                                        <img src="{{ $organizingEvent->eventImage() }}" class="card-img" height="200px" alt="...">
                                    </div>
                                    <div class="col-8">
                                        <div class="card-body">

                                            <h5 class="eventdate">Wed, Jun 19</h5>
                                            <p class="eventtitle">
                                                {{ $organizingEvent->title }}
                                            </p>
                                            <p class="card-text eventplace">
                                                {{ $organizingEvent->location->place_name }}
                                            </p>
                                            <span class="tag text-center">
                                                Free
                                            </span>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </a>
                        @if($organizingEvent->organizer_id !== auth()->id())
                            <div class="card checkcontainerprofile">
                                <button style="border:none; background-color:white; padding: 0 0 0 0;" class="far fa-calendar-check"
                                    onclick="window.location.href='/events/{{$organizingEvent->id}}/getTicket'"
                                ></button>
                            </div>
                            <div class="card heartcontainerbrowse">
                                @if($organizingEvent->interestedUsers->count()==0)
                                    <button style="border:none; background-color:white; padding: 0 0 0 0;"
                                    id="btnInterest{{ $organizingEvent->id }}" class="far fa-heart"></button>
                                    @else
                                    <?php $onetime = 0; ?>
                                    @foreach($organizingEvent->interestedUsers as $interestedUser)
                                        @if($interestedUser->id == auth()->id())
                                            <button style="border:none; background-color:white; padding: 0 0 0 0;"
                                            id="btnInterest{{ $organizingEvent->id }}" class="fas fa-heart"></button>
                                            <?php $onetime = 1; ?>
                                        @endif

                                    @endforeach
                                    <?php if($onetime == 0)
                                    {
                                        echo '<button style="border:none; background-color:white; padding: 0 0 0 0;"
                                        id="btnInterest{{ $organizingEvent->id }}" class="far fa-heart"></button>';
                                    }
                                    ?>

                                @endif

                            </div>
                        @endif
                    </div>
                    <div class="col-1">

                    </div>
                  </div>
                  <script>

                      $(document).ready(function(){

                          $('#btnInterest{{ $organizingEvent->id }}').click(function(){
                              var query = {{ $organizingEvent->id }};
                              var _token = $('input[name="_token"]').val();
                              $.ajax({
                                  url:"{{ route('event.fetch.interest')}}",
                                  method:"POST",
                                  data:{query: query, _token: _token},
                                  success:function(data){
                                      if(data==1)
                                      {
                                          $('#btnInterest{{ $organizingEvent->id }}').removeClass("far");
                                          $('#btnInterest{{ $organizingEvent->id }}').addClass("fas");
                                      }
                                      else {
                                          $('#btnInterest{{ $organizingEvent->id }}').removeClass("fas");
                                          $('#btnInterest{{ $organizingEvent->id }}').addClass("far");
                                      }
                                  }
                              });
                          });

                      });
                  </script>

              @endforeach

          </div>
          <div class="tab-pane fade" id="nav-profile" role="tabpanel" aria-labelledby="nav-profile-tab">
              @foreach($user->speakingEvents as $speakingEvent)
                  <div class="row">
                    <div class="col-1">

                    </div>
                    <div class="col-10">
                        <a href="/events/{{ $speakingEvent->id }}" style="text-decoration: none; color : black;">
                            <div class="card mb-3">
                                <div class="row no-gutters">
                                    <div class="col-4 mt-3">
                                        <img src="{{ $speakingEvent->eventImage() }}" height="200px" class="card-img" alt="...">
                                    </div>
                                    <div class="col-8">
                                        <div class="card-body">

                                            <h5 class="eventdate">Wed, Jun 19</h5>
                                            <p class="eventtitle">
                                                {{ $speakingEvent->title }}
                                            </p>
                                            <p class="card-text eventplace">
                                                {{ $speakingEvent->location->place_name }}
                                            </p>
                                            <span class="tag text-center">
                                                Free
                                            </span>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </a>
                        @if($speakingEvent->organizer_id !== auth()->id())
                            <div class="card checkcontainerprofile">
                                <button style="border:none; background-color:white; padding: 0 0 0 0;" class="far fa-calendar-check"
                                    onclick="window.location.href='/events/{{$speakingEvent->id}}/getTicket'"
                                ></button>
                            </div>
                            <div class="card heartcontainerbrowse">
                                @if($speakingEvent->interestedUsers->count()==0)
                                    <button style="border:none; background-color:white; padding: 0 0 0 0;"
                                    id="btnInterest{{ $speakingEvent->id }}" class="far fa-heart"></button>
                                    @else
                                    <?php $onetime = 0; ?>
                                    @foreach($speakingEvent->interestedUsers as $interestedUser)
                                        @if($interestedUser->id == auth()->id())
                                            <button style="border:none; background-color:white; padding: 0 0 0 0;"
                                            id="btnInterest{{ $speakingEvent->id }}" class="fas fa-heart"></button>
                                            <?php $onetime = 1; ?>
                                        @endif

                                    @endforeach
                                    <?php if($onetime == 0)
                                    {
                                        echo '<button style="border:none; background-color:white; padding: 0 0 0 0;"
                                        id="btnInterest{{ $speakingEvent->id }}" class="far fa-heart"></button>';
                                    }
                                    ?>

                                @endif

                            </div>
                        @endif
                    </div>
                    <div class="col-1">

                    </div>
                  </div>
                  <script>

                      $(document).ready(function(){

                          $('#btnInterest{{ $speakingEvent->id }}').click(function(){
                              var query = {{ $speakingEvent->id }};
                              var _token = $('input[name="_token"]').val();
                              $.ajax({
                                  url:"{{ route('event.fetch.interest')}}",
                                  method:"POST",
                                  data:{query: query, _token: _token},
                                  success:function(data){
                                      if(data==1)
                                      {
                                          $('#btnInterest{{ $speakingEvent->id }}').removeClass("far");
                                          $('#btnInterest{{ $speakingEvent->id }}').addClass("fas");
                                      }
                                      else {
                                          $('#btnInterest{{ $speakingEvent->id }}').removeClass("fas");
                                          $('#btnInterest{{ $speakingEvent->id }}').addClass("far");
                                      }
                                  }
                              });
                          });

                      });
                  </script>

              @endforeach
          </div>
        </div>
      </div>



    </div>

  </div>

@endsection
