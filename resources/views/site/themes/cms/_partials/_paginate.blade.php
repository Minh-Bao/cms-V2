<!--Bloc paginate-->

@isset($next)
    @if ($next == "nonext")
        <div id="pagination"  style="width:63%;"
            class=" pl-4 pink_nc mx-12 pr-12 border border-t-2 border-pink-450" >
            <div style="display:flex; justify-content: space-evenly;margin-bottom:5%;padding-top:2%" >
                <a style="color:rgb(168, 19, 76) !important" href="{{url('/').'/page/'.$prev}}">Article précédent > </a>
            </div>
        </div>
    @else
        @if ($prev == "noprev")
            <div id="pagination" style="width:63%;"
                class=" pl-4 pink_nc mx-12 pr-12 border-t-2 border-pink-450" >
                <div style="display:flex; justify-content: space-evenly;margin-bottom:5%;padding-top:2%" >
                    <a style="color:rgb(168, 19, 76) !important" href="{{url('/') . '/page/'.$next}}">< Article suivant </a>
                </div>
            </div>
        @else
            <div id="pagination" style="width:63%;"
                class= "pl-4 pink_nc m-12 pr-12 border-t-2 border-pink-450" >
                <div style="display:flex; justify-content: space-evenly;margin-bottom:5%;padding-top:2%" >
                    <a style="color:rgb(168, 19, 76) !important" href="{{url('/') .'/page/'.$next}}">< Article suivant </a>
                    <a style="color:rgb(168, 19, 76) !important" href="{{url('/').'/page/'.$prev}}"> Article précédent ></a>
                </div>
            </div>    
        @endif
    @endif
@endisset


