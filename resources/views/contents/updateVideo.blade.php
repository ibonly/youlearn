<h2>Video Upload</h2>
<div class="mid-form">

    <form id="video-edit" action="{{ url('/video/edit') }}" method="post">
        <input type="hidden" name="_token" id="token" value={{ csrf_token() }}>
        <input type="hidden" name="user_id" id="user_id" value="{{ Auth::user()->id }}" />
        <input type="hidden" name="video_id" id="video_id" value="{{$video->id}}">
        <div class="input-field col s12">
            <select id="category_id" name="category_id" class="form-control">
                <option value="" disabled selected>Choose your option</option>
            @foreach($categories as $category)
                @if( $category->id == $video->category_id) )
                    <option value="{{ $category->id }}" selected="true"> {{ $category->name }}</option>
                @endif
                <option value="{{ $category->id }}"> {{ $category->name }}</option>
            @endforeach
            </select>
            <label>Select Title</label>
        </div>
        <label for="title" class="sr-only">Video Title</label>
        <input type="text" name="title" id="title" value="{{ $video->title }}" class="form-control" required autofocus><br />

        <label for="url" class="sr-only">Youtube Video URL</label>
        <input type="text" name="url" id="url" value="https://www.youtube.com/watch?v={{ $video->url }}" readonly class="form-control" required autofocus><br />

        <label for="description" class="sr-only">Video Description</label>
        <input type="text" name="description" id="description" value="{{ $video->description }}" class="form-control" required autofocus><br />

        <button class="btn btn-lg btn-primary btn-block left" name="submit" type="submit">Update</button>

        <a href="/users/{{ $video->id }}/videos " data-id="{{ $video->id }}" data-token="{{ csrf_token() }}" data-title="{{ $video->title }}" id="deleteVideo">DELETE</a>


    </form>

</div>