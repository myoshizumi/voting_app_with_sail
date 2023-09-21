<div x-data="{ isOpen: false }" class="relative">
    <button 
    @click="isOpen = !isOpen
    if(isOpen) {
        Livewire.emit('getNotifications')
    }
    ">
        <svg viewBox="0 0 24 24" fill="currentColor" class="w-8 h-8 text-gray-400">
        <path d="M5.85 3.5a.75.75 0 00-1.117-1 9.719 9.719 0 00-2.348 4.876.75.75 0 001.479.248A8.219 8.219 0 015.85 3.5zM19.267 2.5a.75.75 0 10-1.118 1 8.22 8.22 0 011.987 4.124.75.75 0 001.48-.248A9.72 9.72 0 0019.266 2.5z" />
        <path fill-rule="evenodd" d="M12 2.25A6.75 6.75 0 005.25 9v.75a8.217 8.217 0 01-2.119 5.52.75.75 0 00.298 1.206c1.544.57 3.16.99 4.831 1.243a3.75 3.75 0 107.48 0 24.583 24.583 0 004.83-1.244.75.75 0 00.298-1.205 8.217 8.217 0 01-2.118-5.52V9A6.75 6.75 0 0012 2.25zM9.75 18c0-.034 0-.067.002-.1a25.05 25.05 0 004.496 0l.002.1a2.25 2.25 0 11-4.5 0z" clip-rule="evenodd" />
        </svg>
        @if ($notificationCount)
            <div class="absolute rounded-full bg-red text-white text-xs w-6 h-6 flex justify-center items-center -top-1 -right-1 border-2">{{ $notificationCount }}</div>
        @endif
    </button>
    <ul class="absolute w-76 md:w-96 text-left text-gray-700 text-sm bg-white shadow-xl rounded-xl max-h-128 overflow-y-auto z-10 -right-1
    "
        x-show.transition.origin.top="isOpen"
        x-cloak
        @click.away="isOpen = false"
        @keydown.escape.window="isOpen = false"
    >

    @if($notifications->isNotEmpty() && ! $isLoading)
        @foreach($notifications as $notification)
        <li>
            <a 
                href="{{ route('idea.show', $notification->data['idea_slug']) }}"
                @click.prevent="isOpen = false"
                wire:click.prevent ="markAsRead('{{$notification->id }}')"
                class="flex hover:bg-gray-100 transition duration-150 ease-in px-5 py-3">
                <img src="{{ $notification->data['user_avatar'] }}" alt="avatar" class="w-10 h-10 rounded-full"
                >                                               
            <div class="ml-4">
                <div>
                    <span class="font-semibold">{{ $notification->data['user_name'] }}</span>
                    comment on
                    <span class="font-semibold">{{ $notification->data['idea_title'] }}</span>
                    <span class="line-clamp-3">:"{{ $notification->data['comment_body'] }}"</span>
                </div>
                <div class="text-xs text-gray-500 mt-2">{{ $notification->created_at->diffForHumans() }}</div>
            </div>
            </a>
        </li>
        @endforeach
        <li class="border-t border-gray-300 text-center">
            <button 
                wire:click="markAllAsRead"
                @click="isOpen = false"
                class="w-full block font-semibold hover:bg-gray-100 transition duration-150 ease-in px-5 py-4">
                Mark all as read
            </button>
        </li>
        @elseif ($isLoading)
            @foreach(range(1, 3) as $item)
                <li class="flex animate-pulse items-center transition duration-150 ease-in px-5 py-3">
                    <div class="bg-gray-200 rounded-xl w-10 h-10"></div>
                    <div class="flex-1 ml-4 space-y-2">
                        <div class="bg-gray-200 w-full rounded h-4"></div>
                        <div class="bg-gray-200 w-full rounded h-4"></div>
                        <div class="bg-gray-200 w-1/2 rounded h-4"></div>
                    </div>
                </li>
            @endforeach
        @else
            <li class="mx-auto w-40 py-6">
                <img src="{{ asset('img/no-ideas.svg') }}" alt="No Ideas" class="mx-auto" style="mix-blend-mode: luminosity">
                <div class="text-gray-400 text-center font-bold mt-6">
                    No new notifications
                </div>
            </li>
        @endif 
    </ul>
</div>
