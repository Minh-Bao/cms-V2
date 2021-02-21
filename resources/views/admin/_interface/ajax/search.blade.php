<div class="ajax-search-result" style="padding-left:20px;margin-bottom:20px;
border-bottom: 1px solid #dddddd;max-height:350px;width:100%;
overflow-y: auto;overflow-x: hidden;margin-top:-20px;
">

@if($users->count()>0)
<div class="row">
	<div class="col-md-12">
<hr />
		<h3>Contacts <span class="badge bg-cyan">{{ $users->count() }}</span></h3>
	</div>
</div>

@foreach($users as $user)
<div class="row form-group">
	<div class="col-md-12">
		<b><a href="{{route('user.edit',$user->id)}}">
          @if($user->civility=="c")
            {{ $user->company }} ( {{ $user->firstname }} {{ $user->name }} ) 
          @else
	          @if($user->civility)
	               {{ $civilities[$user->civility] }} 
	          @endif 
	          {{ $user->firstname }} {{ strtoupper($user->name) }}
	          @endif
        </a></b>
		Tél : {{$user->mobile}}
		{{$user->email}}
	</div>
</div>
@endforeach

@endif

@if($products->count()>0)
<div class="row">
	<div class="col-md-12">
<hr />
		<h3>Offres <span class="badge bg-cyan">{{ $products->count() }}</span></h3>
	</div>
</div>

@foreach($products as $product)
<div class="row form-group">
	<div class="col-md-2">
		<img src="{{url('')}}/images/{{env('FOLDER_PICTURES')}}/{{ $product->id }}/small/{{ $product->thumb }}" class="img-responsive zoom" style="height:100px;">
	</div>
	<div class="col-md-10">
		<h4><a href="{{route('offre.edit',$product->id)}}">{{ $product->product_designation }} {{$product->zip_code}} {{$product->city}}<br/>
		{{$product->total_hai}}€</a></h4>
	</div>
</div>
@endforeach

@endif


</div>

<script>
$('.ajax-search-result').slimscroll({
	height: '200px',
	color: 'rgba(0,0,0,0.5)',
	size: '4px',
	alwaysVisible: false,
	borderRadius: '0',
	railBorderRadius: '0'
});
</script>