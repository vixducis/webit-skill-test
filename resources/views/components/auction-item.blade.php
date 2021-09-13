<div class="w-full md:w-1/3 xl:w-1/4 p-6 pt-0 flex flex-col">
    <a href="{{url('/item/'.$item->id)}}">
        <img class="hover:grow hover:shadow-lg" src="{{asset('storage/images/items/'.$item->image)}}">
        <div class="pt-3 flex items-center justify-between">
            <p>{{$item->name}}</p>
            <p class="text-gray-900">{{ $item->getHighestBidText() }}</p>
        </div>
    </a>
</div>