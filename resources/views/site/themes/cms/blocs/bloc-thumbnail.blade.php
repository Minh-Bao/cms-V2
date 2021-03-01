<!-- Bloc derniers articles -->

<h2 class="title_home">Derniers Articles : </h2>

@if ($page->count() > 0)
    @foreach ($page->take(9)->chunk(3) as $chunk)
        <div class="row p-5" >
            @foreach($chunk as $item)
                <div class="col-md-4">
                    <article class="home_thumbnail bg-white rounded shadow">
                        <div class="mw-100 overflow-hidden rounded-top">
                            <a href="{{route('site.page' , ['type' => 'page', 'slug' => $item->slug]) }}" title="{{config('myconfig.site_owner')}}_article_{{ $item->slug }}">
                                <img src="{{ url('/').'/'.$item->thumbnail }}" alt="thumbnail_{{ $item->slug }}" class="w-100"/>
                            </a>
                        </div>
                        <h2 class="h5 pl-3 pt-3">
                            <a href="{{route('site.page' , ['type' => 'page', 'slug' => $item->slug]) }}" class="text-dark text-decoration-none font-weight-bold">
                                {{ Str::limit($item->title, $limit = 43, $end = '...') }}
                            </a>
                        </h2>
                        <p class="pl-3 pb-3 text-muted "><small>Rédigé le {{$item->created_at->format('Y-m-d') }},  par {{$item->author}}</small></p>
                    </article>
                </div>
            @endforeach
        </div>
    @endforeach
    @else
    <p class="h1 mt-5 text-center">Il n'y a pas encore d'article à ce jour... <a href="{{ route('admin.index') }}">soyez le premier</a></p>
@endif
<div class="col-md-12 text-center">
    <a href="{{url('/').'/page/article-index'}}" class="btn_calltoAction" role="button" aria-disabled="true" width="15%" height="125%">Voir plus</a>
</div>