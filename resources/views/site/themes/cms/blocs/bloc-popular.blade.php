<!-- Bloc des pages les plus cliquées -->

<h2 class="title_home">Populaire cette semaine : </h2>


<div class="flex flex-wrap  p-12 " >
    @foreach ($bestpage as $item)
    <div class="md:w-1/4 pr-4 pl-4 flex items-center">
        <div class="popular_pastille">
            <div class="round_pastille">{{$item->count}}</div>
            <a href="{{route('site.page' , ['type' => 'page', 'slug' => $item->slug]) }}" title="best_article_{{ $item->slug }}">
                <img src="{{ url('/images/miniThumb').'/' . $item->title_img . '.jpg' }}" alt="rounded_thumbnail_{{ $item->slug }}" class="circle_img" />
            </a>
        </div>
            <div style="margin-left:15px;">
                 {{ Str::limit($item->title, $limit = 90, $end = '...') }}  <br>
                <p style="color: #ce4963">{{$item->created_at}}</p>
            </div>
        </div>   
    @endforeach 
</div>