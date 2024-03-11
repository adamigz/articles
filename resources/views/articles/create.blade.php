@extends('layouts.main')

@section('main')
    <form action="{{ route('articles.store') }}" method="POST" class="bg-white rounded-md py-2 px-4 grid shadow mx-auto text-blue-600">
        @csrf
        @method('POST')
        <h1 class="text-3xl">Create article</h1>
        <hr class="mb-4">
        <div class="mb-4 grid">
            <p>Title</p>
            <input class="border border-slate-200 rounded-md" type="text" name="title">
            @if($errors->has('title'))
                <p class="text-red-600">{{ $errors->get('title')[0] }}</p>
            @endif
        </div>
        <div class="mb-4 grid">
            <p>Content</p>
            <textarea class="border border-slate-200 rounded-md" name="content"></textarea>
            @if($errors->has('content'))
                <p class="text-red-600">{{ $errors->get('content')[0] }}</p>
            @endif
        </div>
        <div class="mb-4 grid">
            <p>Authors <span class="text-slate-400">(click with ctrl or cmd to select many authors)</span></p>
            <select name="authors[]" multiple class="border border-slate-200 rounded-md"">
                @foreach ($authors as $author)
                    <option value="{{ $author->id }}">{{ $author->fullname }}</option>
                @endforeach
            </select>
            @if($errors->has('authors'))
                <p class="text-red-600">{{ $errors->get('authors')[0] }}</p>
            @endif
        </div>
        <input class="rounded-md bg-blue-600 text-white px-4 py-2 cursor-pointer hover:bg-blue-700" type="submit" value="Create">
    </form>
@endsection
