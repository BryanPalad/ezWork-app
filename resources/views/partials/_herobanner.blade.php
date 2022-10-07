<div class='relative w-full h-[20vh] bg-hero-banner bg-cover bg-center backdrop-blur-sm flex items-center mb-10'>
    <div class='container mx-auto flex flex-col gap-4 items-center'>
        {{-- hero banner title --}}
        <div class="">
        <h1 class='font-bold italic text-title text-3xl'>Easily find a work for you..</h1> 
        </div>
        <!-- Search -->
        <div class="w-1/2">
            <form action="/">
            <div class="relative rounded-lg">
                <div class="flex gap-0.5">
                <input
                    type="text"
                    name="searchjob"
                    class="h-14 w-full pl-4 pr-20 rounded-lg z-0 focus:shadow focus:outline-none bg-white opacity-90"
                    placeholder="Job title, keywords, or company"
                />
                <input
                type="text"
                name="searchlocation"
                class="h-14 w-full pl-4 pr-20 rounded-lg z-0 focus:shadow focus:outline-none bg-white opacity-90"
                placeholder="City, Province or Country"
            />
                <div class="absolute top-2 right-2">
                    <button
                        type="submit"
                        class="h-10 w-20 text-white rounded-lg bg-black hover:bg-title"
                    >
                        Search
                    </button>
                </div>
                </div>
            </div>
            </form>
        </div>
    </div>
</div>