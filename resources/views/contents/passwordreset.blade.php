<div class="mid-form">

    <h2 align="center">Reset your password</h2>

    <p align="center"><hint>Your password reset link will be sent to the email provided</hint></p>

    <form id="password_reset_form" action="/password/email" method="post">

        <input type="hidden" id="token" name="_token" value="{{ csrf_token() }}">

        <div class="input-field">
            <i class="material-icons prefix">turned_in_not</i>
            <input id="email" type="email" name="email" value="{{ old('email') }}" required>
            <label for="email">Email</label>
        </div>

        <div class="row container">
            <button type="submit" id="submit_reset" class="waves-effect waves-light btn right">
                Reset
            </button>
        </div>

    </form>

</div>
