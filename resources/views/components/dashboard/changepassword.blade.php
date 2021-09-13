<div class="border-b border-gray-400 pb-4 mb-4">
    <h3 class="font-bold text-gray-900 mb-2 uppercase">Change password</h3>
    <x-auth-validation-errors class="mb-4" :errors="$errors" />
    @if ($message = Session::get('success'))
        <p class="text-green-600">{{ $message }}</p>
    @endif
    <form method="POST" action="{{ route('updateUser') }}">
        @csrf
        <input type="hidden" name="_method" value="put" />
        <div class="mb-2">
            <x-label for="oldpassword" value="old password" />
            <x-input id="oldpassword" class="block mb-1"
                type="password"
                name="oldpassword"
                required autocomplete="current-password" />
        </div>
        <div class="mb-2">
            <x-label for="newpassword" value="new password" />
            <x-input id="newpassword" class="block mb-1"
                type="password"
                name="newpassword"
                required autocomplete="new-password" />
        </div>
        <x-button>Change</x-button>
    </form>
</div>