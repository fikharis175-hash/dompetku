<?php

namespace App\Http\Controllers;

use App\Models\Transaction;
use Illuminate\Http\Request;

class DashboardController extends Controller
{
    public function index() 
    {
        $totalRevenue = Transaction::query()
            ->where('type', 'income')
            ->sum('amount');
        $totalExpenses = Transaction::query()
            ->where('type', 'expense')
            ->sum('amount');
        $transactions = Transaction::latest()
            ->take(5)
            ->get();
        $netBalance = $totalRevenue - $totalExpenses;
        
        return view('dompetku.dashboard', compact('totalRevenue', 'totalExpenses', 'transactions', 'netBalance'));
    }
}
