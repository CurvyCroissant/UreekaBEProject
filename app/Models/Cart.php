<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Cart extends Model
{
    use HasFactory;

    protected $fillable = [
        'user_id',
        'item_id',
    ];

    public function user(){
        return $this->belongsTo(User::class);
    }

    public function item(){
        return $this->hasMany(Item::class);
    }

    public function invoice(){
        return $this->hasOne(Invoice::class);
    }

    protected $table = 'carts';

}
