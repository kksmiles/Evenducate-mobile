@extends('layouts.master')

@section('title')
    Profile
@endsection

@section('css')
        <link rel="stylesheet" type="text/css" href="{{ URL::asset('css/profile.css') }}">
@endsection

@section('content')
<body>
  <!-- Navigation -->
  <!-- Header -->
<div id="headingbar">
  <header>
          <h1 style="color:#0277bd;">Profile</h1>
  </header>
</div>

<div class="container">
  <div class="list-group list-group-flush">
      <br><br><br>
      <br><br><br>
    <!-- <a href="#" class="list-group-item list-group-item-action" id="id01"> <img src="{{ URL::asset('image/Profile Setting.png') }}" alt=""> <span style="padding-left: 7px; font-size: 18px;"> Edit Profile </span></a> -->
    <a href="#" style="border-top: none;" class="mt-1 list-group-item list-group-item-action" id="id02"><img src="{{ URL::asset('image/Idea.png') }}" alt=""> <span style="padding-left: 16px; font-size: 18px;"> Your Interests </span></a>
    <a href="#" style="border-top: none;" class="mt-1 list-group-item list-group-item-action" id="id03"><img src="{{ URL::asset('image/event notification.png') }}" alt=""> <span style="padding-left: 16px; font-size: 18px;"> Interested Events </span></a>
    <a href="#" style="border-top: none;" class="mt-1 list-group-item list-group-item-action" id="id04"><img src="{{ URL::asset('image/going event.png') }}" alt=""> <span style="padding-left: 16px; font-size: 18px;"> Going Events </span></a>
    <a href="#" style="border-top: none;" class="mt-1 list-group-item list-group-item-action" id="id05"><img src="{{ URL::asset('image/Location.png') }}" alt=""> <span style="padding-left: 16px; font-size: 18px;"> Your Locations </span></a>
    <a href="#" style="border-top: none;" class="mt-1 list-group-item list-group-item-action" id="id06"><img src="{{ URL::asset('image/Microphone.png') }}" alt=""> <span style="padding-left: 16px; font-size: 18px;"> Your Events </span></a>
    <a href="#" style="border-top: none;" class="mt-1 list-group-item list-group-item-action" id="id07"><img src="{{ URL::asset('image/Settings.png') }}" alt=""> <span style="padding-left: 16px; font-size: 18px;"> Settings </span></a>
    <a href="register.html" class="list-group-item list-group-item-action" ><img src="{{ URL::asset('image/Door.png') }}" alt=""> <span style="padding-left: 16px; font-size: 18px;"> Logout </span></a>
  </div>
</div>

    <div id="id01modal" class="modal">
      <!-- Modal content -->
      <div class="modal-content">
        <h3>Edit Profile</h3>
        <br>
        It is a long established fact that a reader will be distracted by the readable content of a page when looking at its layout. The point of using Lorem Ipsum is that it has a more-or-less normal distribution of letters, as opposed to using 'Content here, content here', making it look like readable English. Many desktop publishing packages and web page editors now use Lorem Ipsum as their default model text, and a search for 'lorem ipsum' will uncover many web sites still in their infancy. Various versions have evolved over the years, sometimes by accident, sometimes on purpose (injected humour and the like).
        <span class="close"><br>&#x2715;</span>
      </div>
    </div>

    <div id="id02modal" class="modal">
      <!-- Modal content -->
      <div class="modal-content">
        <h3>My Tags</h3>
        <br>
        It is a long established fact that a reader will be distracted by the readable content of a page when looking at its layout. The point of using Lorem Ipsum is that it has a more-or-less normal distribution of letters, as opposed to using 'Content here, content here', making it look like readable English. Many desktop publishing packages and web page editors now use Lorem Ipsum as their default model text, and a search for 'lorem ipsum' will uncover many web sites still in their infancy. Various versions have evolved over the years, sometimes by accident, sometimes on purpose (injected humour and the like).
        <span class="close"><br>&#x2715;</span>
      </div>
    </div>

    <div id="id03modal" class="modal">
      <!-- Modal content -->
      <div class="modal-content">
        <h3>Interested Events</h3>
        <br>
        It is a long established fact that a reader will be distracted by the readable content of a page when looking at its layout. The point of using Lorem Ipsum is that it has a more-or-less normal distribution of letters, as opposed to using 'Content here, content here', making it look like readable English. Many desktop publishing packages and web page editors now use Lorem Ipsum as their default model text, and a search for 'lorem ipsum' will uncover many web sites still in their infancy. Various versions have evolved over the years, sometimes by accident, sometimes on purpose (injected humour and the like).
        <span class="close"><br>&#x2715;</span>
      </div>
    </div>

    <div id="id04modal" class="modal">

      <!-- Modal content -->
      <div class="modal-content">
        <h3>Going Events</h3>
        <br>
        It is a long established fact that a reader will be distracted by the readable content of a page when looking at its layout. The point of using Lorem Ipsum is that it has a more-or-less normal distribution of letters, as opposed to using 'Content here, content here', making it look like readable English. Many desktop publishing packages and web page editors now use Lorem Ipsum as their default model text, and a search for 'lorem ipsum' will uncover many web sites still in their infancy. Various versions have evolved over the years, sometimes by accident, sometimes on purpose (injected humour and the like).

        <span class="close"><br>&#x2715;</span>

      </div>

    </div>

    <div id="id05modal" class="modal">
      <!-- Modal content -->
      <div class="modal-content">
        <h3>My Locations</h3>
        <br>
        It is a long established fact that a reader will be distracted by the readable content of a page when looking at its layout. The point of using Lorem Ipsum is that it has a more-or-less normal distribution of letters, as opposed to using 'Content here, content here', making it look like readable English. Many desktop publishing packages and web page editors now use Lorem Ipsum as their default model text, and a search for 'lorem ipsum' will uncover many web sites still in their infancy. Various versions have evolved over the years, sometimes by accident, sometimes on purpose (injected humour and the like).

        <span class="close"><br>&#x2715;</span>

      </div>

    </div>

    <div id="id06modal" class="modal">

      <!-- Modal content -->
      <div class="modal-content">
        <h3>My Events</h3>
        <br>
        It is a long established fact that a reader will be distracted by the readable content of a page when looking at its layout. The point of using Lorem Ipsum is that it has a more-or-less normal distribution of letters, as opposed to using 'Content here, content here', making it look like readable English. Many desktop publishing packages and web page editors now use Lorem Ipsum as their default model text, and a search for 'lorem ipsum' will uncover many web sites still in their infancy. Various versions have evolved over the years, sometimes by accident, sometimes on purpose (injected humour and the like).

        <span class="close"><br>&#x2715;</span>

      </div>

    </div>

    <div id="id07modal" class="modal">

      <!-- Modal content -->
      <div class="modal-content">
        <h3>Settings</h3>
        <br>
        It is a long established fact that a reader will be distracted by the readable content of a page when looking at its layout. The point of using Lorem Ipsum is that it has a more-or-less normal distribution of letters, as opposed to using 'Content here, content here', making it look like readable English. Many desktop publishing packages and web page editors now use Lorem Ipsum as their default model text, and a search for 'lorem ipsum' will uncover many web sites still in their infancy. Various versions have evolved over the years, sometimes by accident, sometimes on purpose (injected humour and the like).

        <span class="close"><br>&#x2715;</span>

      </div>

    </div>

    <script type="text/javascript">
            // Add active class to the current button (highlight it)
        var header = document.getElementById("myDIV");
        var btns = header.getElementsByClassName("nav-item");
        for (var i = 0; i < btns.length; i++) {
            btns[i].addEventListener("click", function() {
                var current = document.getElementsByClassName("active");
                current[0].className = current[0].className.replace(" active", "");
                this.className += " active";
            });
        }

        // Get the modal
        var modal1 = document.getElementById("id01modal");
        // Get the button that opens the modal
        var id01 = document.getElementById("id01");
        // Get the <span> element that closes the modal
        var span1 = document.getElementsByClassName("close")[0];
        // When the user clicks the button, open the modal
        id01.onclick = function() {
          modal1.style.display = "block";
        }
        // When the user clicks on <span> (x), close the modal
        span1.onclick = function() {
          modal1.style.display = "none";
        }
        // When the user clicks anywhere outside of the modal, close it
        window.onclick = function(event) {
          if (event.target == modal1) {
            modal1.style.display = "none";
          }
        }

                // Get the modal
        var modal2 = document.getElementById("id02modal");
        // Get the button that opens the modal
        var id02 = document.getElementById("id02");
        // Get the <span> element that closes the modal
        var span2 = document.getElementsByClassName("close")[1];
        // When the user clicks the button, open the modal
        id02.onclick = function() {
          modal2.style.display = "block";
        }
        // When the user clicks on <span> (x), close the modal
        span2.onclick = function() {
          modal2.style.display = "none";
        }
        // When the user clicks anywhere outside of the modal, close it
        window.onclick = function(event) {
          if (event.target == modal2) {
            modal2.style.display = "none";
          }
        }

                // Get the modal
        var modal3 = document.getElementById("id03modal");
        // Get the button that opens the modal
        var id03 = document.getElementById("id03");
        // Get the <span> element that closes the modal
        var span3 = document.getElementsByClassName("close")[2];
        // When the user clicks the button, open the modal
        id03.onclick = function() {
          modal3.style.display = "block";
        }
        // When the user clicks on <span> (x), close the modal
        span3.onclick = function() {
          modal3.style.display = "none";
        }
        // When the user clicks anywhere outside of the modal, close it
        window.onclick = function(event) {
          if (event.target == modal3) {
            modal3.style.display = "none";
          }
        }

                // Get the modal
        var modal4 = document.getElementById("id04modal");
        // Get the button that opens the modal
        var id04 = document.getElementById("id04");
        // Get the <span> element that closes the modal
        var span4 = document.getElementsByClassName("close")[3];
        // When the user clicks the button, open the modal
        id04.onclick = function() {
          modal4.style.display = "block";
        }
        // When the user clicks on <span> (x), close the modal
        span4.onclick = function() {
          modal4.style.display = "none";
        }
        // When the user clicks anywhere outside of the modal, close it
        window.onclick = function(event) {
          if (event.target == modal4) {
            modal4.style.display = "none";
          }
        }

        // Get the modal
        var modal5 = document.getElementById("id05modal");
        // Get the button that opens the modal
        var id05 = document.getElementById("id05");
        // Get the <span> element that closes the modal
        var span5 = document.getElementsByClassName("close")[4];
        // When the user clicks the button, open the modal
        id05.onclick = function() {
          modal5.style.display = "block";
        }
        // When the user clicks on <span> (x), close the modal
        span5.onclick = function() {
          modal5.style.display = "none";
        }
        // When the user clicks anywhere outside of the modal, close it
        window.onclick = function(event) {
          if (event.target == modal5) {
            modal5.style.display = "none";
          }
        }

        // Get the modal
        var modal6 = document.getElementById("id06modal");
        // Get the button that opens the modal
        var id06 = document.getElementById("id06");
        // Get the <span> element that closes the modal
        var span6 = document.getElementsByClassName("close")[5];
        // When the user clicks the button, open the modal
        id06.onclick = function() {
          modal6.style.display = "block";
        }
        // When the user clicks on <span> (x), close the modal
        span6.onclick = function() {
          modal6.style.display = "none";
        }
        // When the user clicks anywhere outside of the modal, close it
        window.onclick = function(event) {
          if (event.target == modal6) {
            modal6.style.display = "none";
          }
        }

        // Get the modal
        var modal7 = document.getElementById("id07modal");
        // Get the button that opens the modal
        var id07 = document.getElementById("id07");
        // Get the <span> element that closes the modal
        var span7 = document.getElementsByClassName("close")[6];
        // When the user clicks the button, open the modal
        id07.onclick = function() {
          modal7.style.display = "block";
        }
        // When the user clicks on <span> (x), close the modal
        span7.onclick = function() {
          modal7.style.display = "none";
        }
        // When the user clicks anywhere outside of the modal, close it
        window.onclick = function(event) {
          if (event.target == modal7) {
            modal7.style.display = "none";
          }
        }
    </script>

@endsection
