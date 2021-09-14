<x-app>
    <div class="w-full max-w-2xl container mx-auto mt-0 px-6 py-6">
        <h3 class="font-bold text-gray-900 mb-2 uppercase">Edit listing</h3>
        <form method="POST" action="{{url('/item/'.$item->id)}}" enctype="multipart/form-data">
            @csrf
            @method('put')

            <div class="mb-2">
                <x-label for="name" value="Name" />
                <x-input id="name" class="block mb-1 w-full" type="text" name="name" value="{{$item->name}}" required />
            </div>

            <div class="mb-2">
                <x-label for="description" value="Description" />
                <textarea name="description" class="border w-full border-gray-800 py-1 px-2 rounded-sm" rows="7" required>{{ $item->description }}</textarea>
            </div>

            <div class="mb-4">
            <x-file-upload name="image" text="Choose image"></x-file-upload>
            </div>

            <x-button>update</x-button>
        </form>
    </div>
</x-app>