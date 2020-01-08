<!DOCTYPE html>
<html lang="en" dir="ltr">

<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <meta name="description" content="">
    <meta name="author" content="">
    <title></title>
    <link href="{{ URL::asset('vendor/bootstrap/css/bootstrap.min.css') }}" rel="stylesheet">
    <link href="https://fonts.googleapis.com/icon?family=Material+Icons" rel="stylesheet">

    <!-- Custom styles for this template -->
    <link href="{{ URL::asset('css/business-frontpage.css') }}" rel="stylesheet">
</head>
<style>
    body {
        background: #fff;
        display: flex;
        justify-content: center;
        align-items: center;

    }

    h1 {
        text-align: center;
        justify-content: center;






        color: #000;


    }

    svg text.blink {
        animation: blink 2s ease-out;
    }

    .wordcloud {

        position: fixed;
        top: 25%;
        left: 50%;
        transform: translate3d(-50%, -50%, 0);
        padding: 1em 1em;
        z-index: -1;



    }

    .wordcloud img {

        object-fit: cover;
        width: 200px;
        height: 200px;
    }



    /* .button {

      text-align: center;
      width: 80px;
      height: 40px;
      position: fixed;
      top: 55%;
      left: 50%;
      transform: translate3d(-50%, -50%, 0);
      line-height:40px;
      border-radius: 5px;

      font-size: 0.8em;
    background: blue;
      color: #000;
    }



  .button:hover
  {
    background: green;
  } */
    .material-icons {
        display: block;
    }

    .btn {


        display: inline-flex;
        align-items: center;
        padding: 0.1em 0.8em;
        height: 3em;
        width: 3em;
        line-height: 1rem;
        font-family: inherit;
        font-size: 1rem;
        font-weight: 400;
        color: rgba(0, 0, 0, 0.8);
        text-align: center;
        justify-content: center;
        border: none;
        text-decoration: none;
        outline: none;
        -webkit-appearance: none;
        -moz-appearance: none;
        appearance: none;
        vertical-align: middle;
        background: transparent;
        border-radius: 50px;
        transition: all 300ms ease;
        -webkit-user-select: none;
        -moz-user-select: none;
        -ms-user-select: none;
        user-select: none;
        cursor: pointer;
        background-color: rgba(0, 0, 0, 0.025);
        background-image: linear-gradient(180deg, rgba(255, 255, 255, 0.05), transparent);
        box-shadow: rgba(0, 0, 0, 0.3) 0 1px 3px;
    }

    .btn::-moz-focus-inner {
        border: 0;
    }

    .btn:hover,
    .btn:focus {
        background-color: rgba(0, 0, 0, 0.025);
        box-shadow: rgba(0, 0, 0, 0.1) 0 1px 3px, rgba(0, 0, 0, 0.3) 0 2px 6px;
    }

    .btn:active {
        box-shadow: rgba(0, 0, 0, 0.3) 0 1px 3px;
    }

    .btn[disabled] {
        opacity: 0.4;
        pointer-events: none;
    }

    .btn__block {
        width: 100%;
    }

    .btn__default,
    .btn__primary,
    .btn__accent {
        background-color: rgba(0, 0, 0, 0.025);
        background-image: linear-gradient(180deg, rgba(255, 255, 255, 0.05), transparent);
        box-shadow: rgba(0, 0, 0, 0.3) 0 1px 3px;
    }

    .btn__default:hover,
    .btn__primary:hover,
    .btn__accent:hover,
    .btn__default:focus,
    .btn__primary:focus,
    .btn__accent:focus {
        box-shadow: rgba(0, 0, 0, 0.1) 0 1px 3px, rgba(0, 0, 0, 0.3) 0 2px 6px;
    }

    .btn__default:active,
    .btn__primary:active,
    .btn__accent:active {
        box-shadow: rgba(0, 0, 0, 0.3) 0 1px 3px;
    }

    .btn__primary {
        color: white;
        background-color: #455A64;
    }

    .btn__primary:hover,
    .btn__primary:focus,
    .btn__primary:active {
        background-color: #455A64;
    }

    .btn__accent {
        color: white;
        background-color: #0097A7;
    }

    .btn__accent:hover,
    .btn__accent:focus,
    .btn__accent:active {
        background-color: #0097A7;
    }

    .btn__icon {
        position: fixed;
        top: 5%;
        left: 90%;
        transform: translate3d(-50%, -50%, 0);
        height: 3em;
        width: 3em;
        border-radius: 50px;
        color: #0277bd;
    }

    .btn--icon {
        pointer-events: none;
    }

    .btn--icon~.btn--text {
        margin-left: 1em;
    }

    .btn--text {
        pointer-events: none;
    }






    .extra {
        text-align: center;
        justify-content: center;
        outline: none;
        font-size: 0.7em;
        position: fixed;
        bottom: 0;
        margin-bottom: 30px;
        left: 50%;
        transform: translate3d(-50%, -50%, 0);

    }

    .extra a {
        color: #757575;
        text-decoration: none;

    }



    .login-page {

        width: 360px;
        padding: 8% 0 0;
        margin: auto;
    }

    .form {

        max-width: 360px;
        margin: 0 auto 10px;
        padding: 4px;
        text-align: center;

    }

    .form .login-form {
        position: fixed;
        top: 56%;
        left: 50%;
        transform: translate3d(-50%, -50%, 0);
    }

    .form .register-form {
        max-width: 360px;
        position: fixed;
        top: 62.5%;
        left: 50%;
        transform: translate3d(-50%, -50%, 0);
    }

    .form input {
        font-family: "Roboto", sans-serif;
        outline: 0;
        background: #f2f2f2;
        width: 100%;
        border: 0;
        margin: 0 0 1px;
        padding: 15px;
        box-sizing: border-box;

        font-size: 15px;
    }

    .form .name {

        border-top-left-radius: 20px;


    }

    .form .cpassword {

        border-bottom-right-radius: 20px;
    }

    .form .message {
        margin: 15px 0 0;
        color: #b3b3b3;
        font-size: 12px;
    }

    .form .message a {
        color: #0277bd;
        text-decoration: none;
    }

    .form .register-form {
        display: none;


    }

    .modal {

        display: none;
        /* Hidden by default */
        position: fixed;
        /* Stay in place */
        z-index: 1;
        /* Sit on top */
        padding-top: 100px;
        /* Location of the box */
        left: 0;
        top: 0;
        width: 100%;
        /* Full width */
        height: 100%;
        /* Full height */
        /* Enable scroll if needed */
        background: #fff;
        /* Black w/ opacity */
    }

    /* Modal Content */
    .modal-content {
        border: none;
        text-align: center;
        background-color: #f1f1f1;
        border-radius: 10px;
        box-shadow: 0 2px 5px -1px rgba(0, 0, 0, 0.3);
        overflow: scroll;
        width: 320px;
        height: 650px;
        margin: auto;
        padding: 20px;


    }

    .modal-content p {
        font-size: 12px;
    }

    /* The Close Button */
    .close {
        color: #aaaaaa;
        float: right;
        font-size: 28px;
        font-weight: bold;
    }

    .close:hover,
    .close:focus {
        color: #000;
        text-decoration: none;
        cursor: pointer;
    }
</style>

<body>




    <div class="login-page">
        <div class="form">
            <form class="register-form" method="POST" action="{{ route('register') }}">
                @csrf
                <h1>Register</h1><br>
                <!-- Name -->
                <input id="name" type="text" class="name @error('name') is-invalid @enderror"
                name="name" value="{{ old('name') }}" placeholder="Name"  required autocomplete="name">
                @error('name')
                    <span class="invalid-feedback" role="alert">
                        <strong>{{ $message }}</strong>
                    </span>
                @enderror
                <!-- Name -->
                <!-- Email -->
                <input placeholder="Email" id="email" type="email" class="@error('email') is-invalid @enderror" name="email" value="{{ old('email') }}" required autocomplete="email">

                @error('email')
                    <span class="invalid-feedback" role="alert">
                        <strong>{{ $message }}</strong>
                    </span>
                @enderror
                <!-- Email -->
                <!-- Password -->
                <input placeholder="Password" id="password" type="password" class="@error('password') is-invalid @enderror" name="password" required autocomplete="new-password">

                @error('password')
                    <span class="invalid-feedback" role="alert">
                        <strong>{{ $message }}</strong>
                    </span>
                @enderror
                <!-- Password -->
                <!-- Confirm Password -->
                <input class="cpassword" id="password-confirm" type="password"
                name="password_confirmation" required autocomplete="new-password" placeholder="Confirm Password">
                <!-- Confirm Password -->
                <br>
                <br>
                <button type="submit" class="btn" style="color:#0277bd;">
                    <div class="btn--icon"><i class="material-icons">done</i></div>
                </button>
                <p class="message">Already registered? <a href="#">Sign In</a></p>
            </form>
            <form class="login-form" method="POST" action="{{ route('login') }}">
                @csrf
                <h2>Login</h2><br>
                <input id="email" type="email" class="name @error('email') is-invalid @enderror"
                name="email" value="{{ old('email') }}" required autocomplete="email" placeholder="Email">
                <!-- Email -->
                @error('email')
                    <span class="invalid-feedback" role="alert">
                        <strong>{{ $message }}</strong>
                    </span>
                @enderror
                <!-- Email -->
                <!-- Password -->
                <input id="password" type="password" class="cpassword @error('password') is-invalid @enderror"
                name="password" required autocomplete="current-password"  placeholder="Password" >

                @error('password')
                    <span class="invalid-feedback" role="alert">
                        <strong>{{ $message }}</strong>
                    </span>
                @enderror
                <!-- Password -->
                <br>
                <br>
                <button class="btn" style="color:#0277bd;">
                    <div class="btn--icon"><i class="material-icons">done</i></div>
                </button>
                <p class="message">Not registered? <a href="#">Create an account</a></p>
            </form>
        </div>
    </div>










    <p class="extra"><a href="index.html"><i class="material-icons">face</i>Login as Guest </a></p>





    <button type="button" class="btn btn__icon" id="myBtn"><span class="btn--icon"><i class="material-icons">short_text</i></span></button>





    <div id="myModal" class="modal">

        <!-- Modal content -->
        <div class="modal-content">
            <span class="close">&#10005;</span>
            <!-- <h4>At Your Service</h4>
    <hr width="250px;"> -->
            <br>
            <i style="color:#0277bd;" class="material-icons">search</i>
            <h5>Browse Events</h5>
            <p>Easily browse around your own personalized eventsfeed as well as our notification system will keep you updated with your favourite events</p>
            <br>
            <i style="color:#0277bd;" class="material-icons">
                supervised_user_circle
            </i>
            <h5>Speakers</h5>
            <p>Easily contact and negotiate with location managers to host an event.</p>
            <br>
            <i style="color:#0277bd;" class="material-icons">
                location_searching
            </i>
            <h5>Locations</h5>
            <p>Manage your own locations and gain exposure by hosting events with various speakers</p>
            <br>
            <i style="color:#0277bd;" class="material-icons">
                subscriptions
            </i>
            <h5>Subscribe</h5>
            <p>Become our premium member and gain access to various events' videos and presentation slides.</p>


        </div>

    </div>




    <div class="wordcloud">
        <img src="{{  URL::asset('image/group.JPG') }}">
    </div>

    <script src="https://cdnjs.cloudflare.com/ajax/libs/jquery/2.1.3/jquery.min.js"></script>
    <script src="js/index.js"></script>
    <script src="https://blueimp.github.io/JavaScript-MD5/js/md5.js"></script>






</body>

</html>
<script>
    // Get the modal
    var modal = document.getElementById("myModal");

    // Get the button that opens the modal
    var btn = document.getElementById("myBtn");

    // Get the <span> element that closes the modal
    var span = document.getElementsByClassName("close")[0];

    // When the user clicks the button, open the modal
    btn.onclick = function() {
        modal.style.display = "block";
    }

    // When the user clicks on <span> (x), close the modal
    span.onclick = function() {
        modal.style.display = "none";
    }

    // When the user clicks anywhere outside of the modal, close it
    window.onclick = function(event) {
        if (event.target == modal) {
            modal.style.display = "none";
        }
    }
</script>


<script id="rendered-js">

    $('.message a').click(function() {
        $('form').animate({
            height: "toggle",
            opacity: "toggle"
        }, "fast");
    });
</script>
