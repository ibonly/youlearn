<div class="col s7 m7 offset-s6 hide-on-small-only left">

    <form class="user-update" id="registration_form" action="{{ url('/user/update') }}" method="post">

        <input type="hidden" name="_token" id="token" value="{{ csrf_token() }}">
        <h2 class="form-signin-heading" align="center">Update Information</h2>
        <label for="inputEmail" class="sr-only">Username</label>
        <input type="text" name="username" id="username" class="form-control" value="{{ $users->username }}" readonly="true" required autofocus>
        <br />
        <label for="inputEmail" class="sr-only">Email address</label>
        <input type="email" name="email" id="email" value="{{ $users->email }}" class="form-control" placeholder="Email" required autofocus>
        <br />
        <label for="inputPassword" class="sr-only">Password</label>
        <input type="password" name="password" id="password" class="form-control" placeholder="Password" required>
        <br />

        <button class="btn btn-lg btn-primary btn-block" name="submit" type="submit">Update</button>

    </form>

</div>

<div class="col s7 m4 offset-s6 hide-on-small-only right" align="center">

    <div class="row">
        <img src="{{ $users->avatar->avatarURL }}" width="100%">
    </div>
    <form id="upload-avatar"  action="{{ url('/user/avatar') }}" method="post" enctype="multipart/form-data">

        <input type="hidden" name="_token" id="token" value="{{ csrf_token() }}">
        <input type="hidden" name="user_id" id="user_id" value="{{ $users->id }}">

        <div class="row">
            <input type="file" name="avatar" id="favatar" accept="image/*" placeholder="Upload Your Avatar" required />
        </div>

        <div class="row">
            <button class="btn btn-lg btn-primary btn-block" type="submit">Upload</button>
        </div>

    </form>

</div>