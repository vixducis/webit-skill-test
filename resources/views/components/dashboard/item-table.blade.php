<div class="border-b border-gray-400 pb-4 mb-4">
    <h3 class="font-bold text-gray-900 mb-2 uppercase">Items</h3>
    <div class="item-table">
        @foreach ($items as $item)
            <div class="h-12 w-12 mr-1 bg-cover bg-center rounded-full item-image" style="background-image: url(<?= asset($item->getImagePath()) ?>)" alt="{{$item->name}}"></div>
            <div>
                <a class="underline" href="{{url('item/'.$item->id)}}">{{$item->name}}</a>
                <br />
                <span class="text-gray-400">{{$item->created_at}}</span>
            </div>
            <a href="{{url('/item/'.$item->id.'/edit')}}">
                <svg xmlns="http://www.w3.org/2000/svg" class="h-6 w-6" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M11 5H6a2 2 0 00-2 2v11a2 2 0 002 2h11a2 2 0 002-2v-5m-1.414-9.414a2 2 0 112.828 2.828L11.828 15H9v-2.828l8.586-8.586z" />
                </svg>
            </a>
            <form class="h-6 w-6 delete" action="{{url('/item/'.$item->id)}}" method="POST">
                @csrf
                @method('delete')
                <button class="b-0 m-0" type="submit">
                    <svg xmlns="http://www.w3.org/2000/svg" class="h-6 w-6" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M19 7l-.867 12.142A2 2 0 0116.138 21H7.862a2 2 0 01-1.995-1.858L5 7m5 4v6m4-6v6m1-10V4a1 1 0 00-1-1h-4a1 1 0 00-1 1v3M4 7h16" />
                    </svg>
                </button>
            </form>
        @endforeach
    </div>
    <a href="{{url('item/new')}}">
        <x-button class="mt-4">create</x-button>
    </a>
</div>
