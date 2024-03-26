<x-admin-layout>

    <div class="container-fluid">

        <!-- Page Heading -->
        <h1 class="h3 mb-2 text-gray-800">Data Produk</h1>


        <!-- DataTales Example -->
        <div class="card shadow mb-4">
            <div class="card-header py-3">
                <h6 class="m-0 font-weight-bold text-primary">Data Produk</h6>
            </div>
            <div class="card-body">
                <div class="table-responsive">
                    <table class="table table-bordered" id="dataTable" width="100%" cellspacing="0">
                        <thead>
                            <tr>
                                <th>Nama Produk</th>
                                <th>Harga</th>
                                <th>Stok</th>
                                <th>keterangan</th>
                                <th>Opsi</th>
                            </tr>
                        </thead>
                        <tfoot>
                            <tr>
                                <th>Nama Produk</th>
                                <th>Harga</th>
                                <th>Stok</th>
                                <th>keterangan</th>
                                <th>Opsi</th>
                            </tr>
                        </tfoot>
                        <tbody>
                            @forelse ($produks as $produk)

                            <tr>
                                <td>{{ $produk->namaproduk }}</td>
                                <td>{{ $produk->harga }}</td>
                                <td>{{ $produk->stok }}</td>
                                <td>{{ $produk->keterangan }}</td>

                                <td>
                                    <a href="{{ route('produk.show',$produk) }}" class="btn btn-primary">Ubah</a>
                                    <a class="btn btn-danger" href="" data-toggle="modal"
                                        data-target="#modalHapusProduk{{ $produk->id }}">
                                        Hapus
                                    </a>
                                </td>
                            </tr>

                            <!-- Logout Modal-->
                            <div class="modal fade" id="modalHapusProduk{{ $produk->id }}" tabindex="-1" role="dialog"
                                aria-labelledby="exampleModalLabel" aria-hidden="true">
                                <div class="modal-dialog" role="document">
                                    <div class="modal-content">
                                        <div class="modal-header">
                                            <h5 class="modal-title" id="exampleModalLabel">Hapus Produk {{
                                                $produk->namaproduk }} ?</h5>
                                            <button class="close" type="button" data-dismiss="modal" aria-label="Close">
                                                <span aria-hidden="true">×</span>
                                            </button>
                                        </div>
                                        <div class="modal-body">Produk {{ $produk->namaproduk }} akan dihapus</div>
                                        <div class="modal-footer">
                                            <form action="{{ route('produk.destroy',$produk) }}" method="post">
                                                @csrf
                                                @method('delete')
                                                <button class="btn btn-danger"> HAPUS</button>

                                            </form>
                                            <button class="btn btn-secondary" type="button"
                                                data-dismiss="modal">Batal</button>

                                        </div>
                                    </div>
                                </div>
                            </div>

                            @empty
                            <tr>
                                <td>PRODUK MASIH KOSONG</td>
                            </tr>

                            @endforelse
                        </tbody>
                    </table>
                </div>
            </div>
        </div>

    </div>



    @push('script')
    
    <link href="{{ asset('admin/vendor/datatables/dataTables.bootstrap4.min.css') }}" rel="stylesheet">
    <!-- Page level plugins -->
    <script src="{{ asset('admin/vendor/datatables/jquery.dataTables.min.js') }}"></script>
    <script src="{{ asset('admin/vendor/datatables/dataTables.bootstrap4.min.js') }}"></script>

    <!-- Page level custom scripts -->
    <script src="{{ asset('admin/js/demo/datatables-demo.js') }}"></script>

    @endpush
</x-admin-layout>