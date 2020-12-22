@extends('layouts/admin')

@section('content')
<!-- Begin Page Content -->
<div class="container-fluid">
    
    <!-- Page Heading -->
    <div class="d-sm-flex align-items-center justify-content-between mb-4">
        <h1 class="h3 mb-0 text-gray-800">Transaksi : <b>PENDING</b></h1>
    </div>
    
    <div class="card shadow">
        <div class="card-body">
            <div class="row">
                <div class="table-responsive col-12">
                    <table class="table" id="paginationFull" width="100%" cellspacing="0">
                        <thead>
                            <tr>
                                <th>No.</th>
                                <th>Travel</th>
                                <th>Buyer</th>
                                <th>Email</th>
                                <th>Total</th>
                                <th>Status</th>
                                <th class="text-center">Action</th>
                            </tr>
                        </thead>
                        <tbody>
                            @foreach ($items as $item)
                            @if ($item->transaction->transaction_status == "PENDING")
                            <tr>
                                <td>{{ $loop->iteration }}</td>
                                <td>{{ $item->travel_package->title }}</td>
                                <td>{{ $item->title_order}} {{ $item->first_name_order }} {{ $item->last_name_order }} </td>
                                <td>{{ $item->email_order }}</td>
                                <td>Rp. {{ number_format($item->transaction->transaction_total) }}</td>
                                <td>{{ $item->transaction->transaction_status }}</td>
                                <td class="text-center">
                                    <a href="{{ route('transaction.show', $item->transaction->id) }}" class="btn btn-primary">
                                        <i class="fa fa-eye"></i>
                                    </a>
                                    <a href="{{ route('transaction.edit', $item->transaction->id) }}" class="btn btn-info">
                                        <i class="fa fa-pencil-alt"></i>
                                    </a>
                                    <form action="{{ route('transaction.destroy', $item->transaction->id) }}" class="d-inline" method="POST">
                                        @csrf
                                        @method('delete')
                                        
                                        <button class="btn btn-danger">
                                            <i class="fa fa-trash"></i>
                                        </button>
                                    </form>
                                </td>
                            </tr>
                            @endif
                            
                            @endforeach
                            
                        </tbody>
                    </table>
                </div>
            </div>
        </div>
    </div>
    
    <!-- Page Heading -->
    <div class="d-sm-flex align-items-center justify-content-between mb-4 mt-4">
        <h1 class="h3 mb-0 text-gray-800">Transaksi : <b>SUCCESS</b></h1>
    </div>
    
    <div class="card shadow">
        <div class="card-body">
            <div class="row">
                <div class="table-responsive col-12">
                    <table class="table" id="paginationFull2" width="100%" cellspacing="0">
                        <thead>
                            <tr>
                                <th>No.</th>
                                <th>Travel</th>
                                <th>Buyer</th>
                                <th>Email</th>
                                <th>Total</th>
                                <th>Status</th>
                                <th class="text-center">Action</th>
                            </tr>
                        </thead>
                        <tbody>
                            @foreach ($items as $item)
                            @if ($item->transaction->transaction_status == "SUCCESS")
                            <tr>
                                <td>{{ $loop->iteration }}</td>
                                <td>{{ $item->travel_package->title }}</td>
                                <td>{{ $item->title_order}} {{ $item->first_name_order }} {{ $item->last_name_order }} </td>
                                <td>{{ $item->email_order }}</td>
                                <td>Rp. {{ number_format($item->transaction->transaction_total) }}</td>
                                <td>{{ $item->transaction->transaction_status }}</td>
                                <td class="text-center">
                                    <a href="{{ route('transaction.show', $item->transaction->id) }}" class="btn btn-primary">
                                        <i class="fa fa-eye"></i>
                                    </a>
                                    <a href="{{ route('transaction.edit', $item->transaction->id) }}" class="btn btn-info">
                                        <i class="fa fa-pencil-alt"></i>
                                    </a>
                                    <form action="{{ route('transaction.destroy', $item->transaction->id) }}" class="d-inline" method="POST">
                                        @csrf
                                        @method('delete')
                                        
                                        <button class="btn btn-danger">
                                            <i class="fa fa-trash"></i>
                                        </button>
                                    </form>
                                </td>
                            </tr>
                            @endif
                            
                            @endforeach
                            
                        </tbody>
                    </table>
                </div>
            </div>
        </div>
    </div>
    
</div>
<!-- /.container-fluid -->
@endsection

@push('addon-script')
<script>
    $(document).ready(function () {
      //Pagination full
      $('#paginationFull').DataTable({
        "pagingType": "full_numbers",
        "oLanguage": {
          "sLengthMenu": "Show _MENU_",
        }
      });
    });
</script>

<script>
    $(document).ready(function () {
      //Pagination full
      $('#paginationFull2').DataTable({
        "pagingType": "full_numbers",
        "oLanguage": {
          "sLengthMenu": "Show _MENU_",
        }
      });
    });
</script>
@endpush