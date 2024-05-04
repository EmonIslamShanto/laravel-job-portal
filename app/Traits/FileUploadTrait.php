<?php

namespace App\Traits;

use Illuminate\Http\Request;

trait FileUploadTrait
{
    function uploadFile(Request $request, string $inputName, ?string $oldPath = null, $path = '/uploads'): string
    {
        if ($request->hasFile($inputName)) {
            $file = $request->file($inputName);
            $extension = $file->getClientOriginalExtension();
            $filename = uniqid() . '.' . $extension;
            $file->move(public_path($path), $filename);

            return $path . '/' . $filename;
        }
        return '';
    }
}
