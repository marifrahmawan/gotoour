@extends('layouts/admin')

@section('content')
<!-- Begin Page Content -->
<div class="container-fluid">
    
    <!-- Page Heading -->
    <div class="d-sm-flex align-items-center justify-content-between mb-4">
        <h1 class="h3 mb-0 text-gray-800">Gallery {{ $add->title }}</h1>
        <a href="{{ route('gallery-create', $add->id) }}" class="btn btn-sm btn-primary shadow-sm">
            <i class="fas fa-plus text-white-50"></i> Tambah Gallery 
        </a>
    </div>
    
    <div class="row">
        <div class="table-responsive">
            <table class="table table-dark" width="100%" cellspacing="0">
                <thead>
                    <tr>
                        <th>No.</th>
                        <th>Travel</th>
                        <th>Gambar</th>
                        <th>Action</th>
                    </tr>
                </thead>
                <tbody>
                    @forelse ($photos as $photo)
                    <tr>
                        <td>{{ $loop->iteration }}</td>
                        <td>{{ $photo->travel_package->title }}</td>
                        <td>
                            <img src="{{ Storage::url($photo->image) }}" alt="" style="width: 150px; height: 100px;" class="img-thumbnail">
                        </td>
                        <td>
                            <a href="{{ route('gallery.edit', $photo->id) }}" class="btn btn-info">
                                <i class="fa fa-pencil-alt"></i>
                            </a>
                            <form action="{{ route('gallery.destroy', $photo->id) }}" class="d-inline" method="POST">
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
<!-- /.container-fluid -->
@endsection