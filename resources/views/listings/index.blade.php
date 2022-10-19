<x-layout>
    @include('partials._herobanner')
<div class="container mx-auto w-full">
    <div class="lg:grid lg:grid-cols-4 gap-4 space-y-4 md:space-y-0">
    
    @unless(count($listings) == 0)
    
    @foreach($listings as $listing)
        {{-- x-listing card is listing-card.blade.php component --}}
         <x-listing-card :listing="$listing"/>
    @endforeach
    
    @else 
        <p>No listings found</p>
    @endunless
    
    </div>
           {{-- pagination --}}
           <div class="mt-6 p-4">
            {{$listings->links()}}
        </div>
</div>
    <x-footer class='fixed bottom-0 left-0'/>
    </x-layout>