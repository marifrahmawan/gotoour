@extends('layouts/admin')

@section('content')
<!-- Begin Page Content -->
<div class="container-fluid">
    
    <!-- Page Heading -->
    <div class="d-sm-flex align-items-center justify-content-between mb-4">
        <h1 class="h3 mb-0 text-gray-800">Gallery</h1>
    </div>
    
    <div class="card shadow">
        <div class="card-body">
            <div class="row">
                <div class="table-responsive col-12">
                    <table class="table text-center" id="paginationFull" width="100%" cellspacing="0">
                        <thead>
                            <tr>
                                <th>No.</th>
                                <th>Travel</th>
                                <th>Gambar</th>
                                <th>Action</th>
                            </tr>
                        </thead>
                        <tbody>
                            @forelse ($items as  $item)
                            <tr>
                                <td>{{ $loop->iteration }}</td>
                                <td>{{ $item->title }}</td>
                                <td>
                                    @foreach ($photos as $photo)
                                        @if ($photo->travel_packages_id == $item->id)
                                            <img src="{{ Storage::url($photo->image) }}" alt="" style="width: 150px; height: 100px;" class="img-thumbnail">
                                        @endif
                                    @endforeach
                                </td>
                                <td>
                                    <a href="{{ route('gallery.show', $item->id) }}" class="btn btn-info">
                                        <i class="fa fa-pencil-alt"></i>
                                    </a>
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