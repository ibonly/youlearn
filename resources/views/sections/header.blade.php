<nav class="white" role="navigation">

    <div class="nav-wrapper container">
        <a id="logo-container" href="/" class="brand-logo"><img src="{!! load_asset('images/nlogo.png') !!}" width="40%" /></a>

        <ul class="right hide-on-med-and-down">
            <li>
                <form action="/search" method="post">
                <input type="hidden" name="_token" value="{{ csrf_token() }}">
                <div class="input-field">
                <input id="search" name="search" type="search" required>
                <label for="search"><i class="material-icons">search</i></label>
                <i class="material-icons">close</i>
                </div>
                </form>
            </li>

            <li><a href="/">Home</a></li>

            @if( Auth::check() )

                <li><img src="{{ Auth::user()->avatar->avatarURL }}" width="10%" id="avatar" /></li>
                <li id="user-nav"><a href="#">{{ Auth::user()->username }}</a>
                    <ul>
                        <li><a href="/user/details">My Profile</a></li>
                        <li><a href="/user/videos">My Videos</a></li>
                        <li><a class="active" href="/logout">Logout</a></li>
                  </ul>
                </li>

            @else

                <li><a href="/login">Login</a></li>
                <li><a href="/register">Register</a></li>

            @endif

        </ul>

        <ul class="side-nav" id="nav-mobile">
            <li><a href="/">Home</a></li>

            @if( Auth::check())

                <li><a href="/user/details">My Profile</a></li>
                <li><a href="/user/videos">My Videos</a></li>
                <li><a class="active" href="/logout">Logout</a></li>
            @else

                <li><a href="/login">Login</a></li>
                <li><a href="/register">Register</a></li>

            @endif

        </ul>
        <a href="#" data-activates="nav-mobile" class="button-collapse"><i class="material-icons">menu</i></a>

    </div>

</nav>
