<div class="row">

    <form class="form-signin" action="{{ url('login') }}" method="post">

        <input type="hidden" name="_token" id="token" value="{{ csrf_token() }}">
        <h2 class="form-signin-heading" align="center">Please sign in</h2>
        <label for="inputEmail" class="sr-only">Email address</label>
        <input type="text" name="username" id="username" class="form-control" placeholder="Username" required autofocus>
        <br />
        <label for="inputPassword" class="sr-only">Password</label>
        <input type="password" name="password" id="password" class="form-control" placeholder="Password" required>

        <button class="btn btn-lg btn-primary btn-block left" type="submit">Sign In</button><br />

        <div class="facebook">
            <a href="{{ URL::to('login/facebook') }}">
                <div class="col s3"><i class="fa fa-facebook fa-2x"></i></div>
                Facebook
            </a>
        </div>

        <div class="twitter">
            <a href="{{ URL::to('login/twitter') }}">
                <div class="col s3"><i class="fa fa-twitter fa-2x"></i></div>
                Twitter
            </a>
        </div>

        <div class="github">
            <a href="{{ URL::to('login/github') }}">
                <div class="col s3"><i class="fa fa-github fa-2x"></i></div>
                Github
            </a>
        </div>

    </form>

</div>

<div class="row">
    <a href="/register">Sign Up</a> | <a id="passwordreset" href="/passwordreset">Forgot Your Password</a>
</div>