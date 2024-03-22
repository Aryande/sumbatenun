<x-pengguna-layout>

    <div class="bg-light py-3">
        <div class="container">
            <div class="row">
                <div class="col-md-12 mb-0"><a href="{{ route('dashboard') }}">Home</a> <span class="mx-2 mb-0">/</span>
                    <strong class="text-black">Cart</strong>
                </div>
            </div>
        </div>
    </div>

    <div class="site-section">
        <div class="container">
            <div class="row mb-5">
                <div class="col-8" method="post">
                    @if (session('status'))
                        <div class="alert alert-danger">
                            {{ session('status') }}
                        </div>
                    @endif
                    <table class="table table-bordered">
                        <thead>
                            <tr>

                                <th class="product-name">Produk</th>
                                <th class="product-price">Harga</th>
                                <th class="product-quantity">Jumlah</th>
                                <th class="product-total">Total</th>
                                <th class="product-remove">Hapus</th>
                            </tr>
                        </thead>
                        <tbody>
                            @forelse ($items as $id=> $item)
                                <tr>
                                    <td class="product-name">
                                        <a href="katalog/{{ $id }}">
                                            <h2 class="h5 text-black">{{ $item['name'] }}</h2>
                                        </a>
                                    </td>
                                    <td>RP {{ number_format($item['harga']) }}</td>
                                    <td>{{ $item['jumlah'] }}</td>
                                    <td>Rp {{ number_format($item['jumlah'] * $item['harga']) }}</td>
                                    <td><a href="{{ route('keranjang.hapus', $id) }}"
                                            class="btn btn-primary btn-sm">X</a>
                                    </td>
                                </tr>
                            @empty
                                <tr>
                                    <td>Keranjang Masih Kosong</td>
                                </tr>
                            @endforelse
                        </tbody>
                    </table>
                    <div class="row">
                        <div class="col-md-6">
                            <div class="row mb-5">
                                <div class="col-md-6">
                                    <a href="{{ route('katalog') }}"
                                        class="btn btn-outline-primary btn-sm btn-block">Cari
                                        Produk Lain </a>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="col-4">
                    <div class="row">
                        <div class="col-md-6">
                            <h3 class="text-black">Total bayar</h3>
                        </div>
                        <div class="col-md-6">
                            <h3 class="text-black">Rp. {{ number_format($totalBayar) }}</h3>
                        </div>
                        @if ($totalBayar > 0)
                            <a href="{{ route('checkout') }}" class="btn btn-primary btn-sm pl-3 btn-block">Order</a>
                        @endif
                    </div>
                </div>
            </div>
        </div>
    </div>



</x-pengguna-layout>
