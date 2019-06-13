<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use App\Order;

class Product extends Model
{
    protected $guarded = [
        'id'
    ];

    protected $casts = [
        'images' => 'array'
    ];

    public function users()
    {
        return $this->belongsToMany(User::class);
    }

    public function category()
    {
        return $this->belongsTo(Category::class);
    }

    public function orders()
    {
        return $this->belongsToMany(Order::class, 'order_product');
    }
}
