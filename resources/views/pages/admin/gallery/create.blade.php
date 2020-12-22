@extends('layouts/admin')

@section('content')
<!-- Begin Page Content -->
<div class="container-fluid">
    
    <!-- Page Heading -->
    <div class="d-sm-flex align-items-center justify-content-between mb-4">
        <h1 class="h3 mb-0 text-gray-800">Tambah Gallery {{ $title->title }}</h1>
    </div>
    
    @if ($errors->any())
    <div class="alert alert-danger">
        <ul>
            @foreach ($errors->all() as $error)
            <li>{{ $error }}</li>
            @endforeach
        </ul>
    </div>
    @endif
    
    <div class="card shadow">
        <div class="card-body">
            <form action="{{ route('gallery.store') }}" method="POST" enctype="multipart/form-data">
                @csrf
                
                <input type="text" name="travel_packages_id" value="{{ $title->id }}" hidden disabled>                
                <div class="form-group">
                    <label for="image">Image</label>
                    <input type="file" class="form-control-file col-sm-12 col-md-5" name="image" placeholder="Image">
                </div>
                
                <button type="submit" class="btn btn-primary col-sm-12 col-md-5">
                    Simpan
                </button>
            </form>
        </div>
    </div>
    
</div>
<!-- /.container-fluid -->
@endsection