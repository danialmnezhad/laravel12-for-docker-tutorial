<?php
namespace App\Tasks;
use App\Models\Image;

class DeleteTitlelessImages{
    public function __invoke(){
        try{    
          $query = Image::whereNull('title');
          $query->chunk(100, function($collection){
            $collection->each(function($image){
             $image_description = $image->getKey().' - '.$image->path;
             echo $image_description.' was deleted'.PHP_EOL;      
             Image::delete_image($image);
            });
          });  
        }catch(\Exception $ex){
          echo $ex->getMessage().PHP_EOL;  
        }
    }
}