<!-- resources/views/dashboard.blade.php -->

@extends('layouts.app')

@section('content')
    <div class="container">
        <div class="d-flex justify-content-between align-items-center mb-4">
            <h2 class="font-weight-bold">Summary Dashboard</h2>
        </div>

        <div class="navbar-nav">
            <a href="{{ route('transactions.create') }}" class="btn btn-primary">
                <i class="fas fa-plus"></i> Create Transaction
            </a>
            <a href="{{ route('transactions.index') }}" class="btn btn-secondary">
                <i class="fas fa-list"></i> View Transactions
            </a>
        </div>

        <div class="row mt-4">
            <div class="col-md-4">
                <div class="card mb-3 shadow-sm">
                    <div class="card-header bg-success ">Total Income</div>
                    <div class="card-body">
                        <h4 class="card-title">${{ number_format($totalIncome ?? 0, 2) }}</h4>
                    </div>
                </div>
            </div>

            <div class="col-md-4">
                <div class="card mb-3 shadow-sm">
                    <div class="card-header bg-danger ">Total Expenses</div>
                    <div class="card-body">
                        <h4 class="card-title">${{ number_format($totalExpenses ?? 0, 2) }}</h4>
                    </div>
                </div>
            </div>

            <div class="col-md-4">
                <div class="card mb-3 shadow-sm">
                    <div class="card-header bg-info ">Balance</div>
                    <div class="card-body">
                        <h4 class="card-title">${{ number_format($balance ?? 0, 2) }}</h4>
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection
