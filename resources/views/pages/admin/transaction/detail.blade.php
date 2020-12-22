@extends('layouts/admin')

@section('content')
<!-- Begin Page Content -->
<div class="container-fluid">
    
    <!-- Page Heading -->
    <div class="d-sm-flex align-items-center justify-content-between mb-4">
        <h1 class="h3 mb-0 text-gray-800">Detail Transaksi {{ $item->data_order->first_name_order }} {{ $item->data_order->last_name_order }}</h1>
    </div>
    
    <div class="card shadow">
        <div class="card-body">
            <table class="table">
                <tr>
                    <th>Paket Travel</th>
                    <td>{{ $item->travel_package->title }}</td>
                </tr>
                <tr>
                    <th>Buyer</th>
                    <td>{{ $item->data_order->first_name_order }} {{ $item->data_order->last_name_order }}</td>
                </tr>
                <tr>
                    <th>Total</th>
                    <td>Rp. {{ number_format($item->transaction_total) }}</td>
                </tr>
                <tr>
                    <th>Status</th>
                    <td>{{ $item->transaction_status }}</td>
                </tr>

                <tr>
                    <th>Guest</th>
                    <td>
                        <table class="table">
                            <tr>
                                <th>No. </th>
                                <th>Nama</th>
                            </tr>
                            @foreach ($item->transaction_detail as $detail)
                                <tr>
                                    <td>{{ $loop->iteration }}</td>
                                    <td>{{ $detail->title_guest }}. {{ $detail->first_name_guest }} {{ $detail->last_name_guest }}</td>
                                </tr>
                            @endforeach
                        </table>
                    </td>
                </tr>

            </table>
        </div>
    </div>
    
</div>
<!-- /.container-fluid -->
@endsection