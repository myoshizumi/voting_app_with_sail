<div class="w-full hover:border rounded-lg hover:shadow-md transition duration-150 ease-in flex mt-4 px-4 py-2">
   <div class="flex-1 line-clamp-3 mr-4">{{ $thanksMessage->reason }}</div>
   <div class="text-right border-l-2 pl-4">{{ $thanksMessage->created_at->diffForHumans() }}</div>
</div>
