<div class="container mx-auto">
    <h2 class="text-center md:text-left lg:text-left">Derniers Articles : </h2>

    @if ($page->count() > 0)
        @foreach ($page->take(9)->chunk(3) as $chunk)
            <div class="flex flex-wrap ">
                @foreach ($chunk as $item)
                    <div class="md:w-1/3 md:pr-6 pt-6 mx-auto">
                        <article class="home_thumbnail bg-transparent rounded shadow">
                            <div class="max-w-full overflow-hidden rounded-t">
                                <a href="{{ route('site.page', ['type' => 'page', 'slug' => $item->slug]) }}"
                                    title="{{ config('myconfig.site_owner') }}_article_{{ $item->slug }}">
                                    <img src="{{ asset($item->thumbnail) }}" alt="thumbnail_{{ $item->slug }}"
                                        class="w-full" />
                                </a>
                            </div>
                            <h3 class="pl-3 pt-3">
                                <a href="{{ route('site.page', ['type' => 'page', 'slug' => $item->slug]) }}"
                                    class="text-gray-900 text-decoration-none font-bold">
                                    {{ Str::limit($item->title, $limit = 43, $end = '...') }}
                                </a>
                            </h3>
                            <p class="pl-3 pb-3 text-gray-600 "><small>Rédigé le {{ $item->created_at->format('Y-m-d') }},
                                    par <span class="text-red-400">{{ $item->author }}</span></small></p>
                        </article>
                    </div>
                @endforeach
            </div>
        @endforeach
    @else
        <p class="h1 mt-5 text-center">Il n'y a pas encore d'article à ce jour... <a
                href="{{ route('admin.index') }}">soyez le premier</a></p>
    @endif
</div>

<div class="md:w-full  text-center mt-12">
    <a href="{{ url('/page/article-index')}}" class="btn_calltoAction ">
          Voir plus  
    </a>
</div>