@extends('layouts.master')

@section('title')
	Event Registration Form
@endsection

@section('css')
	<link rel="stylesheet" type="text/css" href="{{ URL::asset('css/createevent.css') }}">
@endsection

@section('content')
	<div class="row">
	<div class="col-25">
	</div>
	  <div class="col-50">
	    <div class="container">
	    	<form action="/events" method="post" enctype="multipart/form-data">
                @csrf
	    		<!--<div class="row">
	          		<div class="col-50">-->
						<?php
							date_default_timezone_set('Asia/Rangoon')
						 ?>


	          			<legend><span class="number">1</span>Event Details</legend>
	          			<hr><br/>
	          			<label for="title">Event Title<span style="color:red;"> *</span></label>
	           			<input type="text" id="title" name="title" placeholder="Give it a short distinct name" required="true">
                        <label for="description">Event Description<span style="color:red;"> *</span></label>
	           			<input type="text" id="description" name="description" placeholder="Describe what your event is about" required="true">
                        <input type="hidden" id="location_id" name="location_id" value="{{ $location->id }}">
	           			<input type="hidden" id="organizer_id" name="organizer_id" value="{{ $user->id }}">

	           			<div class="row">
	           			<div class="col-50">
	           			<label for="start">Starts</label>
	           			<input type="date" name="start_date" min="{{ date('Y-m-d') }}" required>
	           			</div>
	           			<dir class="col-50">
	           			<label></label>
	           			<input type="time" name="start_time" min="{{$location->open_time}}" max="{{ $location->close_time }}" required>
	           			</dir>
	           			</div>

	           			<div class="row">
	           			<div class="col-50">
	           			<label for="end">Ends</label>
	           			<input type="date" name="end_date" min="{{ date('Y-m-d') }}" required>
	           			</div>
	           			<dir class="col-50">
	           			<label></label>
	           			<input type="time" name="end_time" min="{{$location->open_time}}" max="{{ $location->close_time }}" required>
	           			</dir>
	           			</div>
                        <div id="speakers">
                            <label for="speaker_name">Speaker Name</label>
        	                <input type="text" id="speaker_name" placeholder="">
                            <div id="speakerList">

                            </div>
                        </div>
                        <div class="custom-file">
                          <input type="file" class="custom-file-input" name="img_path"  id="customFile">
                          <label class="custom-file-label" for="customFile">Choose file</label>
                        </div>

	                <br/>
	                <br/>
	           			<legend><span class="number">2</span>Create Tickets</legend>
	                <hr><br/>
	                <p style="text-align: center; width: 100%; font-size: 20px;">What type of tickets do you want to start with?</p>
	                <div class="row">
    	                <div class="col-25">
							<div class="row">
								<div class="col-2">

								</div>
								<div class="col-3">
									<input type="radio" name="ticket_type" value="Free"> Free Ticket
								</div>
								<div class="col-3">
									<input type="radio" name="ticket_type" value="Paid"> Paid Ticket
								</div>
								<div class="col-3">
									<input type="radio" name="ticket_type" value="Donation"> Donation
								</div>
							</div>

                             <br>
    	                </div>
	                </div>
	                <br/><br/>

	                <legend><span class="number">3</span>Additional Settings</legend>
	                <hr><br/>
                    <label for="available_tickets">Number of Tickets</label>
                    <input type="number" name="available_tickets" id="available_tickets"> <br>
                    Show available Tickets
                    <input type="radio" name="show_available_tickets" value="1"> Yes
                    <input type="radio" name="show_available_tickets" value="0" checked> No <br>
					<br><br>
					<label for="tags[]" style="text-align: center; width:100%; font-size: 25px; font-weight:bold;">Tags</label>
                    <label class="text-muted"for="tags[]" style="text-align: center; width:100%;">How do you want your event to be associated?</label>
					<div class="custom-control custom-checkbox">
						<div class="row">

				            @foreach($tags as $tag)
				            <div class="col-4">
				                <input type="checkbox" name="tags[]" value="{{ $tag->id }}">{{ $tag->name }} <br>

				            </div>
				            @endforeach
				        </div>

					</div>

	               <br/><br/>
	               <hr>
	               <br/><br/>
	               <h1 style="margin-left: 18%;">Nice one! You're almost done.</h1>
	               <div class="row">
	                <div class="col-50">
	                  <input style="width:100%" type="submit" name="live" value="Submit your event Proposal" class="submit" onclick="">
	                </div>
	                </div>
	           		<!--</div>
	           	</div>-->
	        </form>
			@include('layouts.errors')
	    </div>
	  </div>
	  <div class="col-25">
	  </div>
	</div>

    <script>

        $(document).ready(function(){

         $('#tag_name').keyup(function(){
                var query = $(this).val();
                if(query != '')
                {
                 var _token = $('input[name="_token"]').val();
                 $.ajax({
                  url:"{{ route('autocomplete.fetch.tags') }}",
                  method:"POST",
                  data:{query:query, _token:_token},
                  success:function(data){
                   $('#tagList').fadeIn();
                   $('#tagList').html(data);
                  }
                 });
                }
            });


            $(document).on('click', '#tagitem', function(){
                $('#tag_name').val('');
                $('#tags').append('<input type="checkbox" name="tags[]" value="' +
                $(this).data('value') + '" checked>' + $(this).text() + '<br>');
                $('#tagList').fadeOut();
            });

            $('#speaker_name').keyup(function(){
                   var query = $(this).val();
                   if(query != '')
                   {
                    var _token = $('input[name="_token"]').val();
                    $.ajax({
                     url:"{{ route('autocomplete.fetch.speakers') }}",
                     method:"POST",
                     data:{query:query, _token:_token},
                     success:function(data){
                      $('#speakerList').fadeIn();
                      $('#speakerList').html(data);
                     }
                    });
                   }
               });


               $(document).on('click', '#speakeritem', function(){
                   $('#speaker_name').val('');
                   $('#speakers').append('<input type="checkbox" name="speakers[]" value="' +
                   $(this).data('value') + '" checked>' + $(this).text() + '<br>');
                   $('#speakerList').fadeOut();
               });

        });
</script>
@endsection
