<?php

namespace App\Services;

class FileUploadService
{
    public function upload($file)
    {
        $filenameWithExt = $file->getClientOriginalName();
        //Get just filename
        $filename = pathinfo($filenameWithExt, PATHINFO_FILENAME);
        // Get just ext
        $extension = $file->getClientOriginalExtension();
        // Filename to store
        $fileNameToStore = $filename.'_'.time().'.'.$extension;
        // Upload Image
        $file->storeAs('public/',$fileNameToStore);

        return $fileNameToStore;
    }
}
