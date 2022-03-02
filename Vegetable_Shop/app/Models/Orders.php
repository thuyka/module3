<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Orders extends Model
{
    use HasFactory;
    protected $table = 'orders';
    protected $fillable = [
         'status', 'code', 'customer_id', 
    ];
    public function customer() {
        return $this->belongTo(Customer::class, 'customer_id', 'id');
    }
    public function orderdetail() {
        return $this->hasMany(Orderdetail::class, 'order_id', 'id');
    }
}
