<div id="play-video">

    <div class="video-container">
        <iframe id="video-frame" width="760" height="515" src="https://www.youtube.com/embed/{{ $video->url }}" frameborder="0" allowfullscreen></iframe>
    </div>

</div>

<div class="play-details">
    <div id="video-profile">
        <img src="{{ $video->avatar }}" width="100%" />
    </div>
    <div id="video">
        <div id="title">{{ $video->title }}</div>
        <b>Created on {{ date('F d, Y', strtotime($video->created_at)) }}</b><br />
        {{ $video->description }}<br />
        <b>Uploaded by:</b> {{ $video->user->username }}
    </div>
</div>