<div class="row">
    <div class="col m12">
        <span id="edit-title">My Videos</span>
        <a href="/video/upload" class="waves-effect waves-light btn btn-small right tooltipped" data-position="top" data-delay="50" data-tooltip="ADD VIDEO"><i class="material-icons">add</i></a>
    </div>

    @forelse($videos as $video)

    <div id="show-video" class="s12">
        <div class="card">
            <div class="card-image waves-effect waves-block waves-light">
                <img src="http://i1.ytimg.com/vi/{{ $video->url }}/hqdefault.jpg" width="100%" class="img-responsive" alt="">
            </div>
            <div class="card-content">
                <span class="card-title activator grey-text text-darken-4 truncate" id="title">{{ $video->title }}</span>
            </div>
            <div class="card-reveal">
                <span class="card-title grey-text text-darken-4">Video Title<i class="material-icons right">close</i></span>
                <p>{{ $video->title }}.</p>
                <a class="waves-effect waves-light btn left" href="/play/{{ $video->slug }}" id="view"><i class="material-icons left">visibility</i></a>
                <a class="waves-effect waves-light btn right" href="/video/{{ $video->slug }}/edit"><i class="fa fa-pencil-square"></i></a>
            </div>
        </div>
    </div>

    @empty

        <p>No video to display</p>

    @endforelse

</div>

<div class="portfolio-pagination">
    <ul class="pagination">
        {!! $videos->render() !!}
    </ul>
</div>