<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Image Gallery</title>
    <link href="https://cdn.jsdelivr.net/npm/tailwindcss@2.2.19/dist/tailwind.min.css" rel="stylesheet">
</head>

<body class="bg-gray-100 font-sans leading-normal tracking-normal">

    <nav class="bg-white shadow">
        <div class="container mx-auto px-6 py-3 flex justify-between items-center">
            <a class="text-xl font-bold text-gray-800" href="/">Image Gallery</a>
            <div class="flex items-center">
              <a href="{{route('my-images')}}" class='text-sm font-medium text-gray-600 mx-2'>Your images</a>
               @if(!auth()->check())
                <a href="{{route('login')}}" class='text-sm font-medium text-gray-600'>Login</a>
               @else
                <form action="{{route('logout')}}" method="POST">
                    @csrf
                    <button type="submit"
                        class="px-3 py-2 text-sm font-medium text-gray-600 hover:text-gray-900">Logout</button>
                </form>
               @endif
            </div>
        </div>
    </nav>

    @yield('content')
</body>

</html>