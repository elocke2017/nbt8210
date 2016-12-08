@extends('layouts.master')

@section('title')

    Nebraska Business Training

@endsection

@section('content')
    <h2 align="center">Course Shopping Cart</h2>
    @if(Session::has('cart'))
        <div class="row">
            <div class="col-sm-6 col-md-6 col-md-offset-3 col-sm-offset-3">
                <ul class="list-group">
                    @foreach($courses as $course)
                        <li class="list-group-item">
                            <span class="badge">Seats: {{ $course['qty']}}</span>
                            <strong>{{ $course['item']['title']  }}</strong>
                            <span class="label label-success">$ {{ $course['price'] }}</span>
                            <div class="btn-group">
                                <button type="button" class="btn btn-primary btn-xs dropdown-toggle" data-toggle="dropdown">
                                    Action <span class="caret"></span>
                                </button>
                                <ul class="dropdown-menu">
                                    <li><a href="{{ route('course.reduceByOne', ['id' => $course['item']['id']]) }}">Reduce seats by 1</a></li>
                                    <li><a href="{{ route('course.remove', ['id' => $course['item']['id']]) }}">Remove all seats</a></li>
                                </ul>
                            </div>
                        </li>
                    @endforeach
                </ul>
            </div>
        </div>
        <div class="row">
            <div class="col-sm-6 col-md-6 col-md-offset-3 col-sm-offset-3">
                <strong>Total: $ {{ $totalPrice }}</strong>
            </div>
        </div>
        <hr>
        <div class="row">
            <div class="col-sm-6 col-md-6 col-md-offset-3 col-sm-offset-3">
                <a href="{{ route('checkout') }}" type="button" class="btn btn-success">Checkout</a>
            </div>
        </div>

    @else
        <div class="row">
            <div class="col-sm-6 col-md-6 col-md-offset-3 col-sm-offset-3">
                <h2>No items in cart.</h2>
            </div>
        </div>
    @endif


@endsection