<!-- Styles -->
<style>
    .top-right {
        position: absolute;
        right: 10px;
        top: 18px;
        
    }

    .links > a {
        color: #636b6f;
        padding: 0 25px;
        font-size: 12px;
        font-weight: 600;
        letter-spacing: .1rem;
        text-decoration: none;
        text-transform: uppercase;
    }

</style>

@if (Route::has('login'))
    <div class="top-right links">
        @if (Session::has('username'))
            <a href="{{ url('/')}}"><span style="font-size: 18px;">{{ session('username') }}</span></a>
            <a href="{{ url('/') }}">Home</a>
            <a href="{{url('/logout')}}">Logout</a>
        @else
            <a href="{{ url('/login') }}">Login</a>
        @endif
    </div>
@endif