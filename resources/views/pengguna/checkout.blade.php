<x-pengguna-layout>

    <div class="bg-light py-3">
        <div class="container">
            <div class="row">
                <div class="col-md-12 mb-0"><a href="{{ route('dashboard') }}">Home</a> <span class="mx-2 mb-0">/</span>
                    <a href="cart.html">keranjang</a> <span class="mx-2 mb-0">/</span> <strong class="text-black">Data
                        pemesan</strong>
                </div>
            </div>
        </div>
    </div>
    <div class="site-section">
        <div class="container">
            <form action="{{ route('checkout.store') }}" class="row" method="post">
                @csrf
                <div class="col-md-6 mb-5 mb-md-0">
                    <h2 class="h3 mb-3 text-black">Detail Pemesan </h2>
                    <div class="p-3 p-lg-5 border">
                        <div class="form-group row">
                            <div class="col-md-12">
                                <label for="namalengkap" class="text-black">Nama Lengkap<span
                                        class="text-danger">*</span></label>
                                <input required type="text" class="form-control" id="namapemesan" name="namapemesan">
                            </div>
                        </div>
                        <div class="form-group row">
                            <div class="col-md-12">
                                <label for="alamatlengkap" class="text-black">Alamat <span
                                        class="text-danger">*</span></label>
                                <input required type="text" class="form-control" id="alamat" name="alamat"
                                    placeholder="alamat anda">
                            </div>
                        </div>
                        <div class="form-group row">
                            <div class="col-md-12">
                                <label for="phone" class="text-black">Phone <span
                                        class="text-danger">*</span></label>
                                <input required type="text" class="form-control" id="phone" name="phone"
                                    placeholder="No Telpon">
                            </div>
                        </div>


                    </div>
                </div>
                <div class="col-md-6">

                    <div class="row mb-5">
                        <div class="col-md-12">
                            <h2 class="h3 mb-3 text-black">Pesanan Kamu </h2>
                            <div class="p-3 p-lg-5 border">
                                <table class="table site-block-order-table mb-5">
                                    <thead>
                                        <th>Product</th>
                                        <th>Total</th>
                                    </thead>
                                    <tbody>

                                        @foreach ($items as $item)
                                            <tr>
                                                <td>{{ $item['name'] }}<strong class="mx-2">x</strong>
                                                    {{ $item['jumlah'] }}
                                                </td>
                                                <td>Rp {{ number_format($item['jumlah'] * $item['harga']) }}</td>
                                            </tr>
                                        @endforeach


                                        <tr>
                                            <td class="text-black font-weight-bold"><strong>pesanan Total</strong>
                                            </td>
                                            <td class="text-black font-weight-bold"><strong>Rp
                                                    {{ number_format($totalBayar) }}</strong></td>
                                        </tr>
                                    </tbody>
                                </table>
                                <div class="form-group">
                                    <button class="btn btn-primary btn-lg py-3 btn-block" type="submit">Selesaikan
                                        Pesanan</button>
                                </div>

                            </div>
                        </div>
                    </div>

                </div>
            </form>

            <!-- </form> -->
        </div>
    </div>

    </x-layuot>
