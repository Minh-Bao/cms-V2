<!-- Bloc du Feed instagram -->

@if ($bloc->title)
    <h2 class="title_home">{{$bloc->title}} </h2>
    
@endif

{{-- <div class="container bloc ">
    {!! $bloc->content !!}
</div>   --}}  

<div id="instafeed" class="row p-5 mt50 "></div>
<div id="insta_error_msg" style="display:none;">Instagram : une erreur est survenue lors du chargement des images.... Veuillez reessayer plus tard.</div>
    

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



