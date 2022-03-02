<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Products extends Model
{
    use HasFactory;
    protected $table = 'products';
    protected $fillable = [
        'name', 'image', 'price', 'description', 'quantity', 'category_id',
    ];
    public function categories() {
        return $this->belongsTo(Categories::class, 'category_id', 'id');
    }
    public function orderdetail() {
        return $this->belongsToMany(Orderdetail::class, 'order_id', 'id');
    }
}
