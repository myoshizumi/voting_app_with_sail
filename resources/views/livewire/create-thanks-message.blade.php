<div class="w-70 mx-auto md:mr-8 md:mx-0">
    <div class="bg-white md:top-8 border rounded-xl mt-60">            
        <div class="text-center px-6 py-2 pt-6">
            <h3 class="font-semibold text-base">投稿する</h3>
            <form wire:submit.prevent="checkThanksMessage" action="#" method="POST" class="space-y-4 px-4 py-6">
                <div>
                    <div class="mb-2">対象者</div>
                    <select wire:model.defer="thanksToId" name="thanksToId" id="thanksToId" class="w-full bg-gray-100 text-sm rounded-xl border-none px-4 py-2">
                        <option hidden>選択してください</option>
                        @foreach ($users as $user)
                            @if($user->id !== auth()->user()->id)
                                <option value="{{ $user->id, $user->name }}">{{ $user->name }}</option>
                            @endif
                        @endforeach
                    </select>
                </div>
                    @error('thanksToId')
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
            </form>
        </div>
    </div>

    {{-- Confirmation Modal --}}
    <div 
      x-cloak
      x-data="{isOpen: false}"
      x-show="isOpen"
      @keydown.escape.window="isOpen = false"

      x-init="
              Livewire.on('thanksMessageWasConfirmed', () => {
                  isOpen = false
              })

              Livewire.on('confirmThanksMessageWasSet', () => {
              isOpen = true
              $nextTick(() => $refs.confirmButton.focus())
              })
          "
      class="relative z-20" aria-labelledby="modal-title" role="dialog" aria-modal="true">
        <div 
          x-show.transition.opacity="isOpen"
          x-transition.duration.400
          class="fixed inset-0 bg-gray-500 bg-opacity-75 transition-opacity"></div>

        <div class="fixed inset-0 z-20 w-screen overflow-y-auto">
          <div 
              x-show.opacity="isOpen"
              x-transition.duration.400
              class="flex min-h-full items-end justify-center p-4 text-center sm:items-center sm:p-0">
            <div class="relative transform overflow-hidden rounded-lg bg-white text-left shadow-xl transition-all sm:my-8 sm:w-full sm:max-w-lg">
              <div class="bg-white px-4 pb-4 pt-5 sm:p-6 sm:pb-4">
                <div class="sm:flex sm:items-start">
                  <div class="mx-auto flex h-12 w-12 flex-shrink-0 items-center justify-center rounded-full bg-green-50 sm:mx-0 sm:h-10 sm:w-10">
                    <svg class="h-6 w-6 text-green" fill="none" viewBox="0 0 24 24" stroke-width="1.5" stroke="currentColor" aria-hidden="true">
                      <path stroke-linecap="round" stroke-linejoin="round" d="M12 9v3.75m-9.303 3.376c-.866 1.5.217 3.374 1.948 3.374h14.71c1.73 0 2.813-1.874 1.948-3.374L13.949 3.378c-.866-1.5-3.032-1.5-3.898 0L2.697 16.126zM12 15.75h.007v.008H12v-.008z" />
                    </svg>
                  </div>
                  <div class="mt-3 text-center sm:ml-4 sm:mt-0 sm:text-left">
                    <h3 class="text-base font-semibold leading-6 text-gray-900" id="modal-title">Confirm your thanks message!</h3>
                    <div class="mt-2">
                      <p class="text-sm text-gray-500">
                          Are you sure you want to submit this message?
                      </p>
                    </div>
                  </div>
                </div>
              </div>
              <div class="bg-gray-50 px-4 py-3 sm:flex sm:flex-row-reverse sm:px-6">
                <button wire:click="createThanksMessage" x-ref="confirmButton" type="button" class="inline-flex w-full justify-center rounded-md bg-blue px-3 py-2 text-sm font-semibold text-white shadow-sm hover:bg-blue-hover focus:ring-blue sm:ml-3 sm:w-auto">Confirm</button>
                <button @click="isOpen = false" type="button" class="mt-3 inline-flex w-full justify-center rounded-md bg-white px-3 py-2 text-sm font-semibold text-gray-900 shadow-sm ring-1 ring-inset ring-gray-300 hover:bg-gray-50 focus:ring-blue sm:mt-0 sm:w-auto">Cancel</button>
              </div>
            </div>
          </div>
        </div>
      </div>
    </div>
</div>
