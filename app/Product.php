<?php


namespace App;


use Illuminate\Database\Eloquent\Model;

class Product extends Model
{
    protected $fillable = [
        'title',
        'description',
        'availability',
        'price',

    ];

    protected $hidden = [
        'category_products_id',
    ];

    public function categoryProduct()
    {
        return $this->hasMany('App\CategoryProduct');
    }
}