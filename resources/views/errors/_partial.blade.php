<h1>{{ $number}}</h1>
<h2>{{ $info}}</h2>
<h2 style="margin-top:2%;">@isset($message) {{$message}} @endisset</h2>
@if(Str::substr($number, 0 , 2) != '50' )
    <p class="text-xl font-light">
        <a href="{{ url($route) }}" class="inline-block align-middle bg-red-300 text-center select-none border font-normal whitespace-no-wrap rounded py-1 px-3 leading-normal no-underline ">{{ $name }}</a>
    </p>
@endif
