<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class DashboardController extends Controller
{
    public function index() {
        $totalIncome = auth()->user()->transactions()->where('type', 'income')->sum('amount');
        $totalExpense = auth()->user()->transactions()->where('type', 'expense')->sum('amount');
        $balance = $totalIncome - $totalExpense;

        return view('dashboard.index', compact('totalIncome', 'totalExpense', 'balance'));
    }
}

