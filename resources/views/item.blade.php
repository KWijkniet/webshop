@extends('layouts.app')

@section('content')
<div class="container">
    <a href="/home">Back</a>
    <div class="jumbotron jumbotron-fluid" style="position:relative;">
        <div class="container">
            <h1 class="display-4">{{ $category['name'] }}</h1>
        </div>
        <a class="clickArea" href="/{{$category['name']}}"></a>
    </div>
    <div class="row justify-content-left">
        <div class="col-md-12">
            <div class="card">
                <div class="card-header">
                    {{ $item['name'] }}
                    <span style="float:right;">
                        &euro;{{$item['price']}},-
                    </span>
                </div>
                <div class="card-body">
                    <div style="float: left; height: 500px; width: 500px; background-image:url({{$item['url']}});"></div>
                    <p class="description" style="margin-left: 15px;">
                        {{ $item['description'] }}
                    </p>
                </div>
                <p style="text-align:right; width: 95%;">
                    <a href="/addToCart/{{str_replace(' ', '_', $category['name'])}}/{{str_replace(' ', '_', $item['name'])}}/{{$item['id']}}">Add To Cart</a>
                </p>
            </div>
        </div>
    </div>
</div>
@endsection
