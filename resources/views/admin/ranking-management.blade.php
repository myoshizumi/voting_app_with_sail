<x-app-layout>
    <header class="flex w-full h-22 justify-end mx-auto" style="max-width:1000px">
        <div class="h-24">
            <div class="flex flex-row">
                <input name="date" type="date" />
            </div>
          <button type="button" class="mt-4 inline-flex w-full justify-end rounded-md bg-white px-3 py-2 text-sm font-semibold text-gray-900 shadow-sm ring-1 ring-inset ring-gray-300 hover:bg-gray-50 focus:ring-blue sm:mt-0 sm:w-auto">ダウンロード</button>
        </div>
    </header>
    <main class="container mx-auto max-w-custom space-x-4 flex flex-col md:flex-row" style="max-width:1000px">
        <div class="w-full md:w-175 px-2 md:px-0 min-h-max flex-1">
            <div class="ideas-container space-y-6 my-6 shadow-md border bg-white rounded-xl  px-2 py-2">
                <h2 class="font-bold text-2xl text-center">お礼を言われた人</h2>
                @foreach ($thanksTo as $thanks)
                <div class="flex flex-row">
                    <div class="basis-1/4"> ランキング: {{ $thanks->ranking }}位 </div>
                    <div class="basis-1/2 text-center"> {{ $thanks->thanks_to }}  </div>
                    <div class="basis-1/4"> {{ $thanks->count_thanks_to }}票</div>
                </div>
                @endforeach
                <h2 class="font-bold text-2xl text-center">お礼を言った人</h2>
                @foreach ($thanksFrom as $thanks)
                <div class="flex flex-row">
                    <div class="basis-1/4"> ランキング: {{ $thanks->ranking }}位 </div>
                    <div class="basis-1/2 text-center"> {{ $thanks->thanks_from }}  </div>
                    <div class="basis-1/4"> {{ $thanks->count_thanks_from }}票</div>
                </div>
                @endforeach
            </div>
        </div>
        <div class="w-full md:w-175 px-2 md:px-0 min-h-max flex-1">
            <div class="ideas-container space-y-6 my-6 shadow-md border bg-white rounded-xl px-2 py-2">
                <h2 class="font-bold text-2xl text-center">お礼を言われた人</h2>
                @foreach ($thanksTo as $thanks)
                <div class="flex flex-row">
                    <div class="basis-1/4"> ランキング: {{ $thanks->ranking }}位 </div>
                    <div class="basis-1/2 text-center"> {{ $thanks->thanks_to }}  </div>
                    <div class="basis-1/4"> {{ $thanks->count_thanks_to }}票</div>
                </div>
                @endforeach
                <h2 class="font-bold text-2xl text-center">お礼を言った人</h2>
                @foreach ($thanksFrom as $thanks)
                <div class="flex flex-row">
                    <div class="basis-1/4"> ランキング: {{ $thanks->ranking }}位 </div>
                    <div class="basis-1/2 text-center"> {{ $thanks->thanks_from }}  </div>
                    <div class="basis-1/4"> {{ $thanks->count_thanks_from }}票</div>
                </div>
                @endforeach
            </div>
        </div>

    </main>
</x-app-layout>
