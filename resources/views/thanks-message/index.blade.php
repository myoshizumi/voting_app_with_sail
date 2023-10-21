<x-app-layout>
    <main class="container mx-auto max-w-custom flex flex-col md:flex-row" style="max-width:1000px">
        <livewire:create-thanks-message />
        <div class="w-full md:w-175 px-2 md:px-0 min-h-max">
            <div class="ideas-container space-y-6 my-6 hover:shadow-md transition duration-150 ease-in bg-white rounded-xl flex cursor-pointer">
                    <div class="idea-container space-y-6 mx-6 my-6">
                        <h3 class="font-bold mb-4">最近の投稿</h3>
                        <p class="line-clamp-3">Lorem ipsum dolor sit amet consectetur adipisicing elit. Dolor velit nam ex, totam illo reiciendis ipsum sit, nisi unde explicabo tenetur id pariatur dolorum corrupti aliquid dolorem sed magnam officia ducimus. Quas delectus accusamus saepe eaque eius nemo labore quibusdam!</p>
                        <p class="line-clamp-3">Lorem ipsum dolor sit amet consectetur adipisicing elit. Dolor velit nam ex, totam illo reiciendis ipsum sit, nisi unde explicabo tenetur id pariatur dolorum corrupti aliquid dolorem sed magnam officia ducimus. Quas delectus accusamus saepe eaque eius nemo labore quibusdam!</p> 
                    </div>
            </div>
        </div>
    </main>
</x-app-layout>
