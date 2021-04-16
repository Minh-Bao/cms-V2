
<div class="flex flex-wrap ">
    <div class="md:w-1/2 pr-4 pl-4" style="margin-left: 3em">
        <div class=" text-left mt50 bloc" name="{{$bloc->id}}" value="content" >
            {!! $bloc->content !!}
        </div>
        <div class=" bloc" name="{{$bloc->id}}" value="image">
            <img src="{{ asset($bloc->image)}}" title="{{$bloc->title_img}}" alt="{{$bloc->alt_img}}" class="img-responsive rounded" width="100%" style="filter: drop-shadow(5px 3px 6px #2c3c3a)">
        </div>
    </div>
    
    <div class="md:w-2/5 pr-4 pl-4 text-center mt50">
        <div>
            {!! Form::open(['route' => 'contact']) !!}
            <p>
                <label> Veuillez saisir votre nom *<br />
                    <span class="efix-form-control-wrap" >
                        <input type="text" name="name" value="" size="44" class="efix-form-control efix-text efix-validates-as-required contact_form" aria-required="true" aria-invalid="false" required="" />
                    </span> 
                </label>
            </p>    
            <p>
                <label> Veuillez saisir votre email *<br />
                    <span class="efix-form-control-wrap ">
                        <input type="email" name="email" value="" size="44" class="efix-form-control efix-text efix-email efix-validates-as-required efix-validates-as-email contact_form" aria-required="true" aria-invalid="false" data-parsley-trigger="change" required="" type="email" />
                    </span> 
                </label>
            </p>
            <p>
                <label> Sujet du message : <br />
                    <span class="efix-form-control-wrap ">
                        <input type="text" name="subject" value="" size="44" class="efix-form-control efix-text contact_form" aria-invalid="false" />
                    </span> 
                </label>
            </p>
            <p>
                <label> Message : <br />
                    <span class="efix-form-control-wrap ml-2">
                        <textarea name="message" cols="41" rows="10" class="efix-form-control efix-textarea contact_form" aria-invalid="false"></textarea>
                    </span> 
                </label>
            </p>
            <p>
                {{ Form::submit('envoyer', ['class' => "efix-form-control efix-submit btn_calltoAction", 'style' => "color:white;width:25%;"]) }}
            </p>
 {!! Form::close() !!}


        </div>
    </div>
</div>



