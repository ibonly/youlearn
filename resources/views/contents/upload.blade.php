<h2>Video Upload</h2>
<div class="mid-form">

    <form id="video-upload" action="{{ url('/video/upload') }}" method="post">
        <input type="hidden" name="_token" id="token" value={{ csrf_token() }}>
        <input type="hidden" name="user_id" id="user_id" value="{{ Auth::user()->id }}" />
        <input type="hidden" name="video_id" id="video_id">
        <div class="input-field col s12">
            <select id="category_id" name="category_id" class="form-control">
                <option value="" disabled selected>Choose your option</option>
            @foreach($categories as $category)
                <option value="{{ $category->id }}"> {{ $category->name }}</option>
            @endforeach
            </select>
            <label>Select Title</label>
        </div>
        <label for="title" class="sr-only">Video Title</label>
        <input type="text" name="title" id="title" class="form-control" required autofocus><br />

        <label for="url" class="sr-only">Youtube Video URL</label>
        <input type="text" name="url" id="url" class="form-control" required autofocus><br />

        <label for="description" class="sr-only">Video Description</label>
        <input type="text" name="description" id="description" class="form-control" required autofocus><br />

        <button class="btn btn-lg btn-primary btn-block" name="submit" type="submit">Submit</button>

    </form>

</div>