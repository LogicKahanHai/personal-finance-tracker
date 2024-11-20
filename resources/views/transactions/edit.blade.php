@extends('layout')

@section('title', 'Edit Transaction')

@section('content')

    <div class="max-w-3xl mx-auto">
        <h1 class="text-2xl font-bold mb-4">Edit Transaction</h1>
        <form action="{{ route('transactions.update', $transaction->id) }}" method="POST" class="bg-white p-6 shadow rounded">
            @csrf
            @method('PUT')

            <!-- Amount Input -->
            <label for="amount" class="block font-medium mb-2">Amount:</label>
            <input type="number" name="amount" id="amount" value="{{ $transaction->amount }}" step="0.01" required
                class="w-full border-gray-300 rounded mb-4">

            <!-- Category Select -->
            <label for="category_id" class="block font-medium mb-2">Category:</label>
            <select name="category_id" id="category_id" required class="w-full border-gray-300 rounded mb-4">
                @foreach ($categories as $category)
                    <option value="{{ $category->id }}" {{ $transaction->category_id == $category->id ? 'selected' : '' }}>
                        {{ $category->name }}
                    </option>
                @endforeach
            </select>

            <!-- Type Select -->
            <label for="type" class="block font-medium mb-2">Type:</label>
            <select name="type" id="type" required class="w-full border-gray-300 rounded mb-4">
                <option value="income" {{ $transaction->type == 'income' ? 'selected' : '' }}>Income</option>
                <option value="expense" {{ $transaction->type == 'expense' ? 'selected' : '' }}>Expense</option>
            </select>

            <!-- Transaction Date Input -->
            <label for="transaction_date" class="block font-medium mb-2">Date:</label>
            <input type="date" name="transaction_date" id="transaction_date" value="{{ $transaction->transaction_date }}"
                required class="w-full border-gray-300 rounded mb-4">

            <!-- Submit Button -->
            <button type="submit" class="bg-blue-500 text-white py-2 px-4 rounded">Update</button>
        </form>

        <!-- Back Link -->
        <a href="{{ route('transactions.index') }}" class="text-blue-500 mt-4 inline-block">Back to Transactions</a>
    </div>
@endsection
