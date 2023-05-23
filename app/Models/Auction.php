<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Auction extends Model
{
    use HasFactory;

    protected $fillable = [
        'name',
        'description',
        'current_price',
        'image',
        'end_date',
        'category_id'
    ];

    public function category(){
        return $this->belongsTo(Category::class, 'category_id');
    }

    public function bids(){
        return $this->hasMany(Bid::class);
    }
}
