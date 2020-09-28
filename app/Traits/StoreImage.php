<?php

namespace App\Traits;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Storage;
use Illuminate\Support\Str;
use Image;

trait StoreImage
{
    /**
     * Store using Storage and Compress Image
     *
     * @param Illuminate\Http\Request $request
     * @param string $request_name
     * @param string $upload_path
     * @return array
     */
    public function storeAndCompressImage(
        Request $request,
        $request_name = 'file',
        $upload_path = 'file')
    {
        if ($request->hasFile($request_name) && $request->file($request_name)->isValid()) {
            $file_name = Str::random(30) . '_' . time() . '.jpg';

            $uploaded_image = $upload_path . '/' . $file_name;
            $image_jpeg = Image::make($request->file($request_name));

            $image_jpeg->resize(1024, null, function($constraint) {
                $constraint->aspectRatio();
            });
            $image_jpeg->encode('jpg', 80);

            Storage::disk('public')->put($uploaded_image, (string) $image_jpeg);

            return [
                'file_name' => $file_name,
                'uploaded_image' => $uploaded_image
            ];
        }

        return [
            'file_name' => '',
            'uploaded_image' => ''
        ];
    }
}