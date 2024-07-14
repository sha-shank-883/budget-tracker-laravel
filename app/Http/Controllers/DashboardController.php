<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Transaction;
use Illuminate\Support\Facades\Auth;

class DashboardController extends Controller
{
   public function index()
{
    $user_id = Auth::id();

    $totalIncome = Transaction::where('user_id', $user_id)
        ->where('type', 'income')
        ->sum('amount');

    $totalExpenses = Transaction::where('user_id', $user_id)
        ->where('type', 'expense')
        ->sum('amount');

    $balance = $totalIncome - $totalExpenses;

    // dd($totalIncome, $totalExpenses, $balance);

    return view('dashboard', compact('totalIncome', 'totalExpenses', 'balance'));
}

}