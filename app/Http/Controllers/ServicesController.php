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
        $data = Service::with('imagesShow')->find($id);

        return response()->json($data);
    }

}