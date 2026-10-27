<?php

namespace App\Http\Controllers;

use App\Models\Transaction;
use Illuminate\Http\Request;

class TransactionController extends Controller
{

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        $validate = $request->validate([
            'type' => 'required|in:income,expense',
            'amount' => 'required|numeric|min:0.01',
            'transaction_date' => 'required|date',
            'category' => 'required|string',
            'description' => 'nullable|string|max:2000',
            
        ]);
        
        Transaction::create($validate);

        return redirect()
            ->route('transactions.create')
            ->with('success', 'The transaction was successfully added.');
    }

    /**
     * Display the specified resource.
     */
    public function show()
    {
        $transactions = Transaction::latest()->get();
        return view('dompetku.transactions.index', compact('transactions'));
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(string $id)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, string $id)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        //
    }
}
