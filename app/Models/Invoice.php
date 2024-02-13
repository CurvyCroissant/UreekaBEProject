<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Invoice extends Model
{
    use HasFactory;

    protected $fillable = [
        'cart_id',
        'sender_address',
        'post_code',
        'total',
    ];

    protected $casts = [
        'subtotal' => 'json',
        'quantity' => 'json',
    ];

    public function cart(){
        return $this->belongsTo(Cart::class);
    }

    protected $table = 'invoices';

}
