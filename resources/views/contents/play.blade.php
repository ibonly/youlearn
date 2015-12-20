<div id="play-video">

    <iframe id="video" width="760" height="515" src="https://www.youtube.com/embed/{{ $video->url }}" frameborder="0" allowfullscreen></iframe>

</div>

<div class="play-details">
    <div id="video">
        <b>Title:</b> {{ $video->title }}<br />
        <b>Description:</b> {{ $video->description }}<br />
        <b>Uploaded by:</b> {{ $video->user->username }}<br />
        <b>Date created:</b> {{ $video->created_at }}
    </div>
</div>