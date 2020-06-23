<?php


namespace App;


use Illuminate\Database\Eloquent\Model;

class CategoryProduct extends Model
{
    protected $fillable = [
        'name',
        'path_to',

    ];

    public function product()
    {
        return $this->hasMany('App\Product');
    }


}