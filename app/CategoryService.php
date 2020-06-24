<?php


namespace App;


use Illuminate\Database\Eloquent\Model;

class CategoryService extends Model
{
    protected $fillable = [
        'name',
        'path_to',

    ];

    public function service()
    {
        return $this->hasMany('App\Service','category_services_id','id');
    }


}