@extends('layouts.main')

@section('main')
        <h1 class="font-bold text-blue-600 text-4xl mb-2">Latest articles</h1>
        <div>
            @forelse ($articles as $article)
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
