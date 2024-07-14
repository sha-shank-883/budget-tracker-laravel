<?php
namespace App\Http\Controllers;

use App\Models\Transaction; // Import the Transaction model
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class TransactionController extends Controller
{
   public function index()
{
    $transactions = Auth::user()->transactions()->latest()->get();
    // $header = 'View Transaction';
    return view('transactions.index', compact('transactions'));
}
  // TransactionController.php
public function create()
{
    $header = 'Create Transaction'; // Example header variable
    return view('transactions.create', compact('header'));
}

public function store(Request $request)
{
    $request->validate([
        'description' => 'required',
        'amount' => 'required|numeric',
        'date' => 'required|date',
        'type' => 'required|in:income,expense',
    ]);

    $transaction = new Transaction();
    $transaction->user_id = Auth::id();
    $transaction->description = $request->description;
    $transaction->amount = $request->amount;
    $transaction->date = $request->date;
    $transaction->type = $request->type;
    $transaction->save();

    return redirect()->route('transactions.index')
                     ->with('success', 'Transaction created successfully.');
}

    public function edit(Transaction $transaction) {
        return view('transactions.edit', compact('transaction'));
    }

      public function update(Request $request, $id)
    {
        $transaction = Transaction::findOrFail($id);

        $request->validate([
            'description' => 'required',
            'amount' => 'required|numeric',
            'date' => 'required|date',
            'type' => 'required|in:income,expense',
        ]);

        // Update transaction attributes
        $transaction->fill([
            'description' => $request->description,
            'amount' => $request->amount,
            'date' => $request->date,
            'type' => $request->type,
        ]);
        $transaction->save();

        return redirect()->route('transactions.index')
                         ->with('success', 'Transaction updated successfully.');
    }

    public function destroy(Transaction $transaction) {
        $transaction->delete();
        return redirect()->route('transactions.index');
    }
    
    public function dashboard()
    {
       
        if (!Auth::check()) {
            return redirect()->route('login');
        }

        $user_id = Auth::id();
        $totalIncome = Transaction::where('user_id', $user_id)
            ->where('type', 'income')
            ->sum('amount');

        $totalExpenses = Transaction::where('user_id', $user_id)
            ->where('type', 'expense')
            ->sum('amount');

        $balance = $totalIncome - $totalExpenses;
        dd($totalIncome, $totalExpenses, $balance);

        return view('dashboard', compact('totalIncome', 'totalExpenses', 'balance'));
    }




}

