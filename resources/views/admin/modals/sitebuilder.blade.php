  

<!-- Slim kickstart -->

{!! Html::style('plugins/kickstart/slim.min.css') !!}
  


	{!! Form::model($config,['route'=> ['sitebuilder.config.update',$config->id], 'method'=>'POST' , 'files' => 'true'] ) !!}

		{{ Form::hidden('part', $part, array('class'=>'form-control' ))}}
		{{ Form::hidden('object', $object, array('class'=>'form-control' ))}}

        <div class="modal-dialog modal-lg bg-white-450 rounded-xl " role="document" >
            <div class="modal-content rounded-xl" id="">
                <div class="modal-header bg-purple-300 p-2">
                    <span class="text-gray-900 text-lg">{{ config('myconfig.name_app')}} :  </span> Site Builder v1.2
				</div>
				
                <div class="modal-body">
{{--                 	@if($config->variable=="url_logo")
					    <div class="slim"
					         data-label="Votre logo"
					         data-size="{{$siteconfig[2]->content_fr}},{{$siteconfig[3]->content_fr}}"
					         data-instant-edit="true"
					         data-button-cancel-label="Annuler"
					         data-button-confirm-label="Confirmer"
							 data-ratio="
							 <?php 
					         if ($siteconfig[2]->content==$siteconfig[3]->content) {
					         	echo"1:1";
					         } else {
					         	echo "3:2";
					         }?>" style="width:{{$siteconfig[2]->content_fr}}px;">
					         @if($config->content)
					            <img src="{{url('')}}/{{$config->content}}" alt="">
					         @endif
					        <input type="file" name="logo[]" required />
					    </div>
                    @endif

                	@if($config->variable=="image_news")
                        L'image sera adaptée au format {{$siteconfig[21]->content_fr}}x{{$siteconfig[22]->content_fr}} pixels

					    <div class="slim"
					         data-label="Photo jpg"
					         data-size="{{$siteconfig[21]->content_fr}},{{$siteconfig[22]->content_fr}}"
					         data-instant-edit="true"
					         data-button-cancel-label="Annuler"
					         data-button-confirm-label="Confirmer"
							 data-ratio="
							 <?php 
					         if ($siteconfig[21]->content_fr==$siteconfig[22]->content_fr) {
					         	echo"1:1";
					         } else {
					         	echo "3:2";
							 }
							 ?>" 
							 style="width:320px;height:240px;">

					         @if($config->content_fr)
					            <img src="{{url('')}}/{{$config->content_fr}}" alt="">
					         @endif
					        <input type="file" name="slim[]" required />
					    </div>
                    @endif

                	@if($part=="config" && $config->variable<>"url_logo" &&  $config->variable<>"image_news")
						<?php 
						$configlng = "content_".App::getLocale();
						?>
						{{ Form::text('content', $config->$configlng, array('class'=>'form-control' ))}}
                    @endif

                	@if($part=="article")
						@if($object=="title")
		                    {{ Form::text('content', $config->content, array('class'=>'form-control' ))}}
						@endif
						@if($object=="content")
							{{ Form::textarea('content', $config->content, array('id'=>'ckeditor' ))}}
							
							<!-- Ckeditor -->
							{!! Html::script('plugins/ckeditor/ckeditor.js') !!}

							<!-- Custom Js -->
							<script type="text/javascript">

								//CKEditor
								CKEDITOR.replace('ckeditor');
								CKEDITOR.config.height = 300;
							</script>
						@endif

						@if($object=="image")
							L'image sera adaptée au format {{$siteconfig[21]->content_fr}}x{{$siteconfig[22]->content_fr}} pixels

							<div class="slim"
								data-label="Photo de l'article"
								data-size="{{$siteconfig[21]->content_fr}},{{$siteconfig[22]->content_fr}}"
								data-instant-edit="true"
								data-button-cancel-label="Annuler"
								data-button-confirm-label="Confirmer"
								data-ratio="
								<?php 
								if ($siteconfig[21]->content_fr==$siteconfig[22]->content_fr) {
									echo"1:1";
								} else {
									echo "3:2";
								}
								?>" 
								style="width:{{$siteconfig[21]->content_fr}}px;">

								@if($config->content)
									<img src="{{url('')}}/{{$config->folder}}/{{$config->content}}" alt="">
								@endif

								<input type="file" name="slim[]" required />
							</div>
							Url de l'image : {{url('')}}/{{$config->folder}}/{{$config->content}}
						@endif              	
					@endif
--}}

					@if($part=="bloc")
						@if($object=="title")
		                    {{ Form::text('content', $config->content, array('class'=>'form-control' ))}}
						@endif
						@if($object=="content" || $object=="content_hidden")
	                        {{ Form::textarea('content', $config->content, array('id'=>'ckeditor' ))}}

							<!-- Ckeditor -->
							{!! Html::script('plugins/ckeditor/ckeditor.js') !!}

							<!-- Custom Js -->
							<script type="text/javascript">

							//CKEditor
							CKEDITOR.replace('ckeditor');
							CKEDITOR.config.height = 300;

							</script>
						@endif
						@if($object=="content_two" )
	                        {{ Form::textarea('content', $config->content_two, array('id'=>'ckeditor' ))}}

							<!-- Ckeditor -->
							{!! Html::script('plugins/ckeditor/ckeditor.js') !!}

							<!-- Custom Js -->
							<script type="text/javascript">

							//CKEditor
							CKEDITOR.replace('ckeditor');
							CKEDITOR.config.height = 300;

							</script>
						@endif

						@if($object=="image")
							L'image sera adaptée au format 1440x1080 pixels
							<div class="flex flex-wrap ">
								<div class="md:w-1/2 pr-4 pl-4">
								<div class="slim"
								data-size="1440,1080"
								data-force-size="1440,1080"
								data-label="Photo"
								data-instant-edit="true"
								data-button-cancel-label="Annuler"
								data-button-confirm-label="Confirmer"
								style="width:300px;"
								>
							@if($config->content)
								<img src="{{asset($config->content)}}" alt="">
							@endif
								<input type="file" name="slim[]" required />
								</div>
							</div>
							<div class="md:w-1/2 pr-4 pl-4">
								<input type="checkbox" value="yes" name="duplicate"> Changer cette photo partout (langues/blocs).
				   			<br />
				   			<br />
								<div style="display:none;">	
									<b>Remplacement rapide avec une photo récentes</b><br />
				   			<br />
							@php
								$recentes = App\Models\Site\Websitebloc::select('*')->whereNotNull('image')->distinct('image')->orderBy('updated_at')->paginate(8);
							@endphp

							@foreach($recentes as $recente)
								<a href="{{route('sitebuilder.image.change',$config->id)}}?bloc={{$recente->id}}">
									<img src="{{asset($recente->image)}}" style="height:100px;width:auto;margin-bottom:5px;">
								</a>
							@endforeach
				</div>
			</div>
		</div>
						@endif
                    @endif

                	@if($part=="page")
						@if($object=="image")
                        <div class="p-2">
							L'image sera adaptée au format 1440x450 pixels
                        </div>
							<div class="flex flex-wrap  " >
								<div class="md:w-full pr-4 pl-4">
								<div class="slim rounded-sm shadow-md" 
								data-size="1440,450"
								data-force-size="1440,450"
								data-ratio="4:2"
								data-instant-edit="true"
								data-label="Photo"
								data-button-cancel-label="Annuler"
								data-button-confirm-label="Confirmer"
								>
								@if($config->content)
									<img src="{{asset($config->content)}}" alt="">
								@endif
									<input type="file" name="slim[]" required />
								</div>
								</div>
							</div>
						@else
							{{ Form::textarea('content', $config->content , array('id'=>'ckeditor' ))}}
							{{-- {{ Form::textarea('content', $config->content, array('id'=>'ckeditor' ))}} --}}

							<!-- Ckeditor -->
							{!! Html::script('plugins/ckeditor/ckeditor.js') !!}

							<!-- Custom Js -->
							<script type="text/javascript">

							//CKEditor
							CKEDITOR.replace('ckeditor');
							CKEDITOR.config.height = 300;

							</script>
						@endif
                    @endif

                	@if($part=="slider")
						@php
							$sliderimage = App\Models\Site\SliderImage::find($variable);
							$slider = App\Models\Site\Slider::find($sliderimage->sitesliders_id);
						@endphp

						<div class="flex flex-wrap  mb-4">
                            @foreach ($sliders as $sliderimage)
                                <div class="md:w-1/4 pr-4 pl-4">
                                    <div class="slim"
                                        data-size="{{$slider->width}},{{$slider->height}}"
                                        data-label="Image jpg"
                                        data-force-type = "jpg"
                                        data-button-cancel-label="Annuler"
                                        data-button-confirm-label="Confirmer"
                                        data-instant-edit="true"
                                        data-ratio="{{$slider->ratio}}"
                                        style="width:200px;"
                                        >
                                        @if($config->content)
                                            <img src="{{asset($sliderimage->picture)}}" alt="">
                                        @endif
                                        <input type="file" name="slim[]" />
                                    </div>
                                </div>

                                <div class="md:w-3/4 pr-4 pl-4 flex justify-around">
                                    <span>
                                        <label>Titre</label>
                                        {{ Form::text('title', $sliderimage->title, array('class'=>'form-control' ))}}
                                    </span>
                                    
                                    <span>
                                        <label>Contenu</label>
                                        {{ Form::text('content', $sliderimage->content)}}
                                    </span>
                                    
                                    <!-- Ckeditor -->
                                    {!! Html::script('plugins/ckeditor/ckeditor.js') !!}

                                    {{-- <!-- Custom Js -->
                                    <script type="text/javascript">
                                        //CKEditor
                                        CKEDITOR.replace('ckeditor');
                                        CKEDITOR.config.height = 200;
                                    </script> --}}
                                </div>
                            @endforeach
						</div>
                    @endif
                </div>

                <div class="modal-footer">
					{{ Form::submit('Modifier', array('class'=>'m-4 px-4 py-2 border border-transparent shadow-sm text-sm font-medium rounded-md text-gray-50 bg-pink-450 hover:bg-purple-700 focus:outline-none focus:ring-2 focus:ring-offset-2 focus:ring-blue-900 sm:order-1 sm:ml-3' )) }}
                    <button type="button" class="border border-gray-500 text-center select-none font-normal whitespace-no-wrap rounded py-1 px-3 leading-normal no-underline btn-default close" data-dismiss="modal" onclick="Custombox.modal.close();">Fermer</button>
                </div>
            </div>
        </div>
    {!! Form::close() !!}

<!-- Slim kickstart -->
{!! Html::script('plugins/kickstart/slim.kickstart.min.js') !!}







