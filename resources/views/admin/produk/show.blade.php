<x-admin-layout>

    <div class="container-fluid">

        <!-- Page Heading -->
        <h1 class="h3 mb-2 text-gray-800">Data Produk</h1>
        <!-- DataTales Example -->
        <div class="card shadow mb-4">
            <div class="card-header py-3">
                <h6 class="m-0 font-weight-bold text-primary">{{ $produk->namaproduk }} </h6>
            </div>
            <div class="card-body">
                <form class="row g-3" action="{{ route('produk.update', $produk) }}" method="POST"
                    enctype="multipart/form-data">
                    @csrf
                    @method('put')
                    <div class="col-md-4 col-12">
                        <div class="row">
                            <img src='{{ $produk->foto }}' class="img-fluid" alt="">
                        </div>
                    </div>
                    <div class="col-md-8 col-12">
                        <div class="row">
                            <div class="col-12 mb-3">
                                <label for="exampleFormControlFile1">Foto</label>
                                <input type="file" class="form-control-file" id="foto" name="foto">
                            </div>
                            <div class="col-md-4 col-12 mb-3">
                                <label for="namaproduk" class="form-label">nama produk</label>
                                <input type="text" class="form-control" id="namaproduk"
                                    value="{{ old('namaproduk') ?? $produk->namaproduk }}" name="namaproduk">
                            </div>
                            <div class="col-md-4 mb-3">
                                <label for="harga" class="form-label">harga</label>
                                <input type="text" class="form-control" id="harga"
                                    value="{{ old('harga') ?? $produk->harga }}" name="harga">
                            </div>
                            <div class="col-md-4 mb-3">
                                <label for="stok" class="form-label">stok</label>
                                <input type="text" class="form-control" id="stok"
                                    value="{{ old('stok') ?? $produk->stok }}" name="stok">
                            </div>
                            <div class=" col-12 mb-3">
                                <label for="keterangan" class="form-label">keterangan</label>
                                <textarea class="form-control" id="keterangan" name="keterangan" rows="3">{{ old('keterangan') ?? $produk->keterangan }}</textarea>
                            </div>
                            <div class="col-12">
                                <button type="submit" class="btn btn-primary">Simpan</button>
                            </div>
                        </div>

                    </div>


                </form>
            </div>
        </div>

    </div>



    @push('script')
    @endpush
</x-admin-layout>
