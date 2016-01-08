<div class="row">

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
                    <a class="waves-effect waves-light btn" href="/play/{{ $video->slug }}" id="view"><i class="material-icons left">visibility</i>view</a>
                </div>
            </div>
        </div>

    @empty

        <p>No Video under this category</p>

    @endforelse

</div>

<div class="portfolio-pagination">
    <ul class="pagination">
        {!! $videos->render() !!}
    </ul>
</div>