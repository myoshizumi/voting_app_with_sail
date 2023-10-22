<x-app-layout>
    <main class="container mx-auto max-w-custom flex flex-col md:flex-row" style="max-width:1000px">

        <livewire:create-thanks-message />

        <div class="w-full md:w-175 px-2 md:px-0 min-h-max">
            <div class="ideas-container space-y-6 my-6 shadow-md border bg-white rounded-xl flex">
                <div class="idea-container space-y-6 mx-6 my-6 w-full">
                    <h3 class="font-bold mb-4">最近の投稿</h3>
                        <livewire:thanks-messages-index />  
                </div>
            </div>
        </div>
    </main>
</x-app-layout>
