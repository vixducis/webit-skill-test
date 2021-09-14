@if ($user === null)
    <a href="{{url('login')}}"><x-button>Login to place bid</x-button></a>
@elseif ($user->admin == false)
    <div class="w-full flex justify-center">
        <form action="bid" method="post">
            @csrf
            <input placeholder="amount" class="px-4 h-12 border w-32 border-gray-800 rounded-l-sm" type="number" step="0.01" name="amount" /><button class="uppercase h-12 px-4 bg-gray-800 text-white rounded-r-sm hover:bg-gray-700 active:bg-gray-900 focus:outline-none focus:border-gray-900 focus:ring ring-gray-300" type="submit">place bid</button>
        </form>
    </div>
@endif