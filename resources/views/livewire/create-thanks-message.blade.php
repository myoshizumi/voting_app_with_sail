<div class="w-70 mx-auto md:mr-8 md:mx-0">
    <div class="bg-white md:top-8 border rounded-xl mt-60">            
        <div class="text-center px-6 py-2 pt-6">
            <h3 class="font-semibold text-base">投稿する</h3>
            <form wire:submit.prevent="createThanksMessage" action="#" method="POST" class="space-y-4 px-4 py-6">
                <div>
                    <div class="mb-2">対象者</div>
                    <select wire:model.defer="thanksTo" name="thanksTo" id="thanksTo" class="w-full bg-gray-100 text-sm rounded-xl border-none px-4 py-2">
                        @foreach ($users as $user)
                            <option value="{{ $user->name }}">{{ $user->name }}</option>
                        @endforeach
                    </select>
                </div>
                @error('thanksTo')
                    <p class="text-red text-xs mt-1">{{ $message }}</p>
                @enderror
            
                <div class="">
                    <div class="mb-2">理由</div>
                    <textarea wire:model.defer="reason" name="reason" id="reason" cols="30" rows="4" class="bg-gray-100 w-full px-4 py-7 rounded-xl borde-none placeholder-gray-900 text-sm" placeholder="Describe the reason" required></textarea>
                    @error('reason')
                        <p class="text-red text-xs mt-1">{{ $message }}</p>
                    @enderror
            
                </div>
                <div class="flex items-center justify-between space-x-3">
                    <div></div> 
                    <button type="submit" class="flex items-center justify-center h-11 text-xs text-white bg-blue font-semibold rounded-xl border border-blue hover:bg-blue-hover transition duration-150 ease-in px-6 py-3">
            
                        <span class="ml-1">投稿する</span>
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
