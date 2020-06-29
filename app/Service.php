<?php


namespace App;


use Illuminate\Database\Eloquent\Model;

class Service extends Model
{

    protected $fillable = [
        'title',
        'description',
        'availability',
        'price',
        'category_services_id',
    ];

    protected $hidden = [
        'category_services_id',
    ];


    public function categoryService()
    {
        return $this->belongsTo(CategoryService::class);
    }

    public function imagesShow()
    {
        return $this->hasMany('App\Image');
    }
}