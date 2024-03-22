<x-pengguna-layout>
    <div class="bg-light py-3">
        <div class="container">
            <div class="row">
                <div class="col-md-12 mb-0"><a href="{{ route('dashboard') }}">Home</a> <span class="mx-2 mb-0">/</span>
                    <strong class="text-black">{{ $produk->namaproduk }}</strong>
                </div>
            </div>
        </div>
    </div>
    <div class="site-section">
        <div class="container">
            @if (session('status'))
                <div class="alert alert-success">
                    {{ session('status') }}
                </div>
            @endif
            <div class="row">
                <div class="col-md-6">
                    <img src="{{ $produk->foto }}" alt="Image" class="img-fluid">
                </div>
                <div class="col-md-6">
                    <h2 class="text-black">{{ $produk->namaproduk }}</h2>
                    <p>
                        {{ $produk->keterangan }}</p>
                    <p><strong class="text-primary h4">Rp {{ $produk->harga }}</strong></p>
                    <p><a href="{{ route('keranjang.tambah', $produk) }}" class="buy-now btn btn-sm btn-primary">Tambah
                            keranjang</a></p>
                </div>
            </div>
        </div>
    </div>
</x-pengguna-layout>
