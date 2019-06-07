<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Category extends Model
{
    protected $guard = [
        'id',
    ];

    public function products()
    {
        return $this->hasMany(Product::class);
    }

    public function children(){
        return $this->hasMany( Category::class, 'parent', 'id' );
    }
    
    public function parent(){
    return $this->hasOne( Category::class, 'id', 'parent' );
    }
}
