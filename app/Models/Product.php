<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use App\Order;
use Nicolaslopezj\Searchable\SearchableTrait;

class Product extends Model
{
    use SearchableTrait;

    protected $guarded = [
        'id'
    ];

    protected $casts = [
        'images' => 'array'
    ];

    /**
     * Searchable rules.
     *
     * @var array
     */
    protected $searchable = [
        /**
         * Columns and their priority in search results.
         * Columns with higher values are more important.
         * Columns with equal values have equal importance.
         *
         * @var array
         */
        'columns' => [
            'products.name' => 10,
            'products.description' => 5,
            'products.price' => 2,
        ]
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
