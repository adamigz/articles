@extends('layouts.main')

@section('main')
    <div class="flex items-center mb-2">
        <h1 class="font-bold text-blue-600 text-4xl mb-2">{{ $author->fullname }}</h1>
        <a class="bg-blue-600 text-white rounded-md hover:bg-blue-blue-700 py-2 px-4 ml-4" href="{{ route('authors.edit', ['author' => $author]) }}">Update</a>
    </div>
    <div>
        @forelse ($author->articles as $article)
            <article class="rounded-md text-blue-600 bg-white p-2 mb-4">
                <a href="{{ route('articles.show', ['article' => $article]) }}"><h3 class="text-3xl mb-2 hover:text-blue-700">{{ $article->title }}</h3></a>
                <h5 class="mb-2">{{ Str::of($article->content)->limit(300) }}</h5>
                <h5 class="text-right">Authors: @foreach ($article->authors as $author)
                    <a class="hover:text-blue-700" href="{{ route('authors.show', ['author' => $author]) }}">{{ $author->fullname }}</a>@if( !$loop->last), @endif
                @endforeach</h5>
            </article>
        @empty
            <div class="rounded-md bg-white p-2">
                <h3>No articles yet...</h3>
            </div>
        @endforelse
    </div>
@endsection
