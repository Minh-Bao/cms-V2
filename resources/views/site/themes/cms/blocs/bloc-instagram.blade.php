<!-- Bloc du Feed instagram -->



<div class="container mx-auto mt-12">
    @if ($bloc->title)
        <h2 class="mb-7 text-center md:text-left">{{$bloc->title}} </h2>
    @endif

    <ul id="instafeed" class="grid grid-cols-1 gap-6 sm:grid-cols-2 md:grid-cols-3 lg:grid-cols-4"></ul>
    <div id="insta_error_msg" style="display:none;">Instagram : une erreur est survenue lors du chargement des
        images.... Veuillez reessayer plus tard.
    </div>
</div>
    

<script type="text/javascript" src="{{ asset('/plugins/instafeed.js-master/dist/instafeed.min.js') }}"></script>
<script type="text/javascript" src="{{ asset('/js/instafeed-main.js') }}"></script>




