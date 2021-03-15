<!-- Bloc derniers articles -->

<div class="container mx-auto">
    <h2 class="mx-auto">Derniers Articles : </h2>
</div>


@if ($page->count() > 0)
    @foreach ($page->take(9)->chunk(3) as $chunk)
        <div class="flex flex-wrap p-8">
            @foreach ($chunk as $item)
                <div class="md:w-1/3 pr-4 pl-4">
                    <article class="home_thumbnail bg-transparent rounded shadow">
                        <div class="max-w-full overflow-hidden rounded-t">
                            <a href="{{ route('site.page', ['type' => 'page', 'slug' => $item->slug]) }}"
                                title="{{ config('myconfig.site_owner') }}_article_{{ $item->slug }}">
                                <img src="{{ url('/' . $item->thumbnail) }}" alt="thumbnail_{{ $item->slug }}"
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
<div class="md:w-full pr-4 pl-4 text-center">
    <a href="{{ url('/') . '/page/article-index' }}" class="btn_calltoAction" role="button" aria-disabled="true"
        width="15%" height="125%">Voir plus</a>
</div>




<!-- Bloc des pages les plus cliquées -->
<div class="container mx-auto mt-12">
    <h2>Populaire cette semaine : </h2>
</div>


<div class="flex flex-wrap  p-12 ">
    @foreach ($bestpage as $item)
        <div class="w-1/4 pr-4 pl-4 flex items-center">
            <div class="popular_pastille">
                <div class="round_pastille">{{ $item->count }}</div>
                <a href="{{ route('site.page', ['type' => 'page', 'slug' => $item->slug]) }}"
                    title="best_article_{{ $item->slug }}">
                    <img src="{{ url('/images/miniThumb') . '/' . $item->title_img . '.jpg' }}"
                        alt="rounded_thumbnail_{{ $item->slug }}" class="circle_img" />
                </a>
            </div>
            <div style="margin-left:15px;">
                {{ Str::limit($item->title, $limit = 85, $end = '...') }} <br>
                <p style="color: #ce4963">{{ $item->created_at }}</p>
            </div>
        </div>
    @endforeach
</div>

<!-- Bloc du Feed instagram -->
<div class="container mx-auto mt-12">
    <h2 class="mb-7">Suivez nous sur Instagram : </h2>

    <ul id="instafeed" class="grid grid-cols-1 gap-6 sm:grid-cols-2 md:grid-cols-3 lg:grid-cols-4"></ul>
    <div id="insta_error_msg" style="display:none;">Instagram : une erreur est survenue lors du chargement des
        images.... Veuillez reessayer plus tard.</div>

</div>


<script type="text/javascript" src="{{ url('/') . '/plugins/instafeed.js-master/dist/instafeed.min.js' }}"></script>

<script type="text/javascript">
    var feed = new Instafeed({
        accessToken: '{{ config('myconfig.insta_access_token') }}',
        limit: 12,
        after: function() {
            var container = document.getElementById('instafeed');
            for (var i = 0; i < container.children.length; i++) {
                var parent = container.children;
                for (var j = 0; j < parent.length; j++) {
                    var child_img = parent[j].children;
                    child_img[0].setAttribute("class", "shadow  bg-white rounded-lg ");
                    parent[j].setAttribute('target', '_blank');
                }
            }
        },
        error: function() {
            document.getElementById('insta_error_msg').style.display = "block";
        }
    });
    feed.run();

</script>
