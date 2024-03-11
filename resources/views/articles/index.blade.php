@extends('layouts.main')

@section('main')
    <div class="flex items-center mb-2">
        <h1 class="font-bold text-blue-600 text-4xl mb-2">Articles</h1>
        <a class="bg-blue-600 text-white rounded-md hover:bg-blue-700 py-2 px-4 ml-4" href="{{ route('articles.create') }}">Create</a>
    </div>
    <div>
        @forelse ($articles as $article)
            <article class="rounded-md text-blue-600 bg-white p-2 mb-4">
                <div class="flex items-center mb-2">
                    <a href="{{ route('articles.show', ['article' => $article]) }}"><h3 class="text-3xl mb-2 hover:text-blue-700">{{ $article->title }}</h3></a>
                    <form action="{{ route('articles.destroy', ['article' => $article]) }}" method="POST">
                        @csrf
                        @method('DELETE')
                        <input type="submit" class="bg-red-600 text-white rounded-md hover:bg-red-700 py-2 px-4 ml-4" value="Delete">
                    </form>
                </div>
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
