<?php

namespace App\Services;

use App\Models\Produk;
use Illuminate\Http\Request;

class Cart
{
    public static  function getCart()
    {
        $cart_products = collect(request()->session()->get('cart'));
        return $cart_products;
    }
}
