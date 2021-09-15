<x-app title="Auction House">
    <div class="container mx-auto flex items-center flex-wrap pb-4">
        @foreach($auctionItems as $item)
        <x-auction-item :item="$item"></x-auction-item>
        @endforeach
    </div>
</x-app>