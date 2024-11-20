@extends('layout')

@section('title', 'Edit Category')

@section('content')

    <div class="max-w-3xl mx-auto">
        <h1 class="text-2xl font-bold mb-4">Edit Category</h1>
        <form action="{{ route('categories.update', $category->id) }}" method="POST" class="bg-white p-6 shadow rounded">
            @csrf
            @method('PUT')
            <label for="name" class="block font-medium mb-2">Category Name:</label>
            <input type="text" name="name" id="name" value="{{ $category->name }}" required
                class="w-full border-gray-300 rounded mb-4">

            <button type="submit" class="bg-blue-500 text-white py-2 px-4 rounded">Update</button>
        </form>
        <a href="{{ route('categories.index') }}" class="text-blue-500 mt-4 inline-block">Back to Categories</a>
    </div>

@endsection
