<div>
    <tr
        class="border-b bg-neutral-100 dark:border-neutral-500 dark:bg-neutral-700">
        <td class="whitespace-nowrap px-6 py-4 font-medium">
            {{ $user->id }}
        </td>
        <td class="whitespace-nowrap px-6 py-4">
                {{ $user->name }}
        </td>
        <td class="whitespace-nowrap px-6 py-4">
            {{ $user->email }}
        </td>
        {{-- @can('delete', $user) --}}
        <td><a href="#" 
            {{-- @click.prevent="
                isOpen = false
                $dispatch('custom-show-delete-modal')
                " --}}
            class=" w-full h-11 text-sm text-center bg-red-100 text-white font-semibold rounded-xl hover:bg-red-hover transition duration-150 ease-in px-6 py-3">
            Delete</a>
        </td>
        {{-- @endcan --}}
    </tr>
</div>
