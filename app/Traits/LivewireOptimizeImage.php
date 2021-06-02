<?php

namespace App\Traits;

use Illuminate\Support\Facades\Storage;
use Image;

trait LivewireOptimizeImage
{
    /**
     * Resizing and cropping image after uploading to livewire tmp folder.
     *
     * @param string $prop
     * @param int $width
     * @param int $height
     *
     * @return string
     */
    public function optimizeImage($prop, $width, $height)
    {
        $file_name = $prop->getFileName();
        $livewire_dir = 'app/livewire-tmp/';

        if (config('app.env') !== 'testing') {
            $img = Image::make($prop->getRealPath());
            $img->resize($width, null, function ($constraint) {
                $constraint->aspectRatio();
            });
            $img->encode('webp', 80);

            if (Storage::exists(storage_path($livewire_dir.$file_name))) {
                unlink(storage_path($livewire_dir.$file_name));
            }

            $img->save();
        }

        return storage_path($livewire_dir.$file_name);
    }
}
