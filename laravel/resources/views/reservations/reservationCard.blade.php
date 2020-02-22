<div class="card" style="position: fixed; top: 25%; right: 10px; width: 20%;">
    <div class="card-header">
        Reservation
    </div>
    <div class="card-body">
        @if($reservation && $reservation->reservationItems && count($reservation->reservationItems))
            @foreach($reservation->reservationItems as $reservationItem)
                <div style="display: grid; grid-template-columns: 25px 1fr 1fr; gap: 2px; margin-bottom: 3px;">
                    <div><img src="{{asset('storage/' . $reservationItem->item[0]->imagePath)}}" width="25" height="25"></div>
                    <div>{{$reservationItem->item[0]->description}}</div>
                    <div><a href="/reservation/delete-reservation-item/{{$reservation->id}}/{{$reservationItem->id}}">Remove</a></div>
                </div>
            @endforeach

        <div style="text-align: center; width: 100%;">
            <hr>
            <a class="btn btn-primary btn-sm" style="color: white" href="/reservation/choose-date/{{$reservation->id}}">Finish Reservation</a>
        </div>
        @else
            <div>Find the item and click 'Add to Reservation' to get started</div>
        @endif
    </div>
</div>
