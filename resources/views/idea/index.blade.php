<x-app-layout>
    <main class="container mx-auto max-w-custom flex flex-col md:flex-row" style="max-width:1000px">

    <div class="w-70 mx-auto md:mr-5 md:mx-0">
        <div class="bg-white md:sticky md:top-8 border-2 border-blue rounded-xl mt-16"
            style="
                    border-image-source: linear-gradient(to bottom, rgba(50, 138, 241, 0.22), rgba(99, 123, 255, 0));
                    border-image-slice: 1;
                    background-image: linear-gradient(to bottom, #ffffff, #ffffff), linear-gradient(to bottom, rgba(50, 138, 241, 0.22), rgba(99, 123, 255, 0));
                    background-origin: border-box;
                    background-clip: content-box, border-box;
            ">
            <div class="text-center px-6 py-2 pt-6">
                <h3 class="font-semibold text-base">Add an idea</h3>
                <p class="text-xs mt-4">
                    @auth
                        Let us know what you would like and we'll take a look over!
                    @else
                        Please login to create an idea.
                    @endauth
            
                </p>
            </div>
                <livewire:create-idea />
        </div>
    </div>
    <div class="w-full md:w-175 px-2 md:px-0">
            <livewire:status-filters />
        <div class="mt-8">
            <livewire:ideas-index />
        </div>
    </div>
    </main>
</x-app-layout>
