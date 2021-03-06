@extends('products/layout/layout')
@section('tittle', 'Список продуктов')

@section('contentMenu')
    <div class="container-head">
        <ul class="nav nav-tabs">
            <li class="nav-item">
                <a class="nav-link" href="{{ route('products') }}">Продукты</a>
            </li>
            <li class="nav-item">
                <a class="nav-link active" href="{{route('productsList')}}">Список продуктов</a>
            </li>
        </ul>
    </div>
@endsection

@section('content')
    <div class="container-body">
        <table class="table table-hover">
            <thead>
            <tr>
                <th class="container-col-order" scope="col">#</th>
                <th class="container-col-image" scope="col">Изображение</th>
                <th class="container-col-name" scope="col">Название</th>
                <th class="container-col-tittle" scope="col">Описание товара</th>
                <th class="container-col-price" scope="col">Цена</th>
                <th class="container-col-button-row-first" scope="col"></th>
                <th class="container-col-button-row-second" scope="col"></th>
            </tr>
            </thead>
            <tbody>
            <tr>

                <form method="post" action="{{route('addProduct')}}" enctype="multipart/form-data">
                    @csrf
                    <th class="container-col-order" scope="row"></th>
                    <td>
                        <div class="form-group">
                            <input type="file" name="image" class="form-control-file container-col-image"
                                   id="exampleFormControlFile1">
                        </div>
                    </td>
                    <td>
                        <input type="text" name="name" class="form-control container-col-name" id="name"
                               placeholder="Название" required>
                    </td>
                    <td>
                        <div class="form-group">
                            <textarea name="tittle" class="form-control container-col-tittle" id="tittle"
                                      rows="2"></textarea>
                        </div>
                    </td>
                    <td class="container-col-price">
                        <input type="hidden" name="" value="price"/>
                        <input type="number" name="price" step="0.01" min="0.01"
                               class="form-control form-control-user container-col-price" id="validationCustom03"
                               placeholder="цена" required>
                    </td>
                    <td>
                        <button class="button btn btn-success" type="submit">Добавить</button>
                    </td>
                    <td></td>
                </form>
            </tr>
            @foreach($products as $product)
                <tr>
                    <th scope="row">{{$product->id}}</th>
                    <td><img class="container-body-card-image"
                             src="{{(isset($product->image)) ? \Illuminate\Support\Facades\Storage::url($product->image) : \Illuminate\Support\Facades\Storage::url('noimage.png')}}">
                    </td>
                    <td>{{(isset($product->name)) ? $product->name : ""}}</td>
                    <td class="container-body-card-text-product-list">{{(isset($product->tittle)) ? $product->tittle : ""}}</td>
                    <td>{{$product->price}} грн</td>
                    <td>
                        <button class="button btn btn-warning" type="submit"><a
                                href="{{route('productSelection', $product->id)}}">Изменить</button>
                    </td>
                    <td>
                        <button class="button btn btn-danger" type="submit"><a
                                href="{{route('deleteProduct', $product->id)}}">Удалить</a></button>
                    </td>
                </tr>
            @endforeach
            </tbody>
        </table>
    </div>
@endsection
