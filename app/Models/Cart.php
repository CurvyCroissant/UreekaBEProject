<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use App\Models\Item;

class Cart extends Model
{
    use HasFactory;

    protected $fillable = [
        'user_id',
    ];

    public function user(){
        return $this->belongsTo(User::class);
    }

    public function item(){
        return $this->belongsToMany(Item::class, 'item_cart');
    }

    public function invoice(){
        return $this->hasOne(Invoice::class);
    }

    protected $table = 'carts';

}
