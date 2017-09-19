<div class=" row mid-form">
    <div class="col s12 m12 l11">

        <form class="form-signup" id="registration_form" action="{{ url('register') }}" method="post">

            <input type="hidden" name="_token" id="token" value="{{ csrf_token() }}">
            <h2 class="form-signin-heading" align="center">Registration Form</h2>
            <label for="inputEmail" class="sr-only">Username</label>
            <input type="text" name="username" id="username" class="form-control" placeholder="Username" required autofocus>
            <br />
            <label for="inputEmail" class="sr-only">Email address</label>
            <input type="email" name="email" id="email" class="form-control" placeholder="Email" required autofocus>
            <br />
            <label for="inputPassword" class="sr-only">Password</label>
            <input type="password" name="password" id="password" class="form-control" placeholder="Password" required>
            <br />
            <input type="hidden" name="avatar" id="avatar" value="{!! asset('/images/default.png') !!}" />

            <div class="row">
                <button class="btn btn-lg btn-primary btn-block left" name="submit" type="submit">Sign Up</button>

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
    <a href="/login">Sign In</a> | <a href="/passwordreset">Forgot Your Password</a>
</div>
