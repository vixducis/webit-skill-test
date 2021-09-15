<x-app :title="ucwords($item->name)">
    <div class="mx-auto flex items-center flex-wrap">
        <div class="image-wrapper w-full" style="background-image: url(<?= asset($item->getImagePath()) ?>)">
            <img class="w-full" src="{{asset('storage/images/items/'.$item->image)}}">
            <p class="px-4 py-2 bg-white uppercase title text-4xl bold">{{$item->name}}</p>
        </div>
        <div class="w-full container mx-auto mt-0 px-6 py-6">
            <div class="float-left w-full md:w-auto md:mb-1 flex justify-center mb-2">
                @if ($item->getHighestBid() !== null)
                    @if ($item->getHighestBid()->isMadeBy($user))
                        <div class="highest-bid float-left mr-4 -mt-10 z-20 relative bg-white">
                            <p class="px-2 text-xs">your bid</p>
                            <p class="px-2 bg-gray-800 text-white text-center leading-2">
                                <span class="text-xl md:text-3xl">&euro;&nbsp;{{$item->getHighestBid()->amount}}</span>
                                <br />
                                <span class="text-xs">You're winning!</span>
                            </p>
                        </div>
                    @else
                        <div class="highest-bid float-left mr-4 -mt-10 z-20 relative bg-white">
                            <p class="px-2 text-xs">current top bid</p>
                            <p class="px-2 text-xl md:text-3xl bg-gray-800 text-white text-center">&euro;&nbsp;{{$item->getHighestBid()->amount}}</p>
                        </div>
                        @if ($user !== null && $item->getHighestBidForUser($user) !== null)
                            <div class="highest-bid float-left mr-4 -mt-10 z-20 relative bg-white">
                                <p class="px-2 text-xs">your bid</p>
                                <p class="px-2 text-xl md:text-3xl bg-gray-800 text-white text-center">&euro;&nbsp;{{$item->getHighestBidForUser($user)->amount}}</p>
                            </div>
                        @endif
                    @endif
                @endif
            </div>
            <p class="mb-4">
                @nl2br($item->description)
            </p>
            @if ($user === null)
                <a href="{{url('login')}}"><x-button>Login to place bid</x-button></a>
            @elseif ($user->admin == false)
                <div class="w-full flex justify-center">
                    <form action="{{url('bid')}}" method="POST">
                        @csrf
                        <input type="hidden" name="auction_item_id" value="{{$item->id}}" />
                        <input required placeholder="amount" class="px-4 h-12 border w-32 border-gray-800 rounded-l-sm" type="number" step="0.01" name="amount" /><button class="uppercase h-12 px-4 bg-gray-800 text-white rounded-r-sm hover:bg-gray-700 active:bg-gray-900 focus:outline-none focus:border-gray-900 focus:ring ring-gray-300" type="submit">place bid</button>
                    </form>
                </div>
            @else 
                <x-item-bids-table :bids="$item->bids()->get()"></x-item-bids-table>
            @endif
        </div>
    </div>
</x-app>