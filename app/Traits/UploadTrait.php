<?php

namespace App\Traits;

use Illuminate\Support\Facades\File;
use Illuminate\Support\Facades\Storage;

trait UploadTrait
{

    public function uploadFile($dossier, $photo)
    {
        $fileName = md5($photo . microtime()) . '.' . $photo->extension();
        $photo->storeAs('/', $fileName, $dossier);
        return $fileName;
    }


    public function deleteFile($dossier, $val)
    {
        if (File::exists(public_path($dossier . '/' . $val))) {
            File::delete(public_path($dossier . '/' . $val));
        }
    }


    // public function downloadFile($dossier, $nameFile, $nameOrigin)
    // {
    //     if (File::exists($dossier . '/' . $nameFile)) {
    //         return Storage::disk($dossier)->download($nameFile, $nameOrigin);
    //     }
    //     dd('f');
    // }
}
