<?php

namespace App\Listeners;

use App\Http\Controllers\cartController;
use App\Http\Controllers\invoiceController;
use Illuminate\Auth\Events\Registered;

class CreateUserCartAndInvoice
{
    protected $cartController;
    protected $invoiceController;

    public function __construct(cartController $cartController, invoiceController $invoiceController)
    {
        $this->cartController = $cartController;
        $this->invoiceController = $invoiceController;
    }

    public function handle(Registered $event)
    {
        $userId = $event->user->id;

        $cart = $this->cartController->createForUser($userId);

        $invoice = $this->invoiceController->createInvoiceForCart($cart->id);
    }
}
