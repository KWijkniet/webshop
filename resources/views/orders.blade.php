@extends('layouts.app')

@section('content')
<div class="container">
    <a href="/home">Back</a>
    <div class="row justify-content-left">

        @foreach($orders as $order)
            <div class="col-md-12">
                <div class="card">
                    <div class="card-header">
                        {{ $order['id'] }}
                        <span style="float:right;">
                            Total: &euro;{{ $order['totalPrice'] }},-
                        </span>
                    </div>
                    @foreach($order['data'] as $data)
                        <div class="card-body">
                            <div class="cover" style="background-image:url({{$data[0]['url']}});"></div>
                            <p class="description">
                                {{ $data[0]['description'] }}
                            </p>
                            <p class="description">
                                Amount: {{ $data[0]['amount'] }}
                            </p>
                        </div>
                    @endforeach
                </div>
            </div>
        @endforeach
    </div>
</div>
@endsection
