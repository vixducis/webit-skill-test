<div class="border-b border-gray-400 pb-4 mb-4">
    <h3 class="font-bold text-gray-900 mb-2">LOG OUT</h3>
    <p>You are currently logged in as {{$getIdentifierString()}}</p>
    <form method="POST" action="{{ route('logout') }}">
        @csrf
        <x-button>Log out</x-button>
    </form>
</div>