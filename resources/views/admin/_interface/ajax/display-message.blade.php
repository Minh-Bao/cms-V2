                    <a href="javascript:void(0);" class=" inline-block w-0 h-0 ml-1 align border-b-0 border-t-1 border-r-1 border-l-1" data-toggle="dropdown" role="button">
                        <i class="material-icons">notifications</i>
                        @if($MyMessages->count()>0)
                        <span class="label-count">{{$MyMessages->count()}}</span>
                        @endif
                    </a>
                    <ul class=" absolute left-0 z-50 float-left hidden list-reset	 py-2 mt-1 text-base bg-white border border-gray-300 rounded">
                        <li class="header">MESSAGES</li>
                        <li class="body">
                            <ul class="menu">
                                @foreach($MyMessages as $MyMessage)
                                <li style="height:50px;width:100%;">
                                    <a href="javascript:void(0);" class="modal-message" message_id="{{$MyMessage->id}}" >
                                        <div class="icon-circle bg-light-green">
                                            <i class="material-icons">record_voice_over</i>
                                        </div>
                                        <div class="menu-info">
                                            @if($MyMessage->user_id>0)
                                            <h4>{{ $MyMessage->user->firstname }} {{ $MyMessage->user->name }}</h4>
                                            @else
                                            <h4>{{ $MyMessage->team->firstname }} {{ $MyMessage->team->name }}</h4>
                                            @endif
                                            <p>
                                                <i class="material-icons">access_time</i> {{ Carbon\Carbon::parse($MyMessage->created_at)->diffForHumans() }}
                                            </p>
                                        </div>
                                    </a>
                                </li>
                                @endforeach

                            </ul>
                        </li>
                        <li class="footer">
                            <a href="javascript:void(0);">Voir tous les messages</a>
                        </li>
                    </ul>
                    <!-- Modal Control -->
<script type="text/javascript">
$(document).ready(function(){
    $.ajaxSetup({
      headers: {
        'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
      }
    });
   $('.modal-message').click(function(){
     var message_id = $(this).attr("message_id");
     var url = '{{ route("modal.message.show", ":id") }}';
     url = url.replace(':id', message_id);
     $.ajax({
       url: url,
       method:"GET",
       data: {message_id : message_id},
      beforeSend:function(){
      $("#largeModal").html('<div class="modal-dialog modal-lg" role="document"><div class="modal-content"><div class="modal-header"><div class="preloader" style="margin:20px;"><div class="spinner-layer pl-blue-grey"><div class="circle-clipper left"><div class="circle"></div></div><div class="circle-clipper right"><div class="circle"></div></div></div></div></div>');
         $('#largeModal').modal({
          backdrop: 'static',
          keyboard: false
          })
      },
       success:function(data){
         $('#largeModal').html(data);
       }
     });
   });

});
</script>