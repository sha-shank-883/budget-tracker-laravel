<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class ReportController extends Controller
{
    public function monthly() {
        $monthlyReport = auth()->user()->transactions()
            ->selectRaw('MONTH(date) as month, YEAR(date) as year, type, SUM(amount) as total')
            ->groupBy('month', 'year', 'type')
            ->get();

        return view('reports.monthly', compact('monthlyReport'));
    }
}

