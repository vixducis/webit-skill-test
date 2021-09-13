<x-app>
    <div class="mx-auto flex items-center flex-wrap">
        <div class="image-wrapper w-full" style="background-image: url(<?= asset('storage/images/items/'.$item->image) ?>)">
            <img class="w-full" src="{{asset('storage/images/items/'.$item->image)}}">
            <p class="px-4 py-2 bg-white uppercase title text-4xl bold">{{$item->name}}</p>
        </div>
        <div class="w-full container mx-auto flex flex-wrap items-center justify-between mt-0 px-6 py-6">
            <p>{{$item->description}}</p>
        </div>
    </div>
</x-app>