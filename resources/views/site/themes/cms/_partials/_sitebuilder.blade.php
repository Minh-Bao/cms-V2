<nav class="topbar relative flex flex-wrap items-center content-between py-3 px-4 navbar-inverse" style="background-color: rgb(224, 224, 217); margin-bottom:1%;">
    <div class="container mx-auto sm:px-4 max-w-full mx-auto sm:px-4">
        <div class="navbar-header">
            <a class="inline-block pt-1 pb-1 mr-4 text-lg whitespace-no-wrap" href="{{config('myconfig.site_developper_url')}}" target="_blank">
                <img src="{{url('/')}}/images/gw-logo.png" alt="logo-greenweb" width="50%">
                <span style="color:grey;"> : Sitebuilder</span>
            </a>
        </div>

        <ul class="flex flex-wrap list-none pl-0 mb-0 flex flex-wrap list-reset pl-0 mb-0 relative">
            @if (isset($sitepage))
                <li><a href="{{route('websitepage.edit',$sitepage->id)}}">Modifier cette page *</a></li>
                <li><a href="{{route('websitebloc.create')}}?sitepages_id={{$sitepage->id}}">Ajouter un bloc **</a></li>
                <li style="display:none;"><a href="{{route('websitepage.index')}}">Ajouter une page</a></li>
            @endif
            <li class="relative" style="display:none;">
                <a class=" inline-block w-0 h-0 ml-1 align border-b-0 border-t-1 border-r-1 border-l-1" data-toggle="dropdown" href="#">
                    Ajouter du contenu sur cette page
                    <span class="caret"></span>
                </a>
                <ul class=" absolute left-0 z-50 float-left hidden list-reset	 py-2 mt-1 text-base bg-white border border-gray-300 rounded">
                    <li><a href="#">Page 1-1</a></li>
                    <li><a href="#">Page 1-2</a></li>
                    <li><a href="#">Page 1-3</a></li>
                </ul>
            </li>
            <li style="display:none;"><a href="#">Ajouter un lien au menu</a></li>
            <li style="display:none;"><a href="#">Ajouter un article</a></li>
        </ul>
    </div>
</nav>



{{ Html::style('plugins/custombox-4.0.3/dist/custombox.min.css') }}
{{ Html::script('plugins/custombox-4.0.3/dist/custombox.min.js') }}
{{ Html::script('plugins/custombox-4.0.3/dist/custombox.legacy.min.js') }}


    <div class="modal" id="sitebuilder" tabindex="-1" role="dialog">
        <div class="flex flex-wrap " id="ici">
            <center>Chargement en cours</center>
        </div>
    </div>

<style>

#sitebuilder {
  -webkit-transition: width 2s; /* For Safari 3.1 to 6.0 */
}

.hide-me .show-me {
  width:100%;
  text-align: center;
  display:none;
  position:absolute;
}

.hide-me:hover .show-me {
  display:block;
}

.elem, .bloc , .page , .article, .slider , .partenaire{
    border: 3px dashed rgba(255, 255, 255, .0);
}

.elem:hover, .bloc:hover , .page:hover , .article:hover, .slider:hover , .partenaire:hover {
    z-index:1000;
    cursor:pointer;
    border-style: dashed;
    border-color:#999;
}

.topbar {
  position: fixed;
  width:100%;
  z-index:1000;
  color:#fff;
  background-color:#000;
  padding: 2px 2px 2px 10px;
  bottom:-20px;
}

.topbar a {
  margin-left:20px;
}

body {
  margin-bottom:50px;
}

</style>

<script>

$(document).ready(function(){
  var modal = new Custombox.modal({
    content: {
      effect: 'fadein',
      target: '#sitebuilder'
    }
});

 $('.bloc').click(function(){
     var element = $(this).attr("name");
     var object = $(this).attr("value");
     console.log('{{route('sitebuilder')}}?part=bloc&object='+object+'&elem='+element);
     $('#sitebuilder').html('');
      $('#sitebuilder').html(' <div class="modal-dialog modal-lg" role="document"><div class="modal-content"><div class="modal-header"><center><img src="{{url('')}}/images/ajax_loader.gif" style="width:70px;"></center></div></div></div>');
     $('#sitebuilder').load('{{route('sitebuilder')}}?part=bloc&object='+object+'&elem='+element);
     modal.open();
});

$('.page').click(function(){
     var element = $(this).attr("name");
     var object = $(this).attr("value");
     console.log('{{route('sitebuilder')}}?part=page&object='+object+'&elem='+element);
     $('#sitebuilder').html('');
      $('#sitebuilder').html(' <div class="modal-dialog modal-lg" role="document"><div class="modal-content"><div class="modal-header"><center><img src="{{url('')}}/images/ajax_loader.gif" style="width:70px;"></center></div></div></div>');
     $('#sitebuilder').load('{{route('sitebuilder')}}?part=page&object='+object+'&elem='+element);
     modal.open();
});




 $('.slider').click(function(){
     var element = $(this).attr("name");
     var object = $(this).attr("value");
     $('#sitebuilder').html('');
      $('#sitebuilder').html(' <div class="modal-dialog modal-lg" role="document"><div class="modal-content"><div class="modal-header"><center><img src="{{url('')}}/images/ajax_loader.gif" style="width:70px;"></center></div></div></div>');
     $('#sitebuilder').append('{{route('sitebuilder')}}?part=slider&object='+object+'&elem='+element);
     modal.open();
     console.log(element);
  });
});

</script>



