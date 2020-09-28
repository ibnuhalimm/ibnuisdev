<?php

namespace App\Traits;

use Image;

trait LivewireOptimizeImage
{
    /**
     * Resizing and cropping image after uploading to livewire tmp folder
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

        $img = Image::make($prop->getRealPath());
        $img->resize($width, null, function($constraint) {
            $constraint->aspectRatio();
        });
        // $img->crop($width, $height);
        $img->encode('webp', 80);

        unlink(storage_path($livewire_dir . $file_name));
        $img->save();
        // $img->save(storage_path($livewire_dir . $file_name), 80, 'jpg');

        return storage_path($livewire_dir . $file_name);
    }
}