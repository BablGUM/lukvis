<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Filesystem\Filesystem;

class Mail extends Model
{
    /**
     * @param $request
     * @return string
     */
    public function fileSave($request)
    {
        if($request->file){
            $file = new Filesystem();
            $fileName = $request->file->getClientOriginalName();
            $fileName = str_replace(" ", "", $fileName);

            $file->makeDirectory(public_path('/file/'), 0777, true, true);

            $path = $request->file('file')->move(public_path('/file/'), $fileName);
            $photoURL = '/file/' . '/' . $fileName;
            return $photoURL;
        }

    }

    public function deleteFile($path)
    {
        $file = new Filesystem();

        $file->deleteDirectory(public_path('/file/'));
    }
}
