<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Invoice;

class invoiceController extends Controller
{
    public function createInvoice(Invoice $invoice)
    {
        $cartData = $invoice->cart;
        $itemData = $cartData->item;

        return view('invoiceCreate', compact('invoice', 'cartData', 'itemData'));
    }

    public function store(Request $request, Invoice $invoice)
    {
        $validatedData = $request->validate([
            'sender_address' => 'required|string|min:10|max:100',
            'post_code' => 'required|string|min:5|max:10',
            'subtotal' => 'required|integer',
            'total' => 'required|integer',
            'quantity' => 'required|integer',
        ]);
    
        $invoice->update($validatedData);

        return redirect('/display-invoice/' . $invoice->id);
    }

    public function display(Invoice $invoice)
    {
        return view('invoiceDisplay', compact('invoice'));
    }
}
