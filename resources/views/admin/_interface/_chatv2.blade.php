@section('stylesheets')
    {{ Html::style('css/chatv2.css')}}
@endsection

    <div class="flex flex-wrap  chat-window sm:w-2/5 pr-4 pl-4 md:w-1/4" id="chat_window_1" style="margin-left:10px;">
        <div class="sm:w-full pr-4 pl-4 md:w-full">
            <div class="panel panel-default">
                <div class="panel-heading top-bar">
                    <div class="md:w-2/3 pr-4 pl-4 sm:w-2/3">
                        <h3 class="panel-title"><span class="glyphicon glyphicon-comment"></span> Chat - Philippe</h3>
                    </div>

                    <div class="md:w-1/3 pr-4 pl-4 sm:w-1/3" style="text-align: right;">
                        <a href="#"><span id="minim_chat_window" class="glyphicon glyphicon-minus icon_minim"></span></a>
                        <a href="#"><span class="glyphicon glyphicon-remove icon_close" data-id="chat_window_1"></span></a>
                    </div>
                </div>

                <div class="panel-body msg_container_base"></div>

                <div class="panel-footer">
                    <div class="relative flex items-stretch w-full">
                        <input id="btn-input" type="text" class="block appearance-none w-full py-1 px-2 mb-1 text-base leading-normal bg-white text-gray-800 border border-gray-200 rounded input-sm chat_input" placeholder="Write your message here..." />
                        <span class="input-group-btn">
                            <button class="inline-block align-middle text-center select-none border font-normal whitespace-no-wrap rounded  no-underline bg-blue-600 text-white hover:bg-blue-600 py-1 px-2 leading-tight text-xs " id="btn-chat">Send</button>
                        </span>
                    </div>
                </div>
            </div>
        </div>
    </div>

    <div class="relative inline-flex align-middle">
        <button type="button" class="inline-block align-middle text-center select-none border font-normal whitespace-no-wrap rounded py-1 px-3 leading-normal no-underline btn-default w-0 h-0 ml-1 align border-b-0 border-t-1 border-r-1 border-l-1" data-toggle="dropdown">
            <span class="glyphicon glyphicon-cog"></span>
            <span class="sr-only">Toggle Dropdown</span>
        </button>

        <ul class=" absolute left-0 z-50 float-left hidden list-reset	 py-2 mt-1 text-base bg-white border border-gray-300 rounded" role="menu">
            <li><a href="#" id="new_chat"><span class="glyphicon glyphicon-plus"></span> Novo</a></li>
            <li><a href="#"><span class="glyphicon glyphicon-list"></span> Ver outras</a></li>
            <li><a href="#"><span class="glyphicon glyphicon-remove"></span> Fechar Tudo</a></li>
            <li class="divider"></li>
            <li><a href="#"><span class="glyphicon glyphicon-eye-close"></span> Invisivel</a></li>
        </ul>
    </div>

@section('scripts')
    {{ Html::script('js/chatv2.js')}}
@endsection



