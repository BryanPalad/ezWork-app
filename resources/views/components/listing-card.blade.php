@props(['listing'])

{{-- x-card is card.blade.php component --}}
<x-card class='hover:border-1 hover:border-title cursor-pointer'>
    <a href="/listings/{{$listing->id}}">
    <div class="flex flex-col gap-4">
        <div class='flex'>
            <img
            class="hidden w-24 h-24 mr-6 md:block"
            src="{{$listing->logo ? asset('storage/' . $listing->logo) : asset('images/no-image.png')}}"
            alt=""/>
            <div class='flex flex-col w-full items-center lg:items-start'>
            <h3 class="text-2xl">
                {{$listing->title}}
            </h3>
            <h3 class="text-xl font-bold mb-4">{{$listing->company}}</h3>
            </div>
        </div>
        <div class='flex flex-col items-center'>
            <x-listing-tags :tagsCsv="$listing->tags"/>
            <div class="text-lg mt-4">
                <i class="fa-solid fa-location-dot"></i> {{$listing->location}}
            </div>
        </div>
    </div>
    </a>
</x-card>