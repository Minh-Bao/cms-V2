  

<!-- Slim kickstart -->

{!! Html::style('plugins/kickstart/slim.min.css') !!}
  


	{!! Form::model($config,['route'=> ['sitebuilder.config.update',$config->id], 'method'=>'POST' , 'files' => 'true'] ) !!}

		{{ Form::hidden('part', $part, array('class'=>'form-control' ))}}
		{{ Form::hidden('object', $object, array('class'=>'form-control' ))}}

        <div class="modal-dialog modal-lg" role="document">
            <div class="modal-content" id="">
                <div class="modal-header">
					{{ config('myconfig.name_app')}} Site Builder v1.2
				</div>
				
                <div class="modal-body">
                	@if($config->variable=="url_logo")
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
							<div class="row">
								<div class="col-md-6">
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
								<img src="{{url('')}}/{{$config->content}}" alt="">
							@endif
								<input type="file" name="slim[]" required />
								</div>
							</div>
							<div class="col-md-6">
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
									<img src="{{url('')}}/{{$recente->image}}" style="height:100px;width:auto;margin-bottom:5px;">
								</a>
							@endforeach
				</div>
			</div>
		</div>
						@endif
                    @endif

                	@if($part=="page")
						@if($object=="image")
							L'image sera adaptée au format 1440x450 pixels
							<div class="row">
								<div class="col-md-12">
								<div class="slim"
								data-size="1440,450"
								data-force-size="1440,450"
								data-ratio="4:2"
								data-instant-edit="true"
								data-label="Photo"
								data-button-cancel-label="Annuler"
								data-button-confirm-label="Confirmer"
								>
								@if($config->content)
									<img src="{{url('')}}/{{$config->content}}" alt="">
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
							$sliderimage = App\Site\Sliderimage::find($variable);
							$slider = App\Site\Slider::find($sliderimage->sitesliders_id);
						@endphp

						<div class="row form-group">
							<div class="col-md-3">
								<label>Titre</label>
								{{ Form::text('title', $sliderimage->title, array('class'=>'form-control' ))}}
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
										<img src="{{url('')}}/{{$config->content}}" alt="">
									@endif
									<input type="file" name="slim[]" />
								</div>
							</div>

							<div class="col-md-9">
								<label>Contenu</label>
								{{ Form::textarea('content', $sliderimage->content, array('id'=>'ckeditor' ))}}
								
								<!-- Ckeditor -->
								{!! Html::script('plugins/ckeditor/ckeditor.js') !!}

								<!-- Custom Js -->
								<script type="text/javascript">

								//CKEditor
								CKEDITOR.replace('ckeditor');
								CKEDITOR.config.height = 200;
								</script>

								<label>Lien</label>
								{{ Form::text('link', $sliderimage->link, array('class'=>'form-control' ))}}
							</div>
						</div>
                    @endif

					@if($part=="partenaire")
						@if($object=="name" || $object=="baseline")
		                    {{ Form::text('content', $config->content, array('class'=>'form-control' ))}}
						@endif

						@if($object=="description")
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
							L'image sera adaptée au format 800x600 pixels
							<div class="slim"
								data-label="Photo"
								data-size="800,600"
								data-instant-edit="true"
								data-button-cancel-label="Annuler"
								data-button-confirm-label="Confirmer"
								data-ratio="3:2">
								@if($config->content)
									<img src="{{url('')}}/{{$config->folder}}/{{$config->content}}" alt="">
								@endif
								<input type="file" name="slim[]" required />
							</div>
							Url de l'image : {{url('')}}/{{$config->folder}}/{{$config->content}}
						@endif              	
                    @endif
                </div>

                <div class="modal-footer">
					{{ Form::submit('Modifier', array('class'=>'btn btn-primary' )) }}
                    <button type="button" class="btn btn-default text-left" data-dismiss="modal" onclick="Custombox.modal.close();">Fermer</button>
                </div>
            </div>
        </div>
    {!! Form::close() !!}

<!-- Slim kickstart -->
{!! Html::script('plugins/kickstart/slim.kickstart.min.js') !!}







