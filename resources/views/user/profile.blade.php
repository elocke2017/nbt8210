@extends('layouts.master')

@section('content')

    <div class="row">
        <div class="col-md-8 col-md-offset-2">
            <h2>User Profile</h2> <!--need to make these editable!!!-->
            <h4>Name: {{Auth::user()->name}}</h4>
            <h4>Email: {{Auth::user()->email}}</h4>
            <h4>Contact Number: {{Auth::user()->contactNumber}}</h4>
            <h4>Address 1: {{Auth::user()->address1}}</h4>
            <h4>Address 2: {{Auth::user()->address2}}</h4>
            <h4>City: {{Auth::user()->city}}</h4>
            <h4>State: {{Auth::user()->state}}</h4>
            <h4>Zip Code: {{Auth::user()->zipCode}}</h4>

            <hr>
            <h2>My Courses</h2>
            @foreach($orders as $order)
            <div class="panel panel-default">
                <div class="panel-body">
                    <ul class="list-group">
                        @foreach($order->cart->items as $item)
                        <li class="list-group-item">
                            <span class="badge">${{ $item['price'] }}</span>
                            {{ $item['item']['title'] }} | {{ $item['qty'] }} Seat(s)
                        </li>
                        @endforeach
                    </ul>
                </div>
                <div class="panel-footer">
                <strong>Total Price: ${{ $order->cart->totalPrice }}</strong>
                </div>
            </div>
            @endforeach
        </div>
    </div>
@endsection