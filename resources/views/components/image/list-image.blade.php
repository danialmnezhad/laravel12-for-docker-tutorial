  <div class="bg-gray-200 rounded-lg overflow-hiddden shadow-md">
      <img src="{{$image->url}}" alt="Placeholder Image" class="w-full">
      <div>
        @if(!auth()->check() || auth()->id()!=$image->user_id)
        <div class='p-2'>
          <span>From: </span>
          <span>{{$image->user->name}}</span>
        </div>
        @endif
        @if($image->title)
        <div class='p-2 '>
          <span>Title: </span>
          <span>{{$image->title}}</span>
        </div>
        @elseif(auth()->id() == $image->user_id)
         <div class='pt-2'>
          <form action="{{$image->update_url}}" method='POST'>
            @csrf
            @method('PUT')
            <div class='flex'>
                <input type="text" class='rounded-l px-2' name='title' placeholder='Enter title here'>
                <button class="text-sm bg-blue-500 text-white rounded-r h-12 px-2">Update title</button>
            </div>
            <div class="text-red-500 text-sm p-2">
              You need to provide a title before your image is permanently deleted!
            </div>
          </form>
         </div>   
        @endif
      </div>
      
  </div>