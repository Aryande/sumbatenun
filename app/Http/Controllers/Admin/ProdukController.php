<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\Produk;
use Illuminate\Http\Request;

class ProdukController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {

        $produks = Produk::all();
        return view('admin.produk.index', compact('produks'));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        //
        return view('admin.produk.create');
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        $data =   $request->validate([
            'foto' => 'nullable|image|mimes:jpg,png,jpeg|max:2048',
            'namaproduk' => 'required',
            'harga' => 'required',
            'keterangan' => 'required',
            'stok' => 'required'
        ]);

        if ($request->has('foto')) {
            $imageName = time() . '.' . $request->foto->extension();
            $request->foto->move(public_path('admin/img/produks/'), $imageName);
            $data['foto'] = $imageName;
        }

        Produk::create($data);

        return to_route('produk.index');
    }

    /**
     * Display the specified resource.
     */
    public function show(Produk $produk)
    {
        return view('admin.produk.show', compact('produk'));
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(string $id)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, Produk $produk)
    {

        $data =   $request->validate([
            'foto' => 'nullable|image|mimes:jpg,png,jpeg|max:2048',
            'namaproduk' => 'required',
            'harga' => 'required',
            'keterangan' => 'required',
            'stok' => 'required'
        ]);

        $data['harga'] = str_replace(',', '', $data['harga']);

        if ($request->has('foto')) {

            $imageName = time() . '.' . $request->foto->extension();
            $request->foto->move(public_path('admin/img/produks/'), $imageName);
            $data['foto'] = $imageName;
        }
        $produk->update($data);

        return to_route('produk.index');
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Produk $produk)
    {
        $produk->destroy($produk->id);
        return to_route('produk.index');
    }
}
