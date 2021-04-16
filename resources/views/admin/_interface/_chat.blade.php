<style>
    .col-md-2,
    .col-md-10 {

        padding: 0;

    }

    .panel {

        margin-bottom: 0px;

    }

    .chat-window {

        bottom: 0;

        position: fixed;

        float: right;

        margin-left: 10px;

    }

    .chat-window>div>.panel {

        border-radius: 5px 5px 0 0;

    }

    .icon_minim {

        padding: 2px 10px;

    }

    .msg_container_base {

        background: #e5e5e5;

        margin: 0;

        padding: 0 10px 10px;

        max-height: 300px;

        overflow-x: hidden;

    }

    .top-bar {

        background: #666;

        color: white;

        padding: 10px;

        position: relative;

        overflow: hidden;

    }

    .msg_receive {

        padding-left: 0;

        margin-left: 0;

    }

    .msg_sent {

        padding-bottom: 20px !important;

        margin-right: 0;

    }

    .messages {

        background: white;

        padding: 10px;

        border-radius: 2px;

        box-shadow: 0 1px 2px rgba(0, 0, 0, 0.2);

        max-width: 100%;

    }

    .messages>p {

        font-size: 13px;

        margin: 0 0 0.2rem 0;

    }

    .messages>time {

        font-size: 11px;

        color: #ccc;

    }

    .msg_container {

        padding: 10px;

        overflow: hidden;

        display: flex;

    }

    img {

        display: block;

        width: 100%;

    }

    .avatar {

        position: relative;

    }

    .base_receive>.avatar:after {

        content: "";

        position: absolute;

        top: 0;

        right: 0;

        width: 0;

        height: 0;

        border: 5px solid #FFF;

        border-left-color: rgba(0, 0, 0, 0);

        border-bottom-color: rgba(0, 0, 0, 0);

    }



    .base_sent {

        justify-content: flex-end;

        align-items: flex-end;

    }

    .base_sent>.avatar:after {

        content: "";

        position: absolute;

        bottom: 0;

        left: 0;

        width: 0;

        height: 0;

        border: 5px solid white;

        border-right-color: transparent;

        border-top-color: transparent;

        box-shadow: 1px 1px 2px rgba(black, 0.2); // not quite perfect but close

    }



    .msg_sent>time {

        float: right;

    }







    .msg_container_base::-webkit-scrollbar-track {

        -webkit-box-shadow: inset 0 0 6px rgba(0, 0, 0, 0.3);

        background-color: #F5F5F5;

    }



    .msg_container_base::-webkit-scrollbar {

        width: 12px;

        background-color: #F5F5F5;

    }



    .msg_container_base::-webkit-scrollbar-thumb {

        -webkit-box-shadow: inset 0 0 6px rgba(0, 0, 0, .3);

        background-color: #555;

    }



    .btn-group.dropup {

        position: fixed;

        left: 0px;

        bottom: 0;

    }

</style>



<div class="container mx-auto sm:px-4">

    <div class="flex flex-wrap  chat-window sm:w-2/5 pr-4 pl-4 md:w-1/4" id="chat_window_1" style="margin-left:10px;">

        <div class="sm:w-full pr-4 pl-4 md:w-full">

            <div class="panel panel-default">

                <div class="panel-heading top-bar">

                    <div class="md:w-2/3 pr-4 pl-4 sm:w-2/3">

                        <h3 class="panel-title"><span class="glyphicon glyphicon-comment"></span> Chat</h3>

                    </div>

                    <div class="md:w-1/3 pr-4 pl-4 sm:w-1/3" style="text-align: right;">

                        <a href="#"><span id="minim_chat_window"
                                class="glyphicon glyphicon-minus icon_minim"></span></a>

                        <a href="#"><span class="glyphicon glyphicon-remove icon_close"
                                data-id="chat_window_1"></span></a>

                    </div>

                </div>

                <div class="panel-body msg_container_base">

                    @foreach ($chats as $chat)

                        @if ($chat->admins_id == Auth::user()->id)

                            <div class="flex flex-wrap  msg_container base_receive">

                                <div class="md:w-1/5 pr-4 pl-4 sm:w-1/5 avatar">

                                    <img src="{{ asset('/images/team/{{ Auth::user()->avatar }}') }}"
                                        class=" img-responsive ">

                                </div>

                                <div class="md:w-4/5 pr-4 pl-4 sm:w-4/5">

                                    <div class="messages msg_receive">

                                        <p>{{ $chat->message }}</p>

                                        <time datetime="2009-11-13T20:00">{{ Auth::user()->firstname }}
                                            {{ Auth::user()->name }} • 51 min</time>

                                    </div>

                                </div>

                            </div>

                        @else

                            <div class="flex flex-wrap  msg_container base_sent">

                                <div class="md:w-4/5 pr-4 pl-4 sm:w-4/5">

                                    <div class="messages msg_sent">

                                        <p>{{ $chat->message }}

                                        </p>

                                        <time datetime="2009-11-13T20:00">{{ $chat->admins->firstname }}
                                            {{ $chat->admins->name }} • </time>

                                    </div>

                                </div>

                                <div class="md:w-1/5 pr-4 pl-4 sm:w-1/5 avatar">

                                    <img src="{{ asset('/images/team/{{ $chat->admins->avatar }}') }}"
                                        class=" img-responsive ">

                                </div>

                            </div>

                        @endif

                    @endforeach

                </div>

                <div class="panel-footer">

                    <div class="relative flex items-stretch w-full">

                        <input id="btn-input" type="text"
                            class="block appearance-none w-full py-1 px-2 mb-1 text-base leading-normal bg-white text-gray-800 border border-gray-200 rounded input-sm chat_input"
                            placeholder="Write your message here..." />

                        <span class="input-group-btn">

                            <button
                                class="inline-block align-middle text-center select-none border font-normal whitespace-no-wrap rounded  no-underline bg-blue-600 text-white hover:bg-blue-600 py-1 px-2 leading-tight text-xs "
                                id="btn-chat">Send</button>

                        </span>

                    </div>

                </div>

            </div>

        </div>

    </div>



    <div class="relative inline-flex align-middle">

        <button type="button"
            class="inline-block align-middle text-center select-none border font-normal whitespace-no-wrap rounded py-1 px-3 leading-normal no-underline btn-default w-0 h-0 ml-1 align border-b-0 border-t-1 border-r-1 border-l-1"
            data-toggle="dropdown">

            <span class="glyphicon glyphicon-cog"></span>

            <span class="sr-only">Toggle Dropdown</span>

        </button>

        <ul class=" absolute left-0 z-50 float-left hidden list-reset	 py-2 mt-1 text-base bg-white border border-gray-300 rounded"
            role="menu">

            <li><a href="#" id="new_chat"><span class="glyphicon glyphicon-plus"></span> Novo</a></li>

            <li><a href="#"><span class="glyphicon glyphicon-list"></span> Ver outras</a></li>

            <li><a href="#"><span class="glyphicon glyphicon-remove"></span> Fechar Tudo</a></li>

            <li class="divider"></li>

            <li><a href="#"><span class="glyphicon glyphicon-eye-close"></span> Invisivel</a></li>

        </ul>

    </div>

</div>





<script>
    $(document).on('click', '.panel-heading span.icon_minim', function(e) {

        var $this = $(this);

        if (!$this.hasClass('panel-collapsed')) {

            $this.parents('.panel').find('.panel-body').slideUp();

            $this.addClass('panel-collapsed');

            $this.removeClass('glyphicon-minus').addClass('glyphicon-plus');

        } else {

            $this.parents('.panel').find('.panel-body').slideDown();

            $this.removeClass('panel-collapsed');

            $this.removeClass('glyphicon-plus').addClass('glyphicon-minus');

        }

    });

    $(document).on('focus', '.panel-footer input.chat_input', function(e) {

        var $this = $(this);

        if ($('#minim_chat_window').hasClass('panel-collapsed')) {

            $this.parents('.panel').find('.panel-body').slideDown();

            $('#minim_chat_window').removeClass('panel-collapsed');

            $('#minim_chat_window').removeClass('glyphicon-plus').addClass('glyphicon-minus');

        }

    });

    $(document).on('click', '#new_chat', function(e) {

        var size = $(".chat-window:last-child").css("margin-left");

        size_total = parseInt(size) + 400;

        alert(size_total);

        var clone = $("#chat_window_1").clone().appendTo(".container");

        clone.css("margin-left", size_total);

    });

    $(document).on('click', '.icon_close', function(e) {

        //$(this).parent().parent().parent().parent().remove();

        $("#chat_window_1").remove();

    });

</script>
