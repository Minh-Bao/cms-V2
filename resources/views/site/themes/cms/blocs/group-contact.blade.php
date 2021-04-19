
<div class="flex flex-wrap ">
    <div class="md:w-1/2 sm:w-full  mx-auto mb-3" >
        <div class=" text-left  bloc" name="{{$bloc->id}}" value="content" >
            {!! $bloc->content !!}
        </div>
        <div class="w-2/3 bloc mt-8" name="{{$bloc->id}}" value="image">
            <img src="{{ asset($bloc->image)}}" title="{{$bloc->title_img}}" alt="{{$bloc->alt_img}}" class="img-responsive rounded" width="100%" style="filter: drop-shadow(5px 3px 6px #2c3c3a)">
        </div>
    </div>
    
    <div class=" mx-auto text-center ">
        <div>
            {!! Form::open(['route' => 'contact']) !!}
                <p class="mt-4">
                    <label> Veuillez saisir votre nom *<br />
                        <span  >
                            <input type="text" name="name" value="" size="44" class="appearance-none block w-full px-3 py-2 border border-gray-300 rounded-md shadow-sm placeholder-gray-400 focus:outline-none focus:ring-indigo-500 focus:border-indigo-500 sm:text-sm" aria-required="true" aria-invalid="false" required />
                        </span> 
                    </label>
                </p>    
                <p class="mt-4">
                    <label> Veuillez saisir votre email *<br />
                        <span >
                            <input type="email" name="email" value="" size="44" class="appearance-none block w-full px-3 py-2 border border-gray-300 rounded-md shadow-sm placeholder-gray-400 focus:outline-none focus:ring-indigo-500 focus:border-indigo-500 sm:text-sm" aria-required="true" aria-invalid="false" data-parsley-trigger="change" required="" type="email" />
                        </span> 
                    </label>
                </p>
                <p class="mt-4">
                    <label> Sujet du message : <br />
                        <span >
                            <input type="text" name="subject" value="" size="44" class="appearance-none block w-full px-3 py-2 border border-gray-300 rounded-md shadow-sm placeholder-gray-400 focus:outline-none focus:ring-indigo-500 focus:border-indigo-500 sm:text-sm" aria-invalid="false" />
                        </span> 
                    </label>
                </p>
                <p class="mt-4">
                    <label> Message : <br />
                        <span >
                            <textarea name="message" cols="41" rows="10" class="appearance-none block w-full px-3 py-2 border border-gray-300 rounded-md shadow-sm placeholder-gray-400 focus:outline-none focus:ring-indigo-500 focus:border-indigo-500 sm:text-sm" aria-invalid="false"></textarea>
                        </span> 
                    </label>
                </p>
                <p>
                    {{ Form::submit('envoyer', ['class' => "mt-8 btn_calltoAction"]) }}
                </p>
            {!! Form::close() !!}


        </div>
    </div>
</div>



