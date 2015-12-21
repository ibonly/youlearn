<div class="row">


    @forelse($videos as $video)

    <div id="show-video" class="s12">
        <img src="http://i1.ytimg.com/vi/{{ $video->url }}/hqdefault.jpg" width="100%" class="img-responsive" alt="">
        <div id="title" class="truncate">{{ $video->title }}</div>
        <a class="waves-effect waves-light btn" href="/play/{{ $video->slug }}"><i class="material-icons left">visibility</i>view</a><br />
                @can( 'see-edit', $video )
                    <a href="/video/{{ $video->slug }}/edit">EDIT</a>
                @endcan
            <br />
    </div>

    @empty

        <p>No video to play</p>

    @endforelse

</div>

<div class="portfolio-pagination">
    <ul class="pagination">
        {!! $videos->render() !!}
    </ul>
</div>