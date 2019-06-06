<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Category extends Model
{
    protected $guard = [
        'id',
    ];

    public function products()
    {
        return $this->hasMany(Category::class);
    }

    public function children(){
        return $this->hasMany( Category::class, 'parent', 'id' );
    }
    
    public function parent(){
    return $this->hasOne( Category::class, 'id', 'parent' );
    }
}
