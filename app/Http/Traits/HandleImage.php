<?php

namespace App\Http\Traits;

use Intervention\Image\ImageManager;
use Intervention\Image\Drivers\Gd\Driver;
use Illuminate\Support\Facades\Storage;


trait HandleImage
{
    public function upload($image)
    {
        $manager = new ImageManager(new Driver());

        $imageName = time() . '-' . $image->getClientOriginalName();
        $imageName600 = time() . '-600-' . $image->getClientOriginalName();
        $imageName400 = time() . '-400-' . $image->getClientOriginalName();
        $imageDestination = 'storage/images/';
        $img = $manager->read($image);
        $img->save($imageDestination . $imageName, 100);
        $img->resize(height: 600)->save($imageDestination . $imageName600, 100);
        $img->resize(height: 400)->save($imageDestination . $imageName400, 100);
        return $imageName;
    }
}
