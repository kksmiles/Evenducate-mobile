<!DOCTYPE html>
<html lang="en" dir="ltr">
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <meta name="description" content="">
    <meta name="author" content="">
    <title></title>
    <link href="{{  URL::asset('vendor/bootstrap/css/bootstrap.min.css') }}" rel="stylesheet">
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

    header {
        text-align: center;
        position: fixed;
        top: 42%;
        left: 50%;




        color: #000;
        transform: translate(-50%, -50%);

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



    @keyframes blink {
        0% {
            text-shadow: 0 0 20px rgba(226, 25, 45, 0);
        }

        20% {
            fill: rgba(226, 25, 45, 1);
            text-shadow: -5px -5px 20px rgba(226, 25, 45, 0.8), 5px -5px 20px rgba(226, 25, 45, 0.8), 5px 5px 20px rgba(226, 25, 45, 0.8), -5px 5px 20px rgba(226, 25, 45, 0.8);
            ;
        }

        30% {
            fill: rgba(226, 25, 45, 1);
            -5px -5px 20px rgba(226, 25, 45, 0.8),
            5px -5px 20px rgba(226, 25, 45, 0.8),
            5px 5px 20px rgba(226, 25, 45, 0.8),
            -5px 5px 20px rgba(226, 25, 45, 0.8);
        }

        100% {
            text-shadow: 0 0 20px rgba(226, 25, 45, 0);
        }
    }

    .st0 {
        font-size: 68px;
    }

    .st1 {
        font-size: 27px;
    }

    .st2 {
        font-size: 82px;
    }

    .st3 {
        font-size: 41px;
    }

    .st4 {
        font-size: 41px;
    }

    .st5 {
        fill: #808080;
    }

    .st6 {
        font-size: 24px;
    }

    .st7 {
        font-size: 24px;
    }

    .st8 {
        font-size: 62px;
    }

    .st9 {
        font-size: 86px;
    }

    .st10 {
        font-size: 18px;
    }

    .st11 {
        font-size: 18px;
    }

    .st12 {
        font-size: 25px;
    }

    .st13 {
        font-size: 25px;
    }

    .st14 {
        font-size: 25px;
    }

    .st15 {
        font-size: 32px;
    }

    .st16 {
        font-size: 32px;
    }

    .st17 {
        font-family: 'Open Sans';
        font-weight: 600;
        fill: #a0a0a0;
    }

    .st18 {
        font-size: 22px;
    }

    .st19 {
        font-size: 22px;
    }

    .st20 {
        font-size: 36px;
    }

    .st21 {
        font-size: 19px;
    }

    .st22 {
        font-size: 51px;
    }

    .st23 {
        font-size: 26px;
    }

    .st24 {
        font-size: 33px;
    }

    .st25 {
        font-size: 20px;
    }

    .st26 {
        font-size: 23px;
    }

    .st27 {
        font-size: 23px;
    }

    .st28 {
        font-family: 'Open Sans';
    }

    .st29 {
        font-size: 54px;
    }

    .st30 {
        font-size: 20px;
    }

    .st31 {
        font-size: 37px;
    }

    .center {
        text-align: center;
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
        position: fixed;
        top: 55%;
        left: 50%;
        transform: translate3d(-50%, -50%, 0);

        display: inline-flex;
        align-items: center;
        padding: 0.1em 0.8em;
        min-height: 2.8rem;
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
        border-radius: 20px;
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



    h6 {
        position: fixed;
        bottom: 0;
        margin-bottom: 50px;
        color: #9e9e9e;
    }
</style>

<body>

    <header>

        <h1 style="color:#000;">evenducate</h1>



    </header>

    <section>


        <button class="btn" style="color:#0277bd;" onclick="window.location.href = '/register'">
            <span class="btn--icon"><i class="material-icons">
                    scatter_plot
                </i></span>
            <span class="btn--text">Get Started</span>
        </button>

        <br><br>





    </section>
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
        <img src="{{ URL::asset('image/group.JPG') }}">
        </svg>
    </div>

    <h6 style="font-size:12px;">Your trusted event community</h6>



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


</body>

</html>
