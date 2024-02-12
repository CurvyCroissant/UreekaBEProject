<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Item extends Model
{
    use HasFactory;

    protected $fillable = [
        'name',
        'price',
        'quantity',
        'category_id',
        'cart_id',
        'image',
    ];
    
    public function category(){
        return $this->belongsTo(Category::class);
    }

    public function cart(){
        return $this->belongsToMany(Cart::class, 'item_cart');
    }

    protected $table = 'items';

}