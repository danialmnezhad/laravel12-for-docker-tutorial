@extends('layout')
@section('content')
<div class="container mx-auto mt-8 px-6">
    <div class="bg-white p-6 rounded-lg shadow-lg">
        <div class="flex justify-between items-center mb-6">

            <div>

                <h2 class="text-2xl font-bold text-gray-800">Images</h2>

            </div>
        </div>

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
            No image has been uploaded
          </div>
         @endif
    </div>
</div>
@endsection