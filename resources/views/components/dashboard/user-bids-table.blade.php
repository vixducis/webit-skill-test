<div class="border-b border-gray-400 pb-4 mb-4">
    <h3 class="font-bold text-gray-900 mb-2 uppercase">Bids</h3>

    @if ($bids->count() > 0)
    <table class="w-full bids-table">
        <thead class="uppercase font-bold">
            <tr class="border-b-2 border-gray-800">
                <td>Item</td>
                <td>Amount</td>
                <td>Date</td>
                <td class="text-right">Delete</td>
            </tr>
        </thead>
        <tbody>
        @foreach ($bids as $bid)
            <tr>
                <td class="name">
                    <a class="underline" href="{{url('item/'.$bid->item->id)}}">
                        {{$bid->item->name}}
                    </a>
                </td>
                <td class="price">&euro;&nbsp;{{$bid->amount}}</td>
                <td class="date">{{$bid->created_at}}</td>
                <td class="delete" align="right">
                    <form class="h-6 w-6 text-right" action="{{url('/bid/'.$bid->id)}}" method="POST">
                        @csrf
                        @method('delete')
                        <button class="b-0 m-0" type="submit">
                            <svg xmlns="http://www.w3.org/2000/svg" class="h-6 w-6" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M19 7l-.867 12.142A2 2 0 0116.138 21H7.862a2 2 0 01-1.995-1.858L5 7m5 4v6m4-6v6m1-10V4a1 1 0 00-1-1h-4a1 1 0 00-1 1v3M4 7h16" />
                            </svg>
                        </button>
                    </form>
                </td>
            </tr>
        @endforeach
        </tbody>
    </table>
    @else
    <p>No bids have been made yet.</p>
    @endif
</div>
