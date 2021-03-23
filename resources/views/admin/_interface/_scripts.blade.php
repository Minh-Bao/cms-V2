<!-- Bootstrap Core Js -->
{{ Html::script('plugins/bootstrap/js/bootstrap.js') }}

<!-- Slimscroll Plugin Js -->
{{ Html::script('plugins/jquery-slimscroll/jquery.slimscroll.js') }}

<!-- masked inputs -->
{!! Html::script('plugins/input-mask/jquery.inputmask.bundle.min.js') !!}

<!-- Typeahead -->
{{ Html::script('bootstrap/js/bootstrap3-typeahead.min.js') }}

{!! Html::script('plugins/jQueryUI/jquery.mockjax.js') !!}

<!-- FastClick -->
{{ Html::script('plugins/fastclick/fastclick.js') }}

<!-- Waves Effect Plugin Js -->
{{ Html::script('plugins/node-waves/0.7.6/waves.min.js') }}

<!-- Select2 -->
{!! Html::script('plugins/select2/4.0.6/select2.min.js') !!}
{!! Html::script('plugins/select2/i18n/fr.js') !!}

<!-- Bootstrap Datepicker -->
{!! Html::script('plugins/bootstrap-datepicker/1.6.4/js/bootstrap-datepicker.min.js') !!}
{!! Html::script('plugins/bootstrap-datepicker/1.6.4/locales/bootstrap-datepicker.fr.min.js') !!}

<!-- bar-rating -->
{!! Html::script('plugins/bar-rating/jquery.barrating.min.js') !!}

<!-- Trumbowyg -->
{!! Html::style('plugins/trumbowyg/dist/ui/trumbowyg.css') !!}
{!! Html::script('plugins/trumbowyg/dist/trumbowyg.min.js') !!}
{!! Html::script('plugins/trumbowyg/dist/langs/fr.min.js') !!}

<!-- Session-timeout-idle -->
{{ Html::script('plugins/session-timeout/jquery.idletimeout.js') }}
{{ Html::script('plugins/session-timeout/jquery.idletimer.js') }}

<!-- Custom Js -->
{{ Html::script('js/sidebar.js') }}
{{ Html::script('js/admin.js') }}
{{ Html::script('js/main.js') }}

<script src="https://cdnjs.cloudflare.com/ajax/libs/alpinejs/2.8.1/alpine.js" integrity="sha512-b9Ky6j5vwZQAJ0sS9MicOFpkzN8wY6Yjkxap5UaNC4T3MDAzUBN0K6goEFGwN3eNfk4IbqQ8LvnSPnlothE0Bg==" crossorigin="anonymous"></script>
<script src="https://cdnjs.cloudflare.com/ajax/libs/alpinejs/2.8.1/alpine-ie11.js" integrity="sha512-FtGbdwKSYg7aiiEdB4G2mqonZTZ7P7F8mhdhUREueS0tcOPU595npejn81eGarP4yzAJtAiE1cIf8WZ6uKBAgw==" crossorigin="anonymous"></script>
<script src="https://cdnjs.cloudflare.com/ajax/libs/alpinejs/2.8.1/alpine-ie11.min.js" integrity="sha512-FeBN5CYKiIw2XHMxsRFNlXgSr7PDHrbH0wxa1AHjwGL/LqSDux/XEOrkQM0VRKwFCeGnCgTNpFQ3whyb8BUyMA==" crossorigin="anonymous"></script>

<script>

 var scrollTo = function(identifier, speed) {
    $('html, body').animate({
        scrollTop: $(identifier).offset().top
    }, speed || 1000);
}

</script>



<!-- Modal Control -->

<script type="text/javascript">

$(document).ready(function(){
    $.ajaxSetup({
      headers: {
        'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
      }
    });
});
</script>



<script>

$(function () {
    $('.js-animations').bind('change', function () {

        var animation = $(this).val();

        $('.js-animating-object').animateCss(animation);
    });
});



$.fn.extend({
    animateCss: function (animationName) {
        var animationEnd = 'webkitAnimationEnd mozAnimationEnd MSAnimationEnd oanimationend animationend';
        $(this).addClass('animated ' + animationName).one(animationEnd, function() {
            $(this).removeClass('animated ' + animationName);
        });
    }
});

</script>





<script>







</script>



<script>

  window.Laravel = <?php echo json_encode([

    'csrfToken' => csrf_token(),

  ]); ?> 

</script>





