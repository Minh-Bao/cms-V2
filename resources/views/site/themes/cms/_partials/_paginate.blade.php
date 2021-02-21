<!--Bloc paginate-->

@if ($next == "nonext")
    <div id="pagination" class="col-md-8 pink_nc" style="border-top: 3px solid #ce4963;width:63%;margin-left:3%;">
        <div style="display:flex; justify-content: space-evenly;margin-bottom:5%;padding-top:2%" >
            <a style="color:rgb(168, 19, 76) !important" href="{{url('/').'/page/'.$prev}}">Article précédent > </a>
        </div>
    </div>
@else
    @if ($prev == "noprev")
        <div id="pagination" class="col-md-8 pink_nc" style="border-top: 3px solid #ce4963;width:63%;margin-left:3%;">
            <div style="display:flex; justify-content: space-evenly;margin-bottom:5%;padding-top:2%" >
                <a style="color:rgb(168, 19, 76) !important" href="{{url('/').'/page/'.$next}}">< Article suivant </a>
            </div>
        </div>
    @else
        <div id="pagination" class="col-md-8 pink_nc" style="border-top: 3px solid #ce4963;width:63%;margin-left:3%;">
            <div style="display:flex; justify-content: space-evenly;margin-bottom:5%;padding-top:2%" >
                <a style="color:rgb(168, 19, 76) !important" href="{{url('/').'/page/'.$next}}">< Article suivant </a>
                <a style="color:rgb(168, 19, 76) !important" href="{{url('/').'/page/'.$prev}}"> Article précédent ></a>
            </div>
        </div>    
    @endif
@endif

