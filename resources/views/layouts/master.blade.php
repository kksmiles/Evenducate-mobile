<!DOCTYPE html>
<html lang="en" dir="ltr">
    <head>
        <meta charset="utf-8">
        <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
        <link rel="stylesheet" type="text/css" href="{{ URL::asset('css/bootstrap.min.css') }}">
        <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">
        <link rel="stylesheet" type="text/css" href="{{ URL::asset('css/navbar.css') }}">
        @yield('css')
        <script src="https://kit.fontawesome.com/ac2748b2eb.js"></script>
        <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.4.1/jquery.min.js"></script>
        <title>@yield('title')</title>

    </head>
    <body>
        @include('layouts.navbar')


        @yield('content')

        <br>

        <script>
            var prevScrollpos = window.pageYOffset;
            window.onscroll = function() {
                var currentScrollPos = window.pageYOffset;
                if (prevScrollpos > currentScrollPos) {
                    document.getElementById("headingbar").style.top = "0";
                } else {
                    document.getElementById("headingbar").style.top = "-150px";
                }
                prevScrollpos = currentScrollPos;
            }
        </script>
        <script>
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
        </script>

        <script>

            $(document).ready(function(){


                $('#sevent_name').keyup(function(){
                    var query = $(this).val();
                    if(query != '')
                    {
                     var _token = $('input[name="_token"]').val();
                     $.ajax({
                      url:"{{ route('autocomplete.fetch.sevents') }}",
                      method:"POST",
                      data:{query:query, _token:_token},
                      success:function(data){
                       $('#seventList').fadeIn();
                       $('#seventList').html(data);
                      }
                     });
                    }
                });


                $(document).on('click', '#seventitem', function(){
                    $('#sevent_name').val($(this).text());
                    $('#sevent_id').val($(this).data('value'));
                    $('#seventList').fadeOut();
                });

            });
        </script>

    </body>
</html>
