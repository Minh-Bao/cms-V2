
<script src="https://code.jquery.com/jquery-3.6.0.min.js" integrity="sha256-/xUj+3OJU5yExlq6GSYGSHk7tPXikynS7ogEvDej/m4=" crossorigin="anonymous"></script>
<script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.14.6/umd/popper.min.js" integrity="sha384-wHAiFfRlMFy6i5SRaxvfOCifBUQy1xHdJ/yoi7FRNXMRBu5WHdZYu1hA6ZOblgut" crossorigin="anonymous"></script> --}}
<script src="https://stackpath.bootstrapcdn.com/bootstrap/4.2.1/js/bootstrap.min.js" integrity="sha384-B0UglyR+jN6CkvvICOB2joaf5I4l3gm9GU6Hc1og6Ls7i6U/mkkaduKaBhlAXv9k" crossorigin="anonymous"></script>
<script src="{{url('/css/owlcarousel/owl.carousel.js')}}"></script>
<!-- Livewire -->
@livewireScripts

<!--Custom script-->
<script src="{{url('/js/app.js')}}" defer></script>


<script>
$(document).ready(function() {
    $('#form-contact').submit(function() {
        $.post(
            '{{ route('site.send.form') }}',
            $(this).serialize(),
            function(data){}
        )

        .error(function(data){
            $("#contact-result").html("erreur d'envoi");
            var errors = data.responseJSON;
            var errorsHtml= '';
            $.each( errors, function( key, value ) {
                console.log( "Error " + value[0] );
                errorsHtml += '<li>' + value[0] + '</li>'; 
            });
            console.log(errors);
        })

        .done(function( html ) {
            $("#contact-result").html("Message envoyé avec succès");
            console.log(html);
        });
        return false;
    });
});
</script>



<script>
$(".site-logo-img--light").show();

$(function() { 
  $(".site-logo-img--light").show();
  $(".site-logo-img--dark").hide();
  $(".site-header").css("background-color", "transparent");
  $(".site-header a").css("color", "white");
  $(window).scroll(function() {
    var scroll = $(window).scrollTop();
    if (scroll >= 300) {
      $(".site-logo-img--dark").show();
      $(".site-header").css("background-color", "white");
      $(".site-header a").css("color", "black");
      $(".navbar").addClass("shadow");           
    } else {
      $(".site-logo-img--light").show();
      $(".site-logo-img--dark").hide();
      $(".navbar").removeClass("shadow");                
      $(".site-header").css("background-color", "transparent");
      $(".site-header a").css("color", "white");
    }
  });
});
</script>

<script>
  var owl = $('.owl-carousel');
  owl.owlCarousel({
    margin: 10,
    autoplay: true,
    nav: false,
    loop: true,
    responsive: {
      0: {
        items: 1
      },
      600: {
        items: 2
      },
      1000: {
        items: 2
      }
    }
  });
</script>

