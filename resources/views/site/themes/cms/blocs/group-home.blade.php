<!-- Bloc derniers articles -->

<h2 class="title_home">Derniers Articles : </h2>

@if ($page->count() > 0)
    @foreach ($page->take(9)->chunk(3) as $chunk)
        <div class="row p-5" >
            @foreach($chunk as $item)
                <div class="col-md-4">
                    <article class="home_thumbnail bg-white rounded shadow">
                        <div class="mw-100 overflow-hidden rounded-top">
                            <a href="{{ route('site.page' , ['type' => 'page', 'slug' => $item->slug]) }}" title="{{config('myconfig.site_owner')}}_article_{{ $item->slug }}">
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




<!-- Bloc des pages les plus cliquées -->

<h2 class="title_home">Populaire cette semaine : </h2>


<div class="row p-5 " >
    @foreach ($bestpage as $item)
    <div class="col-md-3 d-flex align-items-center">
        <div class="popular_pastille">
            <div class="round_pastille">{{$item->count}}</div>
            <a href="{{route('site.page' , ['type' => 'page', 'slug' => $item->slug]) }}" title="best_article_{{ $item->slug }}">
                <img src="{{ url('/images/miniThumb').'/' . $item->title_img . '.jpg' }}" alt="rounded_thumbnail_{{ $item->slug }}" class="circle_img" />
            </a>
        </div>
            <div style="margin-left:15px;">
                 {{ Str::limit($item->title, $limit = 85, $end = '...') }}  <br>
                <p style="color: #ce4963">{{$item->created_at}}</p>
            </div>
        </div>   
    @endforeach 
</div>

<!-- Bloc du Feed instagram -->
<div class="container-fluid mt-5">
    <h2 class="title_home">Suivez nous sur Instagram : </h2>
    
    <div id="instafeed" class="row p-5  "></div>
    <div id="insta_error_msg" style="display:none;">Instagram : une erreur est survenue lors du chargement des images.... Veuillez reessayer plus tard.</div>

</div>
    

<script type="text/javascript" src="{{url('/').'/plugins/instafeed.js-master/dist/instafeed.min.js'}}"></script>

<script type="text/javascript">
    var feed = new Instafeed({
        accessToken: 'IGQVJXNkVIMkdDcHNLaE5wSk92WUFtTTlXaEFvd0lrUFROVWRuXy10MGJsRktzelRJSVBHRVdpQ1dxcDd0czFqMnZA1dTE5MmxMcVFYeWVYRHc4X0lSQTI0YnJzc1VEUm5sVGcwSnJNMzBIVE1zYmQzOAZDZD',
        limit: 12,
        after: function(){
                var container = document.getElementById('instafeed');
                for (var i = 0; i < container.children.length; i++) {
                    var parent = container.children;
                for(var j = 0; j<parent.length; j++){
                    var child_img = parent[j].children;
                    child_img[0].setAttribute("class", "img-thumbnail shadow  bg-white rounded img_insta");
                    parent[j].setAttribute('target', '_blank');
                    parent[j].setAttribute('class', 'col-md-3');
               }
            }
        },
        error: function(){
            document.getElementById('insta_error_msg').style.display = "block";
        }
    });
    feed.run();
</script>


    









