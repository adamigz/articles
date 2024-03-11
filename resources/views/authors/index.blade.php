@extends('layouts.main')

@section('main')
    <div class="flex items-center mb-2">
        <h1 class="font-bold text-blue-600 text-4xl mb-2">Authors</h1>
        <a class="bg-blue-600 text-white rounded-md hover:bg-blue-700 py-2 px-4 ml-4" href="{{ route('authors.create') }}">Create</a>
    </div>
    <div>
        @forelse ($authors as $author)
            <div class="rounded-md text-blue-600 bg-white p-2 mb-4">
                <div class="flex items-center mb-2">
                    <a href="{{ route('authors.show', ['author' => $author]) }}"><h3 class="text-3xl mb-2 hover:text-blue-700">{{ $author->fullname }}</h3></a>
                    <form action="{{ route('authors.destroy', ['author' => $author]) }}" method="POST">
                        @csrf
                        @method('DELETE')
                        <input type="submit" class="bg-red-600 text-white rounded-md hover:bg-red-700 py-2 px-4 ml-4" value="Delete">
                    </form>
                </div>
                <h5>Articles: {{ $author->articles->count() }}</h5>
            </div>
        @empty
            <div class="rounded-md bg-white p-2">
                <h3>No authors yet...</h3>
            </div>
        @endforelse
    </div>
@endsection
