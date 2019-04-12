@extends('layouts.app')

@section('content')
<div class="container">
    <a href="/home">Back</a>
    <div class="row justify-content-left">

        @foreach($items as $item)
            <div class="col-md-12">
                <div class="card">
                    <div class="card-header">
                        {{ $item[1]['name'] }} / {{ $item[0]['name'] }}
                        <span style="float:right;">
                            &euro;{{$item[0]['price']}},-
                        </span>
                    </div>
                    <div class="card-body">
                        <div class="cover" style="background-image:url({{$item[0]['url']}});"></div>
                        <p class="description">
                            {{ $item[0]['description'] }}
                        </p>
                        <p class="description">
                            <a href="/deleteFromCart/{{$item[0]['id']}}">delete</a>
                            <p><a href="/removeAmount/{{$item[0]['id']}}">-</a>{{ $item[0]['amount'] }}<a href="/addAmount/{{$item[0]['id']}}">+</a></p>
                        </p>
                    </div>
                    <p style="text-align:right; width: 95%;">
                        <a href="/{{str_replace(' ', '_', $item[1]['name'])}}/{{str_replace(' ', '_', $item[0]['name'])}}">View Item</a>
                    </p>
                </div>
            </div>
        @endforeach
    </div>
    <div class="card mb-12">
        <div class="row no-gutters">
            <div class="col-md-12">
                <div class="card-body text-right">
                    <h5 class="card-title">Total: {{ $totalPrice }} Euro</h5>
                </div>
            </div>
        </div>
    </div>
    <button class="btn btn-primary btn-block" onclick="window.location.href = '/checkout';">
        Place Order
    </button>
</div>
@endsection
