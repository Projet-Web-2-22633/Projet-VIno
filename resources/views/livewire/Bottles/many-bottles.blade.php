<div>
    <div class="f">
      
        <div class="max-w-1200px">
            @foreach($bottles as $bottle)
                <article class="mx-4 my-2 flex border-2 border-gold rounded-lg items-center gap-2">
                    <img src="{{ $bottle->image }}" alt="{{ $bottle->name }}" class="p-2 max-w-80">
                    <div class="flex flex-col flex-grow justify-end items-end p-4 sm:flex-row sm:justify-between sm:gap-4">
                        <h1 class="text-right font-bold font-roboto text-l">{{ $bottle->name }}</h1>
                        <p class="text-right text-xs mt-2 mb-2">{{ $bottle->description }}</p>
                        <!-- <button wire:click="saveUnlistedBottle" class="rounded-md bg-indigo-600 px-3 py-2 text-sm font-semibold text-white shadow-sm hover:bg-indigo-500 focus-visible:outline focus-visible:outline-2 focus-visible:outline-offset-2 focus-visible:outline-indigo-600">Ajouter</button> -->

                    </div>
                </article>
            @endforeach
            @if ($bottles instanceof \Illuminate\Pagination\LengthAwarePaginator)
                <div class="col-span-2">{{ $bottles->links() }}</div>
            @endif
        </div>
    </div>
</div>