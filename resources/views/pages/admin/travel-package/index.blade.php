@extends('layouts/admin')

@section('content')
<!-- Begin Page Content -->
<div class="container-fluid">
    
    <!-- Page Heading -->
    <div class="d-sm-flex align-items-center justify-content-between mb-4">
        <h1 class="h3 mb-0 text-gray-800">Paket Travel</h1>
        <a href="{{ route('travel-package.create') }}" class="btn btn-sm btn-primary shadow-sm">
            <i class="fas fa-plus text-white-50"></i> Tambah Paket Travel
        </a>
    </div>
    
    <div class="card shadow">
        <div class="card-body">
            <div class="row">
                <div class="table-responsive col-12">
                    <table class="table text-center" id="paginationFull" width="100%" cellspacing="0">
                        <thead>
                            <tr>
                                <th>No.</th>
                                <th>Title</th>
                                <th>Location</th>
                                <th>Type</th>
                                <th>Departure Date</th>
                                <th>Arrival Date</th>
                                <th>Duration</th>
                                <th>Price</th>
                                <th>Itinerary</th>
                                <th>Action</th>
                            </tr>
                        </thead>
                        <tbody>
                            @forelse ($items as $item)
                            <tr>
                                <td>{{ $loop->iteration }}</td>
                                <td>{{ $item->title }}</td>
                                <td>{{ $item->location }}, {{ $item->nation }}</td>
                                <td>{{ $item->type }}</td>
                                <td>{{ \Carbon\Carbon::create($item->departureDate)->format('d F, Y') }}</td>
                                <td>{{ \Carbon\Carbon::create($item->arrivalDate)->format('d F, Y') }}</td>
                                <td>{{ $item->duration_day }} Days {{ $item->duration_night }} Night</td>
                                <td >Rp. {{ number_format($item->price) }}</td>
                                <td >
                                    <a href="{{ route('itinerary.show', $item->id) }}" class="btn btn-primary">
                                        <i class="fa fa-eye"></i>
                                    </td>
                                    <td>
                                        <a href="{{ route('travel-package.edit', $item->id) }}" class="btn btn-info">
                                            <i class="fa fa-pencil-alt"></i>
                                        </a>
                                        <form action="{{ route('travel-package.destroy', $item->id) }}" class="d-inline" method="POST">
                                            @csrf
                                            @method('delete')
                                            
                                            <button class="btn btn-danger">
                                                <i class="fa fa-trash"></i>
                                            </button>
                                        </form>
                                    </td>
                                </tr>
                                @empty
                                <tr>
                                    <td colspan="7" class="text-center">Data Kosong</td>
                                </tr>
                                @endforelse
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
    @endpush