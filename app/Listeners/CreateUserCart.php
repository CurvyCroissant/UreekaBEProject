<?php

namespace App\Listeners;

use App\Http\Controllers\cartController;
use Illuminate\Auth\Events\Registered;

class CreateUserCart
{
    protected $cartController;

    public function __construct(cartController $cartController)
    {
        $this->cartController = $cartController;
    }

    public function handle(Registered $event)
    {
        $userId = $event->user->id;
        $this->cartController->createForUser($userId);
    }
}
