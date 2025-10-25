<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Transaction;
class TransactionController extends Controller
{
    public function show($id)
{
    $transaction = Transaction::findOrFail($id);
    return view('transaction.show', compact('transaction'));
}

}
