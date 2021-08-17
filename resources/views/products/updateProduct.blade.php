@extends('products/layout/layout')
@section('tittle', "изменение $product->name")

@section('contentMenu')
    <div class="container-head">
        <ul class="nav nav-tabs">
            <li class="nav-item">
                <a class="nav-link" href="{{ route('products') }}">Продукты</a>
            </li>
            <li class="nav-item">
                <a class="nav-link" href="{{route('productsList')}}">Список продуктов</a>
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
                <form method="post" action="{{route('updateProduct', $product->id)}}" enctype="multipart/form-data">
                    @csrf
                    <th class="container-col-order" scope="row">{{$product->id}}</th>
                    <td>
                        <div class="form-group">
                            <img
                                width="100%"
                                src="{{(isset($product->image)) ? \Illuminate\Support\Facades\Storage::url($product->image) : \Illuminate\Support\Facades\Storage::url('noimage.png')}}">
                            <input type="file" name="image" class="form-control-file container-col-image"
                                   id="exampleFormControlFile1">
                        </div>
                    </td>
                    <td>
                        <input type="text" name="name" class="form-control container-col-name" id="name"
                               value="{{($product->name)}}" required>
                    </td>
                    <td>
                        <div class="form-group">
                            <textarea name="tittle" class="form-control container-col-tittle" id="tittle"
                                      rows="12">{{$product->tittle}}</textarea>
                        </div>
                    </td>
                    <td class="container-col-price">
                        <input type="hidden" name="" value="price"/>
                        <input type="number" name="price" step="0.01" min="0.01"
                               class="form-control form-control-user container-col-price" id="validationCustom03"
                               value="{{$product->price}}" required>
                    </td>
                    <td>
                        <button class="button btn btn-warning" type="submit">Изменить</button>
                    </td>
                    <td>
                        <a href="{{route('deleteProduct', $product->id)}}" class="button btn btn-danger">Удалить</a>
                    </td>
                </form>
            </tr>
            </tbody>

        </table>
    </div>
@endsection
