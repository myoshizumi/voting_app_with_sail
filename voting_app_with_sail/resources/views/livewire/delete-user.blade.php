<x-modal-confirm
    livewire-event-to-open-modal="deleteUserWasSet"
    event-to-close-modal="userWasDeleted"
    modal-title="Delete User"
    modal-description="Are you sure you want to delete this Users? This action cannot be undone."
    modal-confirm-button-text="Delete"
    wire-click="deleteUser"
/>