<!-- Bloc des pages les plus cliquées -->
<div class="container mx-auto mt-12  ">
    <h2 class="mb-12 text-center md:text-left">Populaire cette semaine : </h2>

    <div class="flex flex-wrap">
        @foreach ($bestpage as $item)
            <div class="w-1/2 md:w-1/4 lg:w-1/4 md:flex lg:flex items-center">
                <div class="popular_pastille">
                    <div class="round_pastille">{{ $item->count }}</div>
                    <a href="{{ route('site.page', ['type' => 'page', 'slug' => $item->slug]) }}"
                        title="best_article_{{ $item->slug }}">
                        <img src="{{ asset('/images/miniThumb' . '/' . $item->title_img . '.jpg' ) }}"
                            alt="rounded_thumbnail_{{ $item->slug }}" class="circle_img" />
                    </a>
                </div>
                <div style="margin-left:15px;">
                    {{ Str::limit($item->title, $limit = 85, $end = '...') }} <br>
                    <p class="text-shadow-lg" style="color: #ce4963">{{ $item->created_at }}</p>
                </div>
            </div>
        @endforeach
    </div>
</div>
