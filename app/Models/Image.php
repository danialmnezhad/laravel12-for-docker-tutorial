<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Storage;
use Intervention\Image\ImageManager;
use Intervention\Image\Drivers\Gd\Driver;

class Image extends Model
{
    
    protected $guarded = [
        'id',
    ];
    public static function get_images_dirname(){
     return "images";
    }

    public function getFullpathAttribute(){
     return Storage::disk('public')->path($this->path);   
    }
    public function getUrlAttribute(){
        return asset("storage/".$this->path);
    }
    public function scale_down($width, $height = null){
     $image_manager = new ImageManager(new Driver());
     $image = $image_manager->read($this->fullpath);
     $image = $image->scaleDown(width: $width, height: $height);
     Storage::disk('public')->put($this->path, (string)$image->encode());
     return $this->update([
        'is_scaled_down'=>1,
     ]);
    }
}
