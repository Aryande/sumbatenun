<x-admin-layout>

    <div class="container-fluid">

        <!-- Page Heading -->
        <h1 class="h3 mb-2 text-gray-800">Tables</h1>
        <p class="mb-4">DataTables is a third party plugin that is used to generate the demo table below.
            For more information about DataTables, please visit the <a target="_blank"
                href="https://datatables.net">official DataTables documentation</a>.</p>

        <!-- DataTales Example -->
        <div class="card shadow mb-4">
            <div class="card-header py-3">
                <h6 class="m-0 font-weight-bold text-primary">Tambah Produk </h6>
            </div>
            <div class="card-body">
                <form class="row g-3" action="{{ route('produk.store') }}" method="POST" enctype="multipart/form-data">
                    @csrf
                    <div class="col-md-4 mb-3">
                        <label for="namaproduk" class="form-label">nama produk</label>
                        <input type="text" class="form-control @error('namaproduk') is-invalid @enderror"
                            id="namaproduk" name="namaproduk">
                        @error('namaproduk')

                        <span class="text-danger">{{ $message }}</span>

                        @enderror
                    </div>
                    <div class="col-md-4 mb-3">
                        <label for="harga" class="form-label">harga</label>
                        <input type="text" class="form-control" id="harga" name="harga">
                    </div>
                    <div class="col-md-4 mb-3">
                        <label for="stok" class="form-label">stok</label>
                        <input type="text" class="form-control" id="stok" name="stok">
                    </div>
                    <div class="col-12 mb-3">
                        <label for="keterangan" class="form-label">keterangan</label>
                        <textarea class="form-control" id="keterangan" rows="3" name="keterangan"></textarea>
                    </div>
                    <div class="col-12 mb-3">
                        <label for="exampleFormControlFile1">Foto</label>
                        <input type="file" class="form-control-file" id="foto" name="foto" value="{{ old('foto') }}">
                    </div>

                    <div class="col-12">
                        <button type="submit" class="btn btn-primary">Simpan</button>
                    </div>
                </form>
            </div>
        </div>

    </div>



    @push('script')



    @endpush
</x-admin-layout>