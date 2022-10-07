<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    {{-- font awesome library --}}
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.2.0/css/all.min.css" integrity="sha512-xh6O/CkQoPOWDdYTDqeRdPCVd1SpvCA9XXcUnZS2FmJNp1coAFzvtCN9BmamE+4aHK8yyUHUSCcJHgXloTyT2A==" crossorigin="anonymous" referrerpolicy="no-referrer" />
    {{-- alpine js --}}
    <script src="//unpkg.com/alpinejs" defer></script>
    {{-- tailwind css --}}
    <script src="https://cdn.tailwindcss.com"></script>
    <script>
        tailwind.config = {
            theme: {
                extend: {
                    colors: {
                        title: "#332788"
                    },
                },
                backgroundImage: {
                    'hero-banner': "url('images/hero.jpeg')",
                }
            },
        };
    </script> 

    <title>ezWork | Easily find a work for you</title>
</head>
<body>
    {{-- navbar section --}}
    <nav class='py-4  w-full'>
        <div class='container mx-auto flex justify-between items-center text-white'>
            <a href="/"><img class="h-[20px]" src="{{asset('images/ezWork.png')}}" alt="no-picture"
                /></a>
            <ul class="flex space-x-6 mr-6 text-black text-lg">
                @auth
                <li>
                   <span class="font-bold uppercase">
                    Welcome {{auth()->user()->name}}
                   </span>
                </li>
                <li>
                    <a href="/listings/manage" class="hover:text-title"
                        ><i class="fa-solid fa-gear"></i>
                        Manage Listing</a
                    >
                </li>
                <li>
                    <form class='inline' method="POST" action="/logout">
                       @csrf
                       <button type='submit' class='hover:text-title'>
                        <i class="fa-solid fa-door-closed"></i> Logout
                       </button> 
                    </form>
                </li>
                @else
                <li>
                    <a href="/register" class="hover:text-title"
                        ><i class="fa-solid fa-user-plus"></i> Register</a
                    >
                </li>
                <li>
                    <a href="/login" class="hover:text-title"
                        ><i class="fa-solid fa-arrow-right-to-bracket"></i>
                        Login</a
                    >
                </li>
                @endauth
            </ul>
        </div>
    </nav>
    {{-- main section --}}
    <main>
    {{$slot}}
    </main>

    {{-- footer section --}}
    <footer class='fixed bottom-0 left-0 w-full flex items-center justify-start font-bold bg-black
    text-white h-20 mt-24 md:justify-center'>

    <p class="ml-2">Bryan Palad | Made with Laravel & Tailwind CSS</p>
        <a
            href="/listings/create"
            class="absolute top-1/3 right-10 bg-white text-black py-2 px-5"
            >Post Job</a
        >
    <x-flash-message/>
    </footer>
</body>
</html>