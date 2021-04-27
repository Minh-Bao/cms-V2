<nav class="topbar relative  items-center py-3 px-4 " >
    <div class="container mx-auto sm:px-4 max-w-full flex flex-wrap">
        <div class=" w-11/12">
            <a class="inline-block pt-1 pb-1 mr-4 text-lg whitespace-no-wrap" href="{{config('myconfig.site_developper_url')}}" target="_blank">
                <img src="{{ asset('/images/gw-logo.png')}}" alt="logo-greenweb" width="50%">
                {{-- <span style="color:grey;"> : Sitebuilder</span> --}}
            </a>
        </div>

        <ul class="flex flex-wrap list-none pl-0 mb-0 relative text-right w-1/12">
            <div class="float-right">
                @if (isset($sitepage))
                    <li><a href="{{route('websitepage.edit',$sitepage->id)}}">Modifier la page</a></li>
                    <li><a href="{{route('websitebloc.create')}}?sitepages_id={{$sitepage->id}}">Ajouter un bloc</a></li>
                    <li style=""><a href="{{route('websitepage.index')}}">Ajouter une page</a></li>
                @endif
            </div>
            <li class="relative" style="display:none;">
                <a class=" inline-block w-0 h-0 ml-1 align border-b-0 border-t-1 border-r-1 border-l-1" data-toggle="dropdown" href="#">
                    Ajouter du contenu sur cette page
                    <span class="caret"></span>
                </a>
            </li>
            <li style="display:none;"><a href="#">Ajouter un lien au menu</a></li>
            <li style="display:none;"><a href="#">Ajouter un article</a></li>
        </ul>
    </div>
</nav>
<div class="modal" id="sitebuilder" >
    <div class="flex flex-wrap invisible" id="ici">
    </div>
</div>


<!--Custombox Stylesheets-->
    {{ Html::style('plugins/custombox-4.0.3/dist/custombox.min.css') }}
    {{ Html::style('css/sitebuilder.css') }}

<!--Custombox scripts-->
    {{ Html::script('plugins/custombox-4.0.3/dist/custombox.min.js') }}
    {{ Html::script('plugins/custombox-4.0.3/dist/custombox.legacy.min.js') }}

@section('scripts')
    <script>
        /**
     * remove html content when close the modal
     */
    document.addEventListener('custombox:overlay:close', function() {
        $('#sitebuilder').html('');
    });
    </script>
@endsection


