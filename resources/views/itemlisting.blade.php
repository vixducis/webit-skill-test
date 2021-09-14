<x-app>
    <div class="mx-auto flex items-center flex-wrap">
        <div class="image-wrapper w-full" style="background-image: url(<?= asset($item->getImagePath()) ?>)">
            <img class="w-full" src="{{asset('storage/images/items/'.$item->image)}}">
            <p class="px-4 py-2 bg-white uppercase title text-4xl bold">{{$item->name}}</p>
        </div>
        <div class="w-full container mx-auto mt-0 px-6 py-6">
            <p>{{$item->description}}</p>
            @if (auth()->user()?->admin ?? false)
                <x-item-bids-table :bids="$item->bids()->get()"></x-item-bids-table>
            @endif
        </div>
    </div>
</x-app>