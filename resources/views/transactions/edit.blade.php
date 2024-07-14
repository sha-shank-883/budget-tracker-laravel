<!-- resources/views/transactions/edit.blade.php -->

@extends('layouts.app')

@section('content')
    <div class="container">
        <h2>Edit Transaction</h2>
        
        <form action="{{ route('transactions.update', $transaction->id) }}" method="POST">
            @csrf
            @method('PUT')
            
            <div class="form-group">
                <label for="description">Description</label>
                <input id="description" type="text" class="form-control" name="description" value="{{ $transaction->description }}" required>
            </div>

            <div class="form-group">
                <label for="amount">Amount</label>
                <input id="amount" type="number" step="0.01" class="form-control" name="amount" value="{{ $transaction->amount }}" required>
            </div>

            <div class="form-group">
                <label for="date">Date</label>
                <input id="date" type="date" class="form-control" name="date" value="{{ $transaction->date }}" required>
            </div>

            <div class="form-group">
                <label for="type">Type</label>
                <select id="type" class="form-control" name="type" required>
                    <option value="income" {{ $transaction->type == 'income' ? 'selected' : '' }}>Income</option>
                    <option value="expense" {{ $transaction->type == 'expense' ? 'selected' : '' }}>Expense</option>
                </select>
            </div>

            <button type="submit" class="btn btn-primary">Update Transaction</button>
        </form>
    </div>
@endsection
