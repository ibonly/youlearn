<h5><center>Video Categories</center></h5>

<div class="collection">

    @foreach($categories as $category)

        <a href="/category/{{ $category->name }}" class="collection-item">{{ $category->name }}<span class="badge">{{ $category->videos->count() }}</span></a>

    @endforeach

</div>

Recently Added
<ul class="recent-list">
    @foreach($recent as $recent)
        <li>
            <a href="/play/{{ $recent->slug }}">
                <img src="http://i1.ytimg.com/vi/{{ $recent->url }}/hqdefault.jpg" alt="">
                <div id="side_title">
                    <span style="font-weight: bold;">{{ $recent->title }}</span><br />
                    <small>By {{ $recent->user->username }}</small>
                </div>
            </a>
        </li>
    @endforeach
</ul>