<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\Order;
use App\Models\Produk;
use Illuminate\Http\Request;

class AdminController extends Controller
{
    public function __invoke(Request $request)
    {
        $orders = Order::where('statusbayar', false)->limit(5)->get();
        $produk = Produk::count();
        $lunas = Order::where('statusbayar', true)->count();
        $belumlunas = Order::where('statusbayar', false)->count();
        return view('admin.dashboard', compact('orders', 'produk', 'lunas', 'belumlunas'));
    }
}
