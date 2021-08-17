@extends('products/layout/layout')
@section('tittle', 'Продукты')

@section('contentMenu')
    <div class="container-head">
        <ul class="nav nav-tabs">
            <li class="nav-item">
                <a class="nav-link active" href="{{ route('products') }}">Продукты</a>
            </li>
            <li class="nav-item">
                <a class="nav-link" href="{{route('productsList')}}">Список продуктов</a>
            </li>
        </ul>
    </div>
@endsection

@section('content')
    <div class="container-body">
        <div class="row row-cols-1 row-cols-md-3 g-4 ">
            @foreach($products as $product)
            <div class="col-3 container-body-card">
                <div class="card h-100">
                    <div class="card-header">
                        <img class="container-body-card-image" src="{{(isset($product->image)) ? \Illuminate\Support\Facades\Storage::url($product->image) : 'noimage.png'}}">
                    </div>
                    <div class="card-body">
                        <h5 class="card-title">{{$product->name}}</h5>
                        <p class="card-text container-body-card-text">{{$product->tittle}}</p>
                    </div>
                    <div class="card-footer">
                        <p class="text-muted container-body-card-price">{{$product->price}} грн</p>
                    </div>
                </div>
            </div>
            @endforeach
        </div>
    </div>
@endsection


