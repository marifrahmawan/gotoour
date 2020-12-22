@extends('layouts/admin')

@section('content')
<!-- Begin Page Content -->
<div class="container-fluid">
    
    <!-- Page Heading -->
    <div class="d-sm-flex align-items-center justify-content-between mb-4">
        <h1 class="h3 mb-0 text-gray-800">Edit Gallery {{ $item->title }}</h1>
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
            <form action="{{ route('gallery.update', $item->id) }}" method="POST" enctype="multipart/form-data">
                @method('PUT')
                @csrf

                <div class="form-group">
                    <label for="travel_packages_id">Paket Travel</label>
                    <select name="travel_packages_id" required readonly class="form-control col-sm-12 col-md-5">
                        <option value="{{ $item->travel_package->id }}">{{ $item->travel_package->title }}</option>
                    </select>
                </div>
                <div>
                    <label for="Current Image">Current Image</label>
                    <div class=>
                        <img src="{{ Storage::url($item->image) }}" width="300 px" class="img-fluid rounded">
                    </div>
                </div>

                <div class="form-group">
                    <label for="image">Image</label>
                    <input type="file" name="image" class="form-control col-sm-12 col-md-5" placeholder="Image">
                </div>

                <button type="submit" class="btn btn-primary btn-block">
                    Update
                </button>
            </form>
        </div>
    </div>
    
</div>
<!-- /.container-fluid -->
@endsection