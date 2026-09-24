<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Order extends Model
{
    protected $fillable = [
        'product_id',
        'color',
        'size',
        'model',
        'quantity',
        'design',
        'notes',
        'status',
    ];
    public function product()
    {
        return $this->belongsTo(Product::class);
    }
}
