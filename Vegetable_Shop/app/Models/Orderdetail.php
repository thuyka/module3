<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Orderdetail extends Model
{
    use HasFactory;
    protected $table = 'orderdetail';
    protected $fillable = [
        'id', 'price', 'quantity', 'order_id', 'product_id',
    ];
    public function order() {
        return $this->belongToMany(Order::class, 'order_id', 'id');
    }
    public function product() {
        return $this->belongToMany(Product::class, 'product_id', 'id');
    }
}
