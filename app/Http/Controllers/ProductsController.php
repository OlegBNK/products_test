<?php


namespace App\Http\Controllers;


class ProductsController extends Controller
{
    public function products()
    {
        return view('products.products');
    }

    public function productsList()
    {
        return view('products.productsList');
    }

}
