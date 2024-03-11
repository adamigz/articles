@extends('layouts.main')

@section('main')
    <article class="bg-white rounded-md shadow p-4 text-blue-600">
        <div class="flex items-center mb-2">
            <h1 class="text-4xl ">{{ $article->title }}</h1>
            <a class="bg-blue-600 text-white rounded-md hover:bg-blue-blue-700 py-2 px-4 ml-4" href="{{ route('articles.edit', ['article' => $article]) }}">Update</a>
        </div>
        <hr class="mb-4">
        <p>{{ $article->content }}</p>
        <hr class="mt-4">
        <div class="flex flex-row-reverse gap-x-4   ">
            <h5 class="text-right">Authors: @foreach ($article->authors as $author)
                <a class="hover:text-blue-700" href="{{ route('authors.show', ['author' => $author]) }}">{{ $author->fullname }}</a>@if( !$loop->last), @endif
            @endforeach</h5>
            <h5 class="text-right text-slate-400 underline">Created at: {{ $article->created_at }}</h5>
            <h5 class="text-right text-slate-400 underline">Updated at: {{ $article->updated_at }}</h5>
        </div>
    </article>
@endsection
