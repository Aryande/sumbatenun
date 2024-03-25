<x-admin-layout>

    <div class="container-fluid">

        <a href="{{ route('order.index') }}" class="btn btn-primary mb-3">
            <i class="icon-download"></i> Kembali
        </a>
        <div class="row gutters">
            <div class="col-xl-12 col-lg-12 col-md-12 col-sm-12 col-12">
                <div class="card">
                    <div class="card-body p-0">
                        <div class="invoice-container">
                            <div class="invoice-header">
                                <!-- Row start -->
                                <div class="row gutters">
                                    <div class="col-xl-12 col-lg-12 col-md-12 col-sm-12">
                                        <div class="custom-actions-btns mb-5">
                                            <a href="#" class="btn btn-success" data-toggle="modal"
                                                data-target="#konfirmasiModal">
                                                <i class="icon-printer"></i> Konfirmasi
                                            </a>
                                            <a href="#" class="btn btn-secondary" data-toggle="modal"
                                                data-target="#modalBuktiBayar">
                                                <i class="icon-printer"></i> Bukti Bayar
                                            </a>
                                            <div class="modal fade" id="modalBuktiBayar" tabindex="-1" role="dialog"
                                                aria-labelledby="exampleModalLabel" aria-hidden="true">
                                                <div class="modal-dialog modal-dialog-centered" role="document">
                                                    <div class="modal-content">
                                                        <div class="modal-header">
                                                            <h5 class="modal-title" id="exampleModalLabel">Bukti
                                                                Bayar
                                                            </h5>
                                                            <button type="button" class="close" data-dismiss="modal"
                                                                aria-label="Close">
                                                                <span aria-hidden="true">&times;</span>
                                                            </button>
                                                        </div>
                                                        <div class="modal-body">
                                                            <img width="300" class="img-fluid"
                                                                src="{{ $order->buktibayar }}" alt="">
                                                        </div>
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                                <!-- Row end -->
                                <!-- Row start -->
                                <div class="row gutters">
                                    <div class="col-12">
                                        <div class="invoice-details">
                                            <div class="invoice-num">
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
                                    <div class="col-lg-12 col-md-12 col-sm-12">
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
                                                        <td colspan="2">
                                                            <h5 class="text-success"><strong>Total
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
                                <!-- Row end -->
                            </div>
                            <div class="invoice-footer">
                                Thank you for your Business.
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
        <!-- Logout Modal-->
        <div class="modal fade" id="konfirmasiModal" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel"
            aria-hidden="true">
            <div class="modal-dialog" role="document">
                <div class="modal-content">
                    <div class="modal-header">
                        <h5 class="modal-title" id="exampleModalLabel">konfirmasi pesanan</h5>
                        <button class="close" type="button" data-dismiss="modal" aria-label="Close">
                            <span aria-hidden="true">×</span>
                        </button>
                    </div>
                    <div class="modal-body">Konfirmasi pesanan ?</div>
                    <div class="modal-footer">
                        <form action="{{ route('order.update', $order) }}" method="post">
                            @csrf
                            @method('put')
                            <button class="btn btn-danger" type="submit">
                                Konfirmasi
                            </button>
                        </form>
                        <button class="btn btn-secondary" type="button" data-dismiss="modal">Cancel</button>
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
                color: #042472;
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
                color: #383e3a !important;
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
</x-admin-layout>
