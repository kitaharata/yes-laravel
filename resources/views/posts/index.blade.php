<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
    <head>
        <meta charset="UTF-8" />
        <meta name="viewport" content="width=device-width" />
        <title>Yes</title>
        <meta name="description" content="Gitpod" />
        <meta name="twitter:card" content="summary" />
        <meta property="og:title" content="Yes" />
        <meta property="og:description" content="Gitpod" />
        <meta property="og:site_name" content="Yes | Gitpod" />
        <link href="{{ secure_asset('css/water.min.css') }}" rel="stylesheet" />
    </head>
    <body>
        <div>
            <form method="POST">
                @csrf
                @method('POST')
                @foreach ($contents as $i => $content)
                <label>
                    <input type="radio" name="content" value="{{ $i }}"<?php if (!$i) echo " checked"; ?> />
                    {{ $content }}
                </label>
                @endforeach
                <input type="submit" value="POST" />
            </form>
        </div>
        <div>
            <ol>
                @foreach ($posts as $post)
                <li>
                    <span class="time">{{ $post->created_at->format(DateTime::ATOM) }}</span>
                     - - - - - 
                    {{ $contents[$post->content] }}
                </li>
                @endforeach
            </ol>
        </div>
        <script>
var time = document.querySelectorAll('.time');
for (var i = 0; i < time.length; i++) {
    document.querySelectorAll('.time')[i].innerText = new Date(
        document.querySelectorAll('.time')[i].innerText
    ).toLocaleString();
}
        </script>
    </body>
</html>
