<x-pengguna-layout>

    <div class="bg-light py-3">
        <div class="container">
            <div class="row">
                <div class="col-md-12 mb-0"><a href="{{ route('dashboard') }}">Home</a> <span class="mx-2 mb-0">/</span>
                    <a href="cart.html">riwayat</a> <span class="mx-2 mb-0">/</span> <strong class="text-black">riwayat
                        pemesanan detail</strong>
                </div>
            </div>
        </div>
    </div>
    <div class="site-section">
        <div class="container">
            <div class="row gutters">
                <div class="col-xl-12 col-lg-12 col-md-12 col-sm-12 col-12">
                    <div class="card">
                        <div class="card-body p-0">
                            <div class="invoice-container">
                                @if (!$order->statusbayar)
                                    <div class="invoice-header mb-3">
                                        <!-- Row start -->
                                        <form action="{{ route('updateBukti', $order) }}" class="d-block" method="post"
                                            enctype="multipart/form-data">
                                            @csrf
                                            <div class="d-flex">
                                                <button type="submit" class="btn btn-success " style="color: rgb(255, 255, 255); background:rgb(7, 151, 33)">
                                                    Konfirmasi Bayar
                                                </button>
                                                <div class="custom-file ml-3">
                                                    <input type="file" class="custom-file-input" id="customFile"
                                                        name="buktibayar">
                                                    <label class="custom-file-label" for="customFile">Choose
                                                        file</label>
                                                    <div id="info">
                                                        <!-- Button trigger modal -->
                                                        @if ($order->buktibayar)
                                                            <a data-toggle="modal" data-target="#modalBukti">
                                                                <span class="badge badge-primary">Lihat bukti</span>
                                                            </a>
                                                        @endif
                                                        <!-- Modal -->
                                                        <div class="modal fade" id="modalBukti" tabindex="-1"
                                                            aria-labelledby="exampleModalLabel" aria-hidden="true">
                                                            <div class="modal-dialog  modal-dialog-centered">
                                                                <div class="modal-content">
                                                                    <div class="modal-header">
                                                                        <h5 class="modal-title" id="exampleModalLabel">
                                                                            Bukti
                                                                            bayar
                                                                        </h5>
                                                                        <button type="button" class="close"
                                                                            data-dismiss="modal" aria-label="Close">
                                                                            <span aria-hidden="true">&times;</span>
                                                                        </button>
                                                                    </div>
                                                                    <div class="modal-body">
                                                                        <img class="img-fluid" width="200px"
                                                                            src="{{ $order->buktibayar }}"
                                                                            alt="">
                                                                    </div>
                                                                </div>
                                                            </div>
                                                        </div>
                                                    </div>
                                                </div>
                                            </div>
                                        </form>
                                    </div>
                                @endif
                                <!-- Row end -->
                                <!-- Row start -->
                                <div class="row gutters">
                                    @if (!$order->statusbayar)
                                        <div class="col-12">
                                            <div class="invoice-details">
                                                <h4>
                                                    Rekening Pelunasan<br>
                                                    (bri) 218601027200506 / Ariyanto Dendo
                                                </h4>
                                            </div>
                                        </div>
                                    @endif
                                    <div class="col-12">
                                        <div class="invoice-details">
                                            <div class="d-flex justify-content-between align-self-center">
                                                <h3 class="ms-auto">Status -
                                                    {{ $order->statusbayar != 0 ? 'LUNAS' : 'Belum Lunas' }}
                                                </h3>
                                                <div class="invoice-num align-self-end">
                                                    <div>Invoice - #{{ $order->id }}</div>
                                                    <div>{{ $order->created_at }}</div>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                    <!-- Row end -->
                                </div>
                                <div class="invoice-body">
                                    <!-- Row start -->
                                    <div class="row gutters">
                                        <div class="col-lg-12 col-md-12 col-sm-12" style="color: rgb(62, 62, 62)">
                                            <div class="table-responsive">
                                                <table class="table custom-table m-0">
                                                    <thead>
                                                        <tr>
                                                            <th>Items</th>
                                                            <th>Jumlah</th>
                                                            <th>Total</th>
                                                        </tr>
                                                    </thead>
                                                    <tbody>
                                                        @foreach ($order->produks as $item)
                                                            <tr>
                                                                <td>{{ $item->namaproduk }}</td>
                                                                <td>{{ $item->pivot->jumlah }}</td>
                                                                <td>{{ number_format($item->pivot->jumlah * $item->harga) }}
                                                                </td>
                                                            </tr>
                                                        @endforeach
                                                        <tr>
                                                            <td colspan="2" >
                                                                <h5 class="text-success" ><strong>Total
                                                                        Bayar</strong>
                                                                </h5>
                                                            </td>
                                                            <td>
                                                                <h5 class="text-success">
                                                                    <strong>{{ number_format($order->totalbayar) }}</strong>
                                                                </h5>
                                                            </td>
                                                        </tr>
                                                    </tbody>
                                                </table>
                                            </div>
                                        </div>
                                    </div>
                                    <a href="https://api.whatsapp.com/send/?phone=62813-2517-3099&text=Konfimasi Pesanan atas nama : {{ $order->namapemesan }}" class="btn btn-success mt-3">Hubungi Admin</a>
                                    <!-- Row end -->
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>


    @push('script')
        <style>
            .invoice-container {
                padding: 1rem;
            }

            .invoice-container .invoice-header .invoice-logo {
                margin: 0.8rem 0 0 0;
                display: inline-block;
                font-size: 1.6rem;
                font-weight: 700;
                color: #2e323c;
            }

            .invoice-container .invoice-header .invoice-logo img {
                max-width: 130px;
            }

            .invoice-container .invoice-header address {
                font-size: 0.8rem;
                color: #9fa8b9;
                margin: 0;
            }

            .invoice-container .invoice-details {
                margin: 1rem 0 0 0;
                padding: 1rem;
                line-height: 180%;
                background: #f5f6fa;
            }

            .invoice-container .invoice-details .invoice-num {
                text-align: right;
                font-size: 0.8rem;
            }

            .invoice-container .invoice-body {
                padding: 1rem 0 0 0;
            }

            .invoice-container .invoice-footer {
                text-align: center;
                font-size: 0.7rem;
                margin: 5px 0 0 0;
            }

            .invoice-status {
                text-align: center;
                padding: 1rem;
                background: #ffffff;
                -webkit-border-radius: 4px;
                -moz-border-radius: 4px;
                border-radius: 4px;
                margin-bottom: 1rem;
            }

            .invoice-status h2.status {
                margin: 0 0 0.8rem 0;
            }

            .invoice-status h5.status-title {
                margin: 0 0 0.8rem 0;
                color: #9fa8b9;
            }

            .invoice-status p.status-type {
                margin: 0.5rem 0 0 0;
                padding: 0;
                line-height: 150%;
            }

            .invoice-status i {
                font-size: 1.5rem;
                margin: 0 0 1rem 0;
                display: inline-block;
                padding: 1rem;
                background: #f5f6fa;
                -webkit-border-radius: 50px;
                -moz-border-radius: 50px;
                border-radius: 50px;
            }

            .invoice-status .badge {
                text-transform: uppercase;
            }

            @media (max-width: 767px) {
                .invoice-container {
                    padding: 1rem;
                }
            }


            .custom-table {
                border: 1px solid #e0e3ec;
            }

            .custom-table thead {
                background: #007ae1;
            }

            .custom-table thead th {
                border: 0;
                color: #ffffff;
            }

            .custom-table>tbody tr:hover {
                background: #fafafa;
            }

            .custom-table>tbody tr:nth-of-type(even) {
                background-color: #ffffff;
            }

            .custom-table>tbody td {
                border: 1px solid #e6e9f0;
            }


            .card {
                background: #ffffff;
                -webkit-border-radius: 5px;
                -moz-border-radius: 5px;
                border-radius: 5px;
                border: 0;
                margin-bottom: 1rem;
            }

            .text-success {
                color: #00bb42 !important;
            }

            .text-muted {
                color: #9fa8b9 !important;
            }

            .custom-actions-btns {
                margin: auto;
                display: flex;
                justify-content: flex-end;
            }

            .custom-actions-btns .btn {
                margin: .3rem 0 .3rem .3rem;
            }
        </style>
    @endpush

    </x-layuot>
