<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Brand extends Model
{
    public $fillable =[
        'description',
        'image',
        'name',
    ];

    public function products(){
        return $this->hasMany(Category::class);
    }
}
