<div class="mid-form">

    <h2 align="center">Create Your New Password</h2>

    <form class="col s12" id="new_password_form">
        <input type="hidden" name="_token" id="_token" value="{{ csrf_token() }}" />
        <input type="hidden" name="token" id="token" value="{{ $token }}" />

        <div class="row">
            <div class="input-field col s12">
                <i class="material-icons prefix">email</i>
                    <input name="email" id="email" type="email" value="{{ $email }}" class="validate" readonly="true" />
                        <label for="email">Email</label>
            </div>

            <div class="input-field col s12">
                <i class="material-icons prefix">vpn_key</i>
                    <input name="password" id="password" type="password" class="validate" required="true" />
                        <label for="email">New Password</label>
            </div>

            <div class="input-field col s12">
                <i class="material-icons prefix">vpn_key</i>
                    <input name="password_confirmation" id="password_confirmation" type="password" class="validate" required="true" />
                        <label for="email">Confirm Password</label>
            </div>

        </div>

        <div class="row container">

            <button type="submit" class="waves-effect waves-light btn right">
                Reset
            </button>

        </div>

    </form>

</div>