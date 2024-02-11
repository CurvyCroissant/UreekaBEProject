<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Book extends Model
{
    use HasFactory;

    protected $fillable = [
        'name',
        'price',
        'quantity',
        'genre_id',
        'image'
    ];
    
    public function genre(){
        return $this->belongsTo(Genre::class);
    }

    public function customer(){
        return $this->belongsToMany(Customer::class);
    }
}