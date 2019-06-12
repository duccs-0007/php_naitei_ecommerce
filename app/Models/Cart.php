<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Cart extends Model
{
    public $items = null;
    public $totalQuantity = 0;
    public $totalPrice = 0;
    public $image = null;

    public function __construct($oldCart)
    {
        if ($oldCart)
        {
            $this->items = $oldCart->items;
            $this->totalQuantity = $oldCart->totalQuantity;
            $this->totalPrice = $oldCart->totalPrice;
        }
    }

    public function add($item, $id, $quantity)
    {
        $storedItem = [
            'quantity' => config('setting.zero_value'), 
            'price' => $item->price, 
            'item' => $item,
        ];

        if ($this->items && array_key_exists($id, $this->items))
        {
           $storedItem = $this->items[$id];
        }

        $storedItem['quantity'] += $quantity;
        $storedItem['price'] = $item->price * $storedItem['quantity'];

        $this->items[$id] = $storedItem;
        $this->totalQuantity += $quantity;
        $this->totalPrice += round($item->price * $quantity, 2);
    }
}
