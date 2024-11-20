@extends('layout')

@section('title', 'Add Transaction')

@section('content')

    <div class="max-w-3xl mx-auto">
        <h1 class="text-2xl font-bold mb-4">Add Transaction</h1>
        <form action="{{ route('transactions.store') }}" method="POST" class="bg-white p-6 shadow rounded">
            @csrf
            <label for="amount" class="block font-medium mb-2">Amount:</label>
            <input type="number" name="amount" id="amount" step="0.01" required
                class="w-full border-gray-300 rounded mb-4">

            <label for="category_id" class="block font-medium mb-2">Category:</label>
            <select name="category_id" id="category_id" required class="w-full border-gray-300 rounded mb-4">
                @foreach ($categories as $category)
                    <option value="{{ $category->id }}">{{ $category->name }}</option>
                @endforeach
            </select>

            <label for="type" class="block font-medium mb-2">Type:</label>
            <select name="type" id="type" required class="w-full border-gray-300 rounded mb-4">
                <option value="income">Income</option>
                <option value="expense">Expense</option>
            </select>

            <label for="transaction_date" class="block font-medium mb-2">Date:</label>
            <input type="date" name="transaction_date" id="transaction_date" required
                class="w-full border-gray-300 rounded mb-4">

            <button type="submit" class="bg-blue-500 text-white py-2 px-4 rounded">Save</button>
        </form>
        <a href="{{ route('transactions.index') }}" class="text-blue-500 mt-4 inline-block">Back to Transactions</a>
    </div>
@endsection
