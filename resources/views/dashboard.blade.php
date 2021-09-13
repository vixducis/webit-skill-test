<x-app>
    <div class="w-full container mx-auto mt-0 px-6 py-6">
        <h3 class="font-bold text-gray-900 mb-2">LOG OUT</h3>
        <p>You are currently logged in as {{$id = auth()->user()->name}} &lt;{{$id = auth()->user()->email}}&gt;</p>
        <form method="POST" action="{{ route('logout') }}">
            @csrf
            <x-button>
                {{ __('Log out') }}
            </x-button>
        </form>
    </div>
</x-app>
