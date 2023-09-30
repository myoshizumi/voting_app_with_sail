<tr
    class="border-b bg-neutral-100">
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
    <livewire:delete-user :user="$user" />
    {{-- @endcan --}}
</tr>
