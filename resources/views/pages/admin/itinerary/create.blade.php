@extends('layouts/admin')

@section('content')
<!-- Begin Page Content -->
<div class="container-fluid">
    
    <!-- Page Heading -->
    <div class="d-sm-flex align-items-center justify-content-between mb-4">
        <h1 class="h3 mb-0 text-gray-800">Add Travel Plans</h1>
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
            <form action="{{ route('itinerary.store') }}" method="POST">
                @csrf
                    <input type="text"name="travel_packages_id" value="{{ $items->id }}" autocomplete="off" hidden disabled>
                <div class="form-group">
                    <label for="day">Day</label>
                    <input type="number" class="form-control col-1" name="day" placeholder="Day" value="{{ old('day') }}" autocomplete="off">
                </div>
                <div class="form-group">
                    <label for="activities">Activities</label>
                    <textarea name="activities" class="form-control" id="summary-ckeditor" cols="30" rows="10">{{ old('activities') }}</textarea>
                </div>
                
                <button type="submit" class="btn btn-primary btn-block">
                    Simpan
                </button>
            </form>
        </div>
    </div>
    
</div>
<!-- /.container-fluid -->
@endsection