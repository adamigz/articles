<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>{{ env('APP_NAME') }}</title>
    @vite('resources/css/app.css')
</head>
<body class="antialiased bg-slate-100">
    <nav class="p-2 bg-white">
        <ul class="flex gap-x-8 items-end">
            <li class="text-3xl text-blue-600 font-semibold"><a href="{{ route('home') }}">Home</a></li>
            <li class="text-2xl text-blue-600"><a href="{{ route('articles.index') }}">Articles</a></li>
            <li class="text-2xl text-blue-600"><a href="{{ route('authors.index') }}">Authors</a></li>
        </ul>
    </nav>
    <main class="p-4">
        @yield('main')
    </main>
</body>
</html>
