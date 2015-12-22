<div class="row">

    @forelse($videos as $video)

        <div id="show-video">
            <img src="http://i1.ytimg.com/vi/{{ $video->url }}/hqdefault.jpg" width="100%" class="img-responsive" alt="">
            <div id="title" class="truncate">{{ $video->title }}</div>
            <a class="waves-effect waves-light btn" href="/play/{{ $video->slug }}"><i class="material-icons left">visibility</i>view</a><br />
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