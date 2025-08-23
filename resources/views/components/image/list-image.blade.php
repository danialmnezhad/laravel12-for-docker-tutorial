  <div class="bg-gray-200 rounded-lg overflow-hiddden shadow-md">
      <img src="{{$image->url}}" alt="Placeholder Image" class="w-full">
      <div>
        @if($image->title)
        <div class='p-2'>{{$image->title}}</div>
        @elseif(auth()->id() == $image->user_id)
         <div class='pt-2'>
          <form action="{{$image->update_url}}" method='POST'>
            @csrf
            @method('PUT')
            <label for="">Set title <span class="text-red-500">(before your image is deleted)</span></label>
            <div class='flex'>
                <input type="text" class='rounded-l px-2' placeholder='Enter title here'>
                <button class="text-sm bg-blue-500 text-white rounded-r h-12 px-2">update title</button>
            </div>
          </form>
         </div>   
        @endif
      </div>
      
  </div>