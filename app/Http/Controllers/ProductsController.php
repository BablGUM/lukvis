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
        return response()->json( CategoryProduct::with('product:id,category_products_id,title')->get());
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