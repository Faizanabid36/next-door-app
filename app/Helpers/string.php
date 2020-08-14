<?php

use Carbon\Carbon;
use Illuminate\Support\Facades\Storage;
use Intervention\Image\Facades\Image;

if (!function_exists('storeImage')) {
    function storeImage($image,$folderName='images')
    {
        $currentDate = Carbon::now()->toDateString();
        $imagename = $folderName.'-' . $currentDate . '-' . uniqid() . '.' . $image->getClientOriginalExtension();
        $imagemedia = Image::make($image)->stream();
        Storage::disk('public')->put($folderName.'/' . $imagename, $imagemedia);
        return asset(Storage::url($folderName.'/' . $imagename));
    }
}
