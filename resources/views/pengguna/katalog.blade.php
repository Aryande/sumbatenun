<x-pengguna-layout>
    <div class="bg-light py-3">
        <div class="container">
            <div class="row">
                <div class="col-md-12 mb-0"><a href="{{ route('dashboard') }}">Home</a> <span class="mx-2 mb-0">/</span>
                    <strong class="text-black">Katalog Produk</strong>
                </div>
            </div>
        </div>
    </div>
    <div class="site-section">
        <div class="container">
            <div class="row mb-5">
                <div class="col-md-12 order-2">
                    <div class="row">
                        <div class="col-md-12 mb-5">
                            <div class="float-md-left mb-4">
                                <h2 class="text-black h5">Semua Katalog</h2>
                            </div>
                        </div>
                    </div>
                    <div class="row mb-5">
                        @foreach ($produks as $produk)
                            <div class="col-sm-6 col-lg-4 mb-4" data-aos="fade-up">
                                <div class="block-4 text-center border">
                                    <figure class="block-4-image">
                                        <a href="{{ route('katalog.show', $produk) }}"><img src="{{ $produk->foto }}"
                                                alt="Image placeholder" class="img-fluid"></a>
                                    </figure>
                                    <div class="block-4-text p-4">
                                        <h3><a href="{{ route('katalog.show', $produk) }}">{{ $produk->namaproduk }}
                                            </a>
                                        </h3>
                                        <p class="text-primary font-weight-bold">{{ $produk->harga }}</p>
                                        <p class="mb-0">Tersedia {{ $produk->stok }}</p>
                                    </div>
                                </div>
                            </div>
                        @endforeach
                    </div>
                </div>
            </div>


        </div>
    </div>
</x-pengguna-layout>
