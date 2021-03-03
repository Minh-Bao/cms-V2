<h1>{{ $number}}</h1>
<h2>{{ $info}}</h2>
<h2 style="margin-top:2%;">@isset($message) {{$message}} @endisset</h2>
@if(Str::substr($number, 0 , 2) != '50' )
    <p class="lead">
        <a href="{{ url($route) }}" class="btn btn--primary">{{ $name }}</a>
    </p>
@endif
