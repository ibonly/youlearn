<h5><center>Video Categories</center></h5>

<div class="collection">

    @foreach($categories as $category)

        <a href="/category/{{ $category->name }}" class="collection-item">{{ $category->name }}<span class="badge">{{ $category->videos->count() }}</span></a>

    @endforeach

</div>