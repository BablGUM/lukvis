<?php

namespace App\Http\Controllers;


use App\CategoryProduct;
use App\CategoryService;
use App\Image;
use App\Product;
use Illuminate\Support\Arr;

class ProductsController extends Controller
{
    /**
     * @return \Illuminate\Http\JsonResponse
     */
    public function index()
    {
        $img = array();
        $products = Product::all('id', 'title', 'category_products_id')
            ->groupBy('category_products_id')
            ->keyBy(function ($item, $key) {
                $category_name = CategoryProduct::where('id', '=', $key)->get()->first()->name;
                return $key = $category_name;

            });

        for ($i = count(CategoryProduct::all()); $i > 0; $i--) {
            $img = Arr::prepend($img,
                CategoryProduct::where('id', '=', $i)->get()->first()->path_to,
                CategoryProduct::where('id', '=', $i)->get()->first()->name

            );
        }
        $img = array($img);
        return response()->json($products->prepend($img, 'images_products'), 200);
    }

    /**
     * @param $id
     * @return \Illuminate\Http\JsonResponse
     */
    public function show($id)
    {
        $data = [
            'product' => Product::findOrFail($id),
            'image' => Image::where('product_id',$id)->get('path_to'),
        ];
        return response()->json($data);
    }

    public function indexCategory()
    {
        $data = [
            'category_product' => CategoryProduct::all('id','name'),
            'category_service' => CategoryService::all('id','name'),
        ];
        return response()->json($data,200);
    }


}