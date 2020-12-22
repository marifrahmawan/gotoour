@extends('layouts.admin')

@section('content')
<!-- Begin Page Content -->
<div class="container-fluid">
    
    <!-- Page Heading -->
    <div class="d-sm-flex align-items-center justify-content-between mb-4">
        <h1 class="h3 mb-0 text-gray-800">Detail Travel Plans {{ $item->title }}</h1>
    </div>
    
    <div class="card shadow">
        <div class="card-body">
            <table class="table">
                <tr>
                    <th>Paket Travel</th>
                    <td>{{ $item->title }}</td>
                </tr>
                <tr>
                    <th>Location</th>
                    <td>{{ $item->location }}, {{ $item->nation }}</td>
                </tr>
                <tr>
                    <th>Duration</th>
                    <td>{{ $item->duration_day }} Days, {{ $item->duration_night }} Night</td>
                </tr>
                <tr>
                    <th>Departure Date</th>
                    <td>{{ \Carbon\Carbon::create($item->departureDate)->format('d F, Y') }}</td>
                </tr>
                <tr>
                    <th>Arrival Date</th>
                    <td>{{ \Carbon\Carbon::create($item->arrivalDate)->format('d F, Y') }}</td>
                </tr>
                <tr>
                    <th>About</th>
                    <td>
                        {!! $item->about !!}
                    </td>
                </tr>
                <tr>
                    <th>Itinerary</th>
                    <td>
                        <table class="table table-dark">
                            <tr>
                                <th>Day</th>
                                <th>Activities</th>
                                <th>
                                    <a href="{{ route('itinerary-create', $item->id) }}" class="btn btn-primary">
                                        <i class="fa fa-plus-circle "> Add</i>
                                    </td>
                                </th>
                            </tr>
                            @foreach ($sorted as $detail)
                            <tr>
                                <td width="1%" class="text-center">{{ $detail->day }}</td>
                                <td width="80%">{!! $detail->activities !!}</td>
                                <td width="10%">
                                    <a href="{{ route('itinerary.edit', $detail->id) }}" class="btn btn-info">
                                        <i class="fa fa-pencil-alt"></i>
                                    </a>
                                    <form action="{{ route('itinerary.destroy', $detail->id) }}" class="d-inline" method="POST">
                                        @csrf
                                        @method('delete')
                                        
                                        <button class="btn btn-danger">
                                            <i class="fa fa-trash"></i>
                                        </button>
                                    </form>
                                </td>
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