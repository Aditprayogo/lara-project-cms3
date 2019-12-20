<nav id="colorlib-main-menu" role="navigation">
    <ul>
        <li><a href="{{ Route('home.index') }}">Home</a></li>
        {{-- <li><a href="fashion.html">Fashion</a></li> --}}
        {{-- <li><a href="travel.html">Travel</a></li> --}}
        <li><a href="{{ Route('about.index') }}">About</a></li>
        <li><a href="{{ Route('contact.index') }}">Contact</a></li>
{{--         
       @guest
            <li><a href="{{url('login')}}">Login</a></li>
            <li><a href="{{url('register')}}">Register</a></li>
       @endguest --}}
        
    </ul>
</nav>