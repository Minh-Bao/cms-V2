@php echo '<?xml version="1.0" encoding="UTF-8"?>' @endphp
<rss version="2.0">
    <channel>
        @foreach ($articles as $course)
        <item>
            <title>{{ $course->title }}</title>
            <url>https://blog.naturelcoquin.com/{{ $course->thumbnail }}</url>
            <description>{{ $course->content }}</description>
            <pubDate>{{ $course->created_at->toRfc7231String() }}</pubDate>
            <link>https://blog.naturelcoquin.com/page/{{$course->slug }}</link>
        </item>
        @endforeach
    </channel>
</rss>