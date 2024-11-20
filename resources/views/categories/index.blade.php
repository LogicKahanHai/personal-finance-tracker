@extends('layout')

@section('title', 'Categories')

@section('content')
    <div class="max-w-3xl mx-auto">
        <h1 class="text-2xl font-bold mb-4">Categories</h1>
        <a href="{{ route('categories.create') }}" class="bg-blue-500 text-white py-2 px-4 rounded">Add Category</a>

        @if (session('success'))
            <p class="mt-4 text-green-600">{{ session('success') }}</p>
        @endif

        <ul class="mt-4">
            @foreach ($categories as $category)
                <li class="flex justify-between items-center p-4 mb-2 bg-white shadow rounded">
                    <span>{{ $category->name }}</span>
                    <div>
                        <a href="{{ route('categories.edit', $category->id) }}" class="text-blue-500 mr-2">Edit</a>
                        <form action="{{ route('categories.destroy', $category->id) }}" method="POST" class="inline">
                            @csrf
                            @method('DELETE')
                            <button type="submit" class="text-red-500">Delete</button>
                        </form>
                    </div>
                </li>
            @endforeach
        </ul>
    </div>
@endsection
