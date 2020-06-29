<?php


namespace App;


use Illuminate\Database\Eloquent\Model;

class Image extends Model
{
    protected $fillable = [
        'path_to'
    ];

    /**
     * The attributes that should be hidden for arrays.
     *
     * @var array
     */
    protected $hidden = [
        'id', 'product_id', 'service_id'
    ];

}