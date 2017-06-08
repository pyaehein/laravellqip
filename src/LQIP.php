<?php

namespace PyaeHein\LQIP;

use Illuminate\Support\Facades\Storage;
use Intervention\Image\Facades\Image;

class LQIP
{
    public function singleImage($path)
    {
        $image = explode('.', $path);

        if( Storage::disk('lqip')->exists($path) && ! Storage::disk('lqip')->exists($image[0].config('lqip.prefix').'.'.config('lqip.format'))) {

            Storage::disk('lqip')->put($image[0].config('lqip.prefix').'.'.config('lqip.format'), Image::make(Storage::disk('lqip')->get($path))->blur(config('lqip.blur'))->encode(config('lqip.format'), config('lqip.quality')));
        }

        return 'src="'. url(config('lqip.path')) . '/' . $image[0].config('lqip.prefix').'.'.config('lqip.format') .'" data-src="'. url(config('lqip.path')) . '/' . $path .'"';
    }

    /*public function multipleImage($path_array)
    {

    }*/
}