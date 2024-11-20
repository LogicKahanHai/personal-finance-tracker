@extends('layout')

@section('title', 'Transactions')

@section('content')
    <div class="max-w-4xl mx-auto">
        <h1 class="text-2xl font-bold mb-4">Transactions</h1>

        <!-- Summary Section -->
        <div class="bg-white p-6 shadow rounded mb-6">
            <h2 class="text-xl font-semibold mb-2">Financial Summary</h2>
            <div class="flex justify-between text-lg">
                <div>
                    <span class="font-medium">Total Income:</span>
                    <span class="text-green-600">₹{{ number_format($totalIncome, 2) }}</span>
                </div>
                <div>
                    <span class="font-medium">Total Expense:</span>
                    <span class="text-red-500">₹{{ number_format($totalExpense, 2) }}</span>
                </div>
                <div>
                    <span class="font-medium">Balance:</span>
                    <span
                        class="{{ $balance >= 0 ? 'text-green-600' : 'text-red-500' }}">₹{{ number_format($balance, 2) }}</span>
                </div>
            </div>
        </div>

        <!-- Add Transaction Button -->
        <a href="{{ route('transactions.create') }}" class="bg-blue-500 text-white py-2 px-4 rounded mb-4 inline-block">Add
            Transaction</a>

        <!-- Transactions List -->
        <ul class="mt-4">
            @foreach ($transactions as $transaction)
                <li class="flex justify-between items-center p-4 mb-2 bg-white shadow rounded">
                    <div>
                        <p class="font-medium  {{ $transaction->type === 'income' ? 'text-green-600' : 'text-red-500' }}">
                            {{ $transaction->type === 'income' ? '+' : '-' }} ₹{{ $transaction->amount }}
                        </p>
                        <p class="text-sm text-gray-500">
                            <span class="font-bold">{{ $transaction->category->name }}</span> on
                            {{ \Carbon\Carbon::parse($transaction->transaction_date)->format('jS M, Y') }}
                        </p>
                    </div>
                    <div>
                        <a href="{{ route('transactions.edit', $transaction->id) }}" class="text-blue-500 mr-2">Edit</a>
                        <form action="{{ route('transactions.destroy', $transaction->id) }}" method="POST" class="inline">
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
