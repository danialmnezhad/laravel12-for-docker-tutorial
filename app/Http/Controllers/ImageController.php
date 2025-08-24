<?php
namespace App\Http\Controllers;
use Illuminate\Http\Request;
use App\Http\Requests\ImageUploadRequest;
use Storage;
use App\Jobs\ProcessStoredImageJob;
use App\Models\Image;
use App\Http\Requests\ImageUpdateRequest;

class ImageController extends Controller
{
    public function show_images(){
      $data = Image::whereNotNull('title')->with(['user'])->paginate(30);
      return view('home', compact('data'));       
    }
    public function show_my_images(){
      $data = auth()->user()->images()->paginate(30);
      return view('my-images', compact('data')); 
    }
    public function update_image(ImageUpdateRequest $req, Image $image){
      $image->update($req->validated());
      return redirect()->back()->with('success_msg', "Image title updated successfuly");
    }
    public function upload_image(ImageUploadRequest $req){
      $file = $req->file('file');
      $file_path = Storage::disk('public')->putFile(Image::get_images_dirname(), $file);
      ProcessStoredImageJob::dispatch($file_path, auth()->id());
      return redirect()->back()->with('success_msg', "Your image was uploaded and we are processing it");
    }
}
