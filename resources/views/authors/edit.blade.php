@extends('layouts.main')

@section('main')
    <form action="{{ route('authors.update', ['author' => $author]) }}" method="POST" class="bg-white rounded-md py-2 px-4 grid shadow mx-auto text-blue-600">
        @csrf
        @method('PATCH')
        <h1 class="text-3xl">Update author</h1>
        <hr class="mb-4">
        <div class="mb-4 grid">
            <p>Name</p>
            <input class="border border-slate-200 rounded-md" type="text" name="name" value="{{ $author->name }}">
            @if($errors->has('name'))
                <p class="text-red-600">{{ $errors->get('name')[0] }}</p>
            @endif
        </div>
        <div class="mb-4 grid">
            <p>Surname</p>
            <input class="border border-slate-200 rounded-md" type="text" name="surname" value="{{ $author->surname }}">
            @if($errors->has('surname'))
                <p class="text-red-600">{{ $errors->get('surname')[0] }}</p>
            @endif
        </div>
        <input class="rounded-md bg-blue-600 text-white px-4 py-2 cursor-pointer hover:bg-blue-700" type="submit" value="Update">
    </form>
@endsection
