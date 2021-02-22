
<div class="mt-5 ">
    @if ($bloc->title)
        <div class="col-md-7 title_blog" style="margin-left: 37%;">
            <h2>{{$bloc->title}}</h2>
        </div>
    @endif

    <div class="row" style="margin:0 3% 3% 3%; ">
        <div class="col-md-4 text-center mt50">
            <div class=" bloc" name="{{$bloc->id}}" value="image">
                <img src="{{url('')}}/{{ $bloc->image }}" title="{{$bloc->title_img}}" alt="{{$bloc->alt_img}}" class="img-responsive rounded" width="100%" style="filter: drop-shadow(5px 3px 6px #2c3c3a)">
            </div>
        </div>

        <div class="col-md-8 text-left mt50 bloc " name="{{$bloc->id}}" value="content" style="text-transform: capitalize;">
            {!! $bloc->content !!}
        </div>
        
    </div>
</div>