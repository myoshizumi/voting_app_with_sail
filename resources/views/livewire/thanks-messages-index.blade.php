<div>
    @forelse($thanksMessages as $thanksMessage)
        <livewire:thanks-message-index 
            :key="$thanksMessage->id"
            :thanksMessage="$thanksMessage"
        />
    @empty
        <div class="mx-auto w-70 mt-12">
            <img src="{{ asset('img/no-ideas.svg') }}" alt="No Ideas" class="mx-auto mix-blend-luminosity"
            >
            <div class="text-gray-400 text-center font-bold mt-6">
                No ideas were found ...
            </div>
        </div>
    @endforelse
    {{-- <x-notification-success /> --}}

</div>
