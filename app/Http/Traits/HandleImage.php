<?php

namespace App\Http\Traits;

use Intervention\Image\ImageManager;
use Intervention\Image\Drivers\Gd\Driver;
use Illuminate\Support\Facades\Storage;


trait HandleImage
{
    public $imageManager;

    public function __construct()
    {
        // Initialiing Image Manager
        $this->imageManager = new ImageManager(new Driver());;
    }
    public function upload($image)
    {
        // Get image initial name 
        $imageName = pathinfo($image->getClientOriginalName(), PATHINFO_FILENAME);
        $imageExtension = $image->getClientOriginalExtension();

        // Creating file name with 'size' suffix
        $imageName32 = $imageName . '-32x32.' . $imageExtension;
        $imageName150 = $imageName . '-150x150.' . $imageExtension;
        $imageName1024 = $imageName . '-1024x1024.' . $imageExtension;

        $imageDestination = 'storage/images/';

        //Read the uplaoded file from temp folder

        $img = $this->imageManager->read($image);
        $img->save($imageDestination . $imageName);
        $img->scaleDown(height: 32)->save($imageDestination . $imageName32);
        $img->scaleDown(height: 150)->save($imageDestination . $imageName150);
        $img->scaleDown(height: 1024)->save($imageDestination . $imageName1024);
        return $imageName1024;
    }
}
