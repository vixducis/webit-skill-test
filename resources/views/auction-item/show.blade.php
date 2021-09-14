<x-app>
    <div class="mx-auto flex items-center flex-wrap">
        <div class="image-wrapper w-full" style="background-image: url(<?= asset($item->getImagePath()) ?>)">
            <img class="w-full" src="{{asset('storage/images/items/'.$item->image)}}">
            <p class="px-4 py-2 bg-white uppercase title text-4xl bold">{{$item->name}}</p>
        </div>
        <div class="w-full container mx-auto mt-0 px-6 py-6">
            @if ($item->getHighestBid() !== null)
                <div class="highest-bid float-left mr-4 -mt-10 z-20 relative bg-white">
                    <p class="px-2 text-xs">current top bid</p>
                    <p class="px-2 text-xl md:text-3xl bg-gray-800 text-white text-center">&euro;&nbsp;{{$item->getHighestBid()->amount}}</p>
                </div>
            @endif
            <p class="mb-4">
                @nl2br($item->description)
            </p>
            @if ($user?->admin ?? false)
                <x-item-bids-table :bids="$item->bids()->get()"></x-item-bids-table>
            @endif
            <x-place-bid :item="$item" :user="$user"></x-place-bid>
        </div>
    </div>
</x-app>