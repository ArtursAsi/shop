<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Product extends Model
{
    protected $fillable = [
        'name',
        'image',
        'description',
        'price'
    ];

    public function getPicture(){
        return '/storage/'.$this->image;
    }
}
