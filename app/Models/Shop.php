<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Shop extends Model
{
    use HasFactory;

    protected $fillable = [
        'user_id',
        'product_name',
        'quantity',
        'price'
    ];

    public function user() {
        return $this->belongsTo(User::class, 'user_id');
    }
}
