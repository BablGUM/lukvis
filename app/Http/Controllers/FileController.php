<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class FileController extends Controller
{
    /**
     * Скачивание файла по ссылке
     *
     * @param Request $request Request
     *
     * @return mixed
     *
     * @Rest\Get("/file/download")
     */
    public function fileDownload(Request $request)
    {

        return response()->download(public_path($request->link), $request->fileName);
    }

    /**
     * Просмотр файла по ссылке
     *
     * @param Request $request
     *
     * @return \Symfony\Component\HttpFoundation\BinaryFileResponse
     * @Rest\Get("/file/check")
     */
    public function fileCheck(Request $request)
    {

        return response()->file(public_path($request->link));
    }

}
