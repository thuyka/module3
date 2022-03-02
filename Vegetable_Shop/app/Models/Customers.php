<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Customers extends Model
{
    use HasFactory;
    protected $table = 'customers';
    protected $fillable = [
        'id', 'name', 'email', 'address', 'phone',
    ];
    public function orders() {
        return $this->hasMany(Order::class);
    }
}
