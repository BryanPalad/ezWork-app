<x-layout>
    <div class='container mx-auto flex flex-col items-center justify-center'>
    <x-card class="p-10">
        <header>
            <h1
                class="text-3xl text-center font-bold my-6 uppercase"
            >
                Manage Job List
            </h1>
        </header>

        <table class="w-auto table-auto rounded-sm">
            <tbody>
                @unless($listings->isEmpty())
                @foreach($listings as $listing)
                <tr class="border-gray-300">
                    <td
                        class="px-4 py-8 border-t border-b border-gray-300 text-lg"
                    >   
                    <div class='flex gap-2 items-center'>
                        <img
                        class="hidden w-12 h-12 md:block"
                        src="{{$listing->logo ? asset('storage/' . $listing->logo) : asset('images/no-image.png')}}"
                        alt=""/>
                        <a href="/listings/{{$listing->id}}/edit">
                            {{$listing->company}}
                        </a>
                    </div>
                    </td>
                    <td
                    class="px-4 py-8 border-t border-b border-gray-300 text-lg"
                    >
                    <a href="/listings/{{$listing->id}}/edit">
                        {{$listing->title}}
                    </a>
                </td>
                    <td
                        class="px-4 py-8 border-t border-b border-gray-300 text-lg"
                    >
                        <a
                            href="/listings/{{$listing->id}}/edit"
                            class="text-blue-400 px-6 py-2 rounded-xl"
                            ><i
                                class="fa-solid fa-pen-to-square"
                            ></i>
                            Edit</a
                        >
                    </td>
                    <td
                        class="px-4 py-8 border-t border-b border-gray-300 text-lg"
                    >
                        
                    <form method="POST" action="/listings/{{$listing->id}}">
                        @csrf
                        @method('DELETE')
                        <button class="text-red-500"><i class="fa-solid fa-trash"></i>Delete</button>
                    </form>
                    </td>
                </tr>
                @endforeach
                {{-- if there are no fetched listings from the user output this --}}
                @else
                <tr class="border-gray-300">
                    <td class="px-4 py-8 border-t border-b border-gray-300 text-lg">
                        <p class="text-center">No Listings Found</p>
                    </td>
                </tr>
                @endunless
            </tbody>
        </table>
    </x-card>
</div>
    <x-footer/>
</x-layout>