<x-dashboard.logout></x-dashboard.logout>
<x-dashboard.changepassword></x-dashboard.changepassword>
@if ($user->admin)
    <x-dashboard.item-table></x-dashboard.item-table>
@else
    <x-dashboard.user-bids-table :bids="$user->bids"></x-dashboard.user-bids-table>
@endif