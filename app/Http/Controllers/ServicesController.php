<?php


namespace App\Http\Controllers;


use App\CategoryService;
use App\Image;
use App\Service;
use Illuminate\Support\Arr;

class ServicesController extends Controller
{

    /**
     * @return \Illuminate\Http\JsonResponse
     */
    public function index()
    {
        $img = array();
        $products = Service::all('id', 'title', 'category_services_id')
            ->groupBy('category_services_id')
            ->keyBy(function ($item, $key) {
                $category_name = CategoryService::where('id', '=', $key)->get()->first()->name;
                return $key = $category_name;

            });

        for ($i = count(CategoryService::all()); $i > 0; $i--) {
            $img = Arr::prepend($img,
                CategoryService::where('id', '=', $i)->get()->first()->path_to,
                CategoryService::where('id', '=', $i)->get()->first()->name

            );
        }
        $img = array($img);
        return response()->json($products->prepend($img, 'images_services'), 200);
    }

    /**
     * @param $id
     * @return \Illuminate\Http\JsonResponse
     */
    public function show($id)
    {
        $data = [
            'services' => Service::findOrFail($id),
            'image' => Image::where('services_id',$id)->get('path_to'),
        ];
        return response()->json($data);
    }

}