<?php

namespace App\Models;

use App\Models\Payment;
use App\Models\Product;
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

    public function payment()
    {
        return $this->hasOne(Payment::class);
    }
}
