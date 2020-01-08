<div id="myDIV">
    <div id="navigationbar">
        <ul>
          @if(empty($uri))
            <li style="margin:0;" class="navigation-item active"><a href="/home"><img src="{{ URL::asset('icon/home.png') }}"></a></li>
            <li style="margin:0;" class="navigation-item"><a href="/browse"><img src="{{ URL::asset('icon/search.png') }}"></a></li>
            <li style="margin:0;" class="navigation-item"><a href="/locations"><img src="{{ URL::asset('icon/create.png') }}"></a></li>
            <li style="margin:0;" class="navigation-item"><a href="/notifications"><img src="{{ URL::asset('icon/noti.png') }}"></a></li>
            <li style="margin:0;" class="navigation-item"><a href="/profiles"><img src="{{ URL::asset('icon/profile.png') }}"></a></li>
          @elseif($uri=="home")
            <li style="margin:0;" class="navigation-item active"><a href="/home"><img src="{{ URL::asset('icon/home.png') }}"></a></li>
            <li style="margin:0;" class="navigation-item"><a href="/browse"><img src="{{ URL::asset('icon/search.png') }}"></a></li>
            <li style="margin:0;" class="navigation-item"><a href="/locations"><img src="{{ URL::asset('icon/create.png') }}"></a></li>
            <li style="margin:0;" class="navigation-item"><a href="/notifications"><img src="{{ URL::asset('icon/noti.png') }}"></a></li>
            <li style="margin:0;" class="navigation-item"><a href="/profiles"><img src="{{ URL::asset('icon/profile.png') }}"></a></li>
          @elseif($uri=="browse")
            <li style="margin:0;" class="navigation-item"><a href="/home"><img src="{{ URL::asset('icon/home.png') }}"></a></li>
            <li style="margin:0;" class="navigation-item active"><a href="/browse"><img src="{{ URL::asset('icon/search.png') }}"></a></li>
            <li style="margin:0;" class="navigation-item"><a href="/locations"><img src="{{ URL::asset('icon/create.png') }}"></a></li>
            <li style="margin:0;" class="navigation-item"><a href="/notifications"><img src="{{ URL::asset('icon/noti.png') }}"></a></li>
            <li style="margin:0;" class="navigation-item"><a href="/profiles"><img src="{{ URL::asset('icon/profile.png') }}"></a></li>
          @elseif($uri=="locations")
            <li style="margin:0;" class="navigation-item"><a href="/home"><img src="{{ URL::asset('icon/home.png') }}"></a></li>
            <li style="margin:0;" class="navigation-item"><a href="/browse"><img src="{{ URL::asset('icon/search.png') }}"></a></li>
            <li style="margin:0;" class="navigation-item active"><a href="/locations"><img src="{{ URL::asset('icon/create.png') }}"></a></li>
            <li style="margin:0;" class="navigation-item"><a href="/notifications"><img src="{{ URL::asset('icon/noti.png') }}"></a></li>
            <li style="margin:0;" class="navigation-item"><a href="/profiles"><img src="{{ URL::asset('icon/profile.png') }}"></a></li>
          @elseif($uri=="profiles")
            <li style="margin:0;" class="navigation-item"><a href="/home"><img src="{{ URL::asset('icon/home.png') }}"></a></li>
            <li style="margin:0;" class="navigation-item"><a href="/browse"><img src="{{ URL::asset('icon/search.png') }}"></a></li>
            <li style="margin:0;" class="navigation-item"><a href="/locations"><img src="{{ URL::asset('icon/create.png') }}"></a></li>
            <li style="margin:0;" class="navigation-item"><a href="/notifications"><img src="{{ URL::asset('icon/noti.png') }}"></a></li>
            <li style="margin:0;" class="navigation-item active"><a href="/profiles"><img src="{{ URL::asset('icon/profile.png') }}"></a></li>
          @elseif($uri=="notifications")
            <li style="margin:0;" class="navigation-item"><a href="/home"><img src="{{ URL::asset('icon/home.png') }}"></a></li>
            <li style="margin:0;" class="navigation-item"><a href="/browse"><img src="{{ URL::asset('icon/search.png') }}"></a></li>
            <li style="margin:0;" class="navigation-item"><a href="/locations"><img src="{{ URL::asset('icon/create.png') }}"></a></li>
            <li style="margin:0;" class="navigation-item active "><a href="/notifications"><img src="{{ URL::asset('icon/noti.png') }}"></a></li>
            <li style="margin:0;" class="navigation-item"><a href="/profiles"><img src="{{ URL::asset('icon/profile.png') }}"></a></li>
          @endif
        </ul>

    </div>
</div>
