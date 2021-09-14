<h3 class="font-bold text-gray-900 mb-2 mt-8 uppercase text-xl">Bids</h3>
@if ($bids->count() > 0)
<table class="w-full bids-table">
    <thead class="uppercase font-bold">
        <tr class="border-b-2 border-gray-800">
            <td>User</td>
            <td>Amount</td>
            <td>Date</td>
        </tr>
    </thead>
    <tbody>
    @foreach ($bids as $bid)
        <tr>
            <td class="name">{{$bid->user->name}}</td>
            <td class="price">&euro;&nbsp;{{$bid->amount}}</td>
            <td class="date">{{$bid->created_at}}</td>
        </tr>
    @endforeach
    </tbody>
</table>
@else
<p>No bids have been made yet.</p>
@endif