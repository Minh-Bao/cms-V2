

<!-- Pusher -->

<script src="https://js.pusher.com/4.1/pusher.min.js"></script>

<script>

    // Enable pusher logging - don't include this in production

    Pusher.logToConsole = false;



    var pusher = new Pusher('{{env('PUSHER_APP_KEY')}}', {

      cluster: 'eu',

      encrypted: false

    });



    var channel = pusher.subscribe('{{config('myconfig.name_app')}}');

      channel.bind('admin{{Auth::user()->id}}', function(data) {

      toastr.info(data.message, 'IMPORTANT', { timeOut: 96000 });

      // $('#calendar').fullCalendar('refetchEvents');       

    });

    channel.bind('team', function(data) {

      $("#noti-team").animateCss('bounce');

      $("#noti-team").load('{{route('noti.team')}}');

    });



    channel.bind('team', function(data) {

      $("#noti-team").animateCss('bounce');

      $("#noti-team").load('{{route('noti.team')}}');

    });



    channel.bind('chat', function(data) {

      $(".chat-window").show();

      if ($('#minim_chat_window').hasClass('panel-collapsed')) {

        $('.panel-body').slideDown();

        $('#minim_chat_window').removeClass('panel-collapsed');

        $('#minim_chat_window').removeClass('glyphicon-plus').addClass('glyphicon-minus');

      };

      $(".msg_container_base").append('<div class="flex flex-wrap  msg_container base_receive"><div class="md:w-1/5 pr-4 pl-4 sm:w-1/5 pr-4 pl-4 avatar"><img src="'+ data.avatar +'" class=" img-responsive "></div><div class="md:w-4/5 pr-4 pl-4 sm:w-4/5 pr-4 pl-4"><div class="messages msg_receive"><p>'+data.message+'</p><time datetime="2009-11-13T20:00">'+data.name +' • '+ data.time +'</time></div></div></div>');

      $('.msg_container_base').scrollTop(1E10);

    });





    channel.bind('public', function(data) {

      toastr.info(data.message);  

    });

    channel.bind('css', function(data) {

//     $('#pushermsg').load('http://127.0.0.1:8000/admin/proprietes');  

    });

//    channel.bind('product1', function(data) {

//      var message = data.message;

//     $('#MHC'+message).load('{{url('')}}/admin/proprietes/ajax/showline?id='+message);  

//    });

</script>