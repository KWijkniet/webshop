@extends('layouts.app')

@section('content')
<div class="container">
    <a href="/home">Back</a>
    @foreach($categories as $category)
    <div class="jumbotron jumbotron-fluid" style="position:relative;">
        <div class="container">
            <h1 class="display-4">{{ $category['name'] }}</h1>
        </div>
        <a class="clickArea" href="/{{$category['name']}}"></a>
    </div>
    <div class="row justify-content-left">

        @foreach($items as $item)
            @if($item['category_id'] == $category['id'])

            <div class="col-md-6">
                <div class="card">
                    <div class="card-header">
                        {{ $item['name'] }}
                        <span style="float:right;">
                            &euro;{{$item['price']}},-
                        </span>
                    </div>
                    <div class="card-body">
                        <div class="cover" style="background-image:url({{$item['url']}});"></div>
                        <p class="description">
                            {{ $item['description'] }}
                        </p>
                    </div>
                    <a class="clickArea" href="/{{str_replace(' ', '_', $category['name'])}}/{{str_replace(' ', '_', $item['name'])}}"></a>
                </div>
            </div>
            @endif
        @endforeach
    </div>
    @endforeach
</div>
@endsection
