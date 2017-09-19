<div class="row">
    <div class="col s12 m12 l11">
        <form class="form-signin" action="{{ url('login') }}" method="post">

            <input type="hidden" name="_token" id="token" value="{{ csrf_token() }}">
            <h2 class="form-signin-heading" align="center">Please sign in</h2>

            <div class="row">
                <label for="inputEmail" class="sr-only">Email address</label>
                <input type="text" name="username" id="username" class="form-control" placeholder="Username" required autofocus>
            </div>

            <div class="row">
                <label for="inputPassword" class="sr-only">Password</label>
                <input type="password" name="password" id="password" class="form-control" placeholder="Password" required>
            </div>

            <div class="row">

                <button class="btn btn-lg btn-primary btn-block left" type="submit">Sign In</button>

                <div class="social_login">
                        <a href="{{ URL::to('login/facebook') }}">
                        <div class="facebook tooltipped" data-position="top" data-delay="50" data-tooltip="Login with facebook">
                            <div class="col s3"><i class="fa fa-facebook fa-2x"></i></div>
                        </div>
                    </a>
                </div>

                <div class="social_login tooltipped" data-position="top" data-delay="50" data-tooltip="Login with Twitter">
                    <a href="{{ URL::to('login/twitter') }}">
                        <div class="twitter">
                            <div class="col s3"><i class="fa fa-twitter fa-2x"></i></div>
                        </div>
                    </a>
                </div>

                <div class="social_login tooltipped" data-position="top" data-delay="50" data-tooltip="Login with Github">
                        <a href="{{ URL::to('login/github') }}">
                        <div class="github">
                            <div class="col s3"><i class="fa fa-github fa-2x"></i></div>
                        </div>
                    </a>
                </div>

            </div>

        </form>
    </div>
</div>

<div class="row">
    <a href="/register">Sign Up</a> | <a id="passwordreset" href="/passwordreset">Forgot Your Password</a>
</div>