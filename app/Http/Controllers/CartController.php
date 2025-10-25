<?php

namespace App\Http\Controllers;

use App\Models\Cart;
use Illuminate\Http\Request;
use App\Models\Obat;
use App\Models\Transaction;

class CartController extends Controller
{
    public function add($id)
    {
        $obat = Obat::find($id);
        if (!$obat) {
            return redirect()->back()->with('error', 'Obat tidak ditemukan.');
        }

        $cart = Cart::where('obat_id', $id)->first();
        if ($cart) {
            $cart->quantity += 1;
            $cart->save();
        } else {
            Cart::create(['obat_id' => $id, 'quantity' => 1]);
        }

        return redirect()->route('cart.index');
    }

    public function index()
    {
        $items = Cart::with('obat')->get();
        return view('cart.index', compact('items'));
    }

    public function checkout()
    {
        $items = Cart::with('obat')->get();
        $total = 0;

        foreach ($items as $item) {
            if ($item->obat) {
                $total += $item->obat->harga * $item->quantity;
            }
        }

        $trx = Transaction::create(['total' => $total]);
        Cart::truncate(); // kosongkan keranjang

        return redirect()->route('transaction.show', $trx->id);
    }
}
