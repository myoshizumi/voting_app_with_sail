<x-app-layout>
<main class="container mx-auto max-w-custom flex flex-col md:flex-row" style="max-width:1000px">
    <div class="w-70 mx-auto md:mr-8 md:mx-0">
        <div class="bg-white md:top-8 border rounded-xl mt-60">            
            <div class="text-center px-6 py-2 pt-6">
                <h3 class="font-semibold text-base">投稿する</h3>
                <form wire:submit.prevent="createIdea" action="#" method="POST" class="space-y-4 px-4 py-6">
                    <div>
                        <select wire:model.defer="category" name="category_add" id="category_add" class="w-full bg-gray-100 text-sm rounded-xl border-none px-4 py-2">
                            @foreach ($users as $user)
                                <option value="{{ $user->id }}">{{ $user->name }}</option>
                            @endforeach
                        </select>
                    </div>
                    @error('category')
                        <p class="text-red text-xs mt-1">{{ $message }}</p>
                    @enderror
                
                    <div class="">
                        <textarea wire:model.defer="description" name="idea" id="idea" cols="30" rows="4" class="bg-gray-100 w-full px-4 py-7 rounded-xl borde-none placeholder-gray-900 text-sm" placeholder="Describe your idea" required></textarea>
                        @error('description')
                            <p class="text-red text-xs mt-1">{{ $message }}</p>
                        @enderror
                
                    </div>
                    <div class="flex items-center justify-between space-x-3">
                        {{-- <button type="button" class="flex items-center justify-center w-1/2 h-11 text-xs bg-gray-200 font-semibold rounded-xl border border-gray-200 hover:border-gray-400 transition duration-150 ease-in px-6 py-3">
                            <svg fill="none" viewBox="0 0 24 24" stroke-width="1.5" stroke="currentColor" class="text-gray-600 w-4 transform -rotate-45">
                            <path stroke-linecap="round" stroke-linejoin="round" d="M18.375 12.739l-7.693 7.693a4.5 4.5 0 01-6.364-6.364l10.94-10.94A3 3 0 1119.5 7.372L8.552 18.32m.009-.01l-.01.01m5.699-9.941l-7.81 7.81a1.5 1.5 0 002.112 2.13" />
                            </svg>
                
                            <span class="ml-1">Attach</span>
                        </button> --}}
                        <div></div>
                        <button type="submit" class="flex items-center justify-center h-11 text-xs text-white bg-blue font-semibold rounded-xl border border-blue hover:bg-blue-hover transition duration-150 ease-in px-6 py-3">
                
                            <span class="ml-1">Submit</span>
                        </button>
                    </div>
                
                <div>
                        @if (session('success_message'))
                            <div 
                                x-data="{ isVisible: true }"
                                x-init="
                                    setTimeout(() => {
                                        isVisible = false
                                    }, 3000)
                                "
                                x-show="isVisible"
                                x-transition.duration.1000ms
                                class="text-green mt-4">
                                {{ session('success_message') }}
                            </div>
                        @endif
                    </div> 
                </form>


            </div>
        </div>

    </div>
    <div class="w-full md:w-175 px-2 md:px-0 min-h-max">
        <div class="ideas-container space-y-6 my-6 hover:shadow-md transition duration-150 ease-in bg-white rounded-xl flex cursor-pointer">
                <div class="idea-container space-y-6 mx-6 my-6">
                    <p class="line-clamp-3">Lorem ipsum dolor sit amet consectetur adipisicing elit. Dolor velit nam ex, totam illo reiciendis ipsum sit, nisi unde explicabo tenetur id pariatur dolorum corrupti aliquid dolorem sed magnam officia ducimus. Quas delectus accusamus saepe eaque eius nemo labore quibusdam!</p>
                    {{-- <p class="line-clamp-3">Lorem ipsum dolor, sit amet consectetur adipisicing elit. Tempora voluptates quisquam qui nobis neque id tenetur consequuntur at unde fugit? ipsum dolor sit amet consectetur adipisicing elit. Dolor velit nam ex, totam illo reiciendis ipsum sit, nisi unde explicabo tenetur id pariatur dolorum corrupti aliquid dolorem sed magnam officia ducimus. Quas delectus accusamus saepe eaque eius nemo labore quibusdam!</p>
                    <p class="line-clamp-3">Lorem ipsum dolor, sit amet consectetur adipisicing elit. Explicabo facilis cupiditate impedit. Delectus, ducimus. Nulla, sed! Voluptate perspiciatis consequuntur magni quod quos! Consectetur consequuntur sed harum libero provident quos nemo! ipsum dolor sit amet consectetur adipisicing elit. Dolor velit nam ex, totam illo reiciendis ipsum sit, nisi unde explicabo tenetur id pariatur dolorum corrupti aliquid dolorem sed magnam officia ducimus. Quas delectus accusamus saepe eaque eius nemo labore quibusdam!</p>
                    <p class="line-clamp-3">Lorem ipsum dolor sit amet consectetur adipisicing elit. Dolor velit nam ex, totam illo reiciendis ipsum sit, nisi unde explicabo tenetur id pariatur dolorum corrupti aliquid dolorem sed magnam officia ducimus. Quas delectus accusamus saepe eaque eius nemo labore quibusdam!</p> --}}
                    <p class="line-clamp-3">Lorem ipsum dolor sit amet consectetur adipisicing elit. Dolor velit nam ex, totam illo reiciendis ipsum sit, nisi unde explicabo tenetur id pariatur dolorum corrupti aliquid dolorem sed magnam officia ducimus. Quas delectus accusamus saepe eaque eius nemo labore quibusdam!</p> 
                </div>
        </div>
    </div>
</main>
</x-app-layout>
