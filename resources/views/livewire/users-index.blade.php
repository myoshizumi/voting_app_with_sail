<div class="users-container space-y-6 my-6">
    <div class="flex flex-col">
        <div class="overflow-x-auto sm:-mx-6 lg:-mx-8">
            <div class="inline-block min-w-full py-2 sm:px-6 lg:px-8">
                <div class="overflow-hidden">
                    <table class="min-w-full text-left text-sm font-light">
                        <thead
                            class="border-b bg-white font-medium dark:border-neutral-500 dark:bg-neutral-600">
                            <tr>
                            <th scope="col" class="px-6 py-4">#</th>
                            <th scope="col" class="px-6 py-4">name</th>
                            <th scope="col" class="px-6 py-4">email</th>
                            <th></th>
                            </tr>
                        </thead>
                        <tbody>
                            @forelse($users as $user)
                                <livewire:user-index 
                                    :key="$user->id"
                                    :user="$user"
                                />
                                @empty
                                    <div class="mx-auto w-70 mt-12">
                                        <div class="text-gray-400 text-center font-bold mt-6">
                                            No users were found ...
                                        </div>
                                    </div>
                            @endforelse
                        </tbody>
                    </table>
                </div>
            </div>
        </div>
    </div>
</div> {{-- end users-container --}}
