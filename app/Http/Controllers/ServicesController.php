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
        return response()->json( CategoryService::with('service:id,category_services_id,title')->get());
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