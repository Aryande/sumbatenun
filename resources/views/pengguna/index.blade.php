<x-pengguna-layout>
    <div class="site-blocks-cover"
        style="background-image:url({{ asset('pengguna/images/bg.jpg') }});" data-aos="fade">
        <div class="container">
            <div class="row align-items-start align-items-md-center justify-content-end">
                <div class="col-md-5 text-center text-md-left pt-5 pt-md-0" style=" background: rgb(78, 31, 219)">
                    <h1 class="mb-2  text-white">Koleksi Produk Tenun</h1>
                    <div class="intro-text text-center text-md-left">
                        <p class="mb-4 text-white">TEMUKAN PRODUK KESUKANAAN KAMU</p>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <div class="site-section block-3 site-blocks-2 bg-light">
        <div class="container">
            <div class="row justify-content-center">
                <div class="col-md-7 site-section-heading text-center pt-4">
                    <h2>Produk Teratas </h2>
                </div>
            </div>
            <div class="row">
                <div class="col-md-12">
                    <div class="nonloop-block-3 owl-carousel">
                        @foreach ($produks as $produk)
                            <div class="item">
                                <div class="block-4 text-center">
                                    <figure class="block-4-image">
                                        <img src="{{ $produk->foto }}" alt="Image placeholder" class="img-fluid"
                                            height="100">
                                    </figure>
                                    <div class="block-4-text p-4">
                                        <h3><a href="{{ route('katalog.show', $produk) }}">{{ $produk->namaproduk }}</a>
                                        </h3>
                                        <p class="text-primary font-weight-bold">{{ $produk->harga }}</p>
                                        <p class="mb-0">Stok Tersedia : {{ $produk->stok }}</p>
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
