<!-- Bloc  articles -->

<div class="w-full ml-12">
    <h2 class="">Listes articles en ligne : </h2>
</div>
@if ($page->count() > 0)
    @foreach ($page->chunk(3) as $chunk) 
        <div class="flex flex-wrap  p-12" >
            @foreach($chunk as $item)
                <div class="md:w-1/3 pr-4 pl-4">
                    <article class="home_thumbnail bg-white rounded shadow">
                        <div class="max-w-full overflow-hidden rounded-t">
                            <a href="{{route('site.page' , ['type' => 'page', 'slug' => $item->slug]) }}" title="{{config('myconfig.site_owner')}}_article_{{ $item->slug }}">
                                <img src="{{ asset($item->thumbnail) }}" alt="thumbnail_{{ $item->slug }}" class="w-full"/>
                            </a>
                        </div>
                        <h2 class="h5 pl-3 pt-3">
                            <a href="{{route('site.page' , ['type' => 'page', 'slug' => $item->slug]) }}" class="text-gray-900 text-decoration-none font-bold">
                                {{ Str::limit($item->title, $limit = 43, $end = '...') }}
                            </a>
                        </h2>
                            <p class="pl-3 pb-3 text-gray-700 "><small>Rédigé le {{$item->created_at->format('Y-m-d') }},  par {{$item->author}}</small></p>
                    </article>
                </div>
            @endforeach
        </div>
    @endforeach
    @else
    <p class="h1 mt-5 text-center">Il n'y a pas encore d'article à ce jour... <a href="{{ route('admin.index') }}">soyez le premier</a></p>
@endif
<div class="link-paginate flex flex-wrap  ">
    <div class=" m-auto">
        {{$page->links()}}
    </div>
</div>
