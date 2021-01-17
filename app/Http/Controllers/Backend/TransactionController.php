<?php

namespace App\Http\Controllers\Backend;

use App\Http\Controllers\Controller;
use App\Models\Transaction;
use Illuminate\Support\Facades\View;
use App\Http\Requests\Backend\TransactionRequest;

class TransactionController extends Controller
{
    function __construct(Transaction $transaction)
    {
        $this->transaction = $transaction;
     
        $this->authorizeResource(Transaction::class, 'transaction');
    }

    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $transactions = $this->transaction->paginate(10);

        return View::make('backend.transactions.index', compact('transactions'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return View::make('backend.transactions.create');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \App\Http\Requests\TransactionRequest  $request
     * @return \Illuminate\Http\Response
     */
    public function store(TransactionRequest $request)
    {
        $transactionArray = $this->transaction->prepareTransactionArray($request);
        $transaction = $this->transaction->create($transactionArray);

        return redirect()->route('dashboard.transactions.show', $transaction->id)->with('status', 'Transaction created.');
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\Transaction  $transaction
     * @return \Illuminate\Http\Response
     */
    public function show(Transaction $transaction)
    {
        return View::make('backend.transactions.show', compact('transaction'));
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\Transaction  $transaction
     * @return \Illuminate\Http\Response
     */
    public function edit(Transaction $transaction)
    {
        return View::make('backend.transactions.edit', compact('transaction'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \App\Http\Requests\TransactionRequest  $request
     * @param  \App\Models\Transaction  $transaction
     * @return \Illuminate\Http\Response
     */
    public function update(TransactionRequest $request, Transaction $transaction)
    {
        $transactionArray = $this->transaction->prepareTransactionArray($request);
        $transaction->update($transactionArray);

        return redirect()->route('dashboard.transactions.show', $transaction->id)->with('status', 'Transaction updated.');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\Transaction  $transaction
     * @return \Illuminate\Http\Response
     */
    public function destroy(Transaction $transaction)
    {
        $transaction->delete();

        return redirect()->route('dashboard.transactions.index')->with('status', 'Transaction Deleted!');
    }
}
