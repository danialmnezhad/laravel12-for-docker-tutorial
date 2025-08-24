@extends('layout')
@section('content')
<div class="container mx-auto mt-8 px-6">
    <div class="bg-white p-6 rounded-lg shadow-lg">
        @if(session()->has('success_msg'))
        <div class="bg-green-400 mb-3 text-white p-2 rounded block">
            {{session()->get('success_msg')}}
        </div>
        @endif
        <div class="flex justify-between items-center mb-6">

            <div>

                <h2 class="text-2xl font-bold text-gray-800">Your Images</h2>

            </div>
            @if(auth()->check())
            <div>
                <form action="{{route('upload')}}" method="post" enctype="multipart/form-data">
                    @csrf
                    <input type="file" name="file">

                    <button type="submit" class='bg-blue-500 text-white rounded p-1'>Upload new image</button>
                </form>
                @if($errors->has('file'))
                <div class="text-sm text-red-600">{{$errors->first('file')}}</div>
                @endif
            </div>
            @endif
        </div>

        @if(auth()->check())
         @if(!$data->isEmpty())
         <div class="grid grid-cols-3 gap-6">
            @foreach($data as $image)
             <x-image.list-image :image='$image'/>
            @endforeach
        </div>
         <div class='my-3'>
            {{$data->links()}}
         </div>
         @else
          <div class="text-white bg-yellow-500 p-2 rounded">
            You have not uploaded any image
          </div>
         @endif
        @else
        <div class="bg-blue-400 text-white p-2 rounded">
            Please login to view your images and upload new image
        </div>
        @endif
    </div>
</div>
@endsection