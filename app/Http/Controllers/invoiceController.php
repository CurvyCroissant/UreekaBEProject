<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Invoice;
use App\Models\Cart;
use App\Models\Item;

class invoiceController extends Controller
{

    public function createInvoiceForCart($cartId)
    {
        $cart = Cart::findOrFail($cartId);

        $invoice = new Invoice();

        $invoice->cart()->associate($cart);

        $invoice->save();

        return $invoice;
    }

    public function createInvoice($cartId)
    {

        $cart = Cart::with('item')->find($cartId);
        $invoice = $cart->invoice;

        return view('invoiceCreate', [
            'title' => 'Create Invoice',
            'cart' => $cart,
            'invoice' => $invoice,
        ]);
    }

    public function store(Request $request)
    {
        $request->validate([
            'cart_id' => 'required|exists:cart,id',
            'sender_address' => 'required|string|min:10|max:100',
            'post_code' => 'required|string|min:5|max:10',
            'subtotal.*' => 'required|integer',
            'total' => 'required|integer',
            'quantity.*' => 'required|integer',
        ]);

        $invoice = Invoice::where('cart_id', $request->cart_id)->firstOrFail();

        $invoice->update([
            'sender_address' => $request->sender_address,
            'post_code' => $request->post_code,
            'subtotal' => $request->subtotal,
            'total' => $request->total,
            'quantity' => $request->quantity,
        ]);

        return redirect()->route('invoice.display', $invoice->id);
    }


    public function display(Invoice $invoice)
    {
        $invoice->load('cart', 'cart.item');

        $cart = $invoice->cart;
        $item = $cart->item ?? [];
        $title = 'Invoice Display';

        return view('invoiceDisplay', compact('invoice', 'cart', 'item', 'title'));
    }
}
