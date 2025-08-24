<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Storage;
use Intervention\Image\ImageManager;
use Intervention\Image\Drivers\Gd\Driver;
use App\Models\User;

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
     return $this;
    }
    public function getUpdateUrlAttribute(){
        return route('image-update', ['image'=>$this->getKey()]);
    }
    public function user(){
        return $this->belongsTo(User::class);
    }
    public static function delete_image(Image $image){
        unlink($image->fullpath);
        return $image->delete();
    }
}
