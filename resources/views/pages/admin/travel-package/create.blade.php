@extends('layouts/admin')

@section('content')
<!-- Begin Page Content -->
<div class="container-fluid">
    
    <!-- Page Heading -->
    <div class="d-sm-flex align-items-center justify-content-between mb-4">
        <h1 class="h3 mb-0 text-gray-800">Tambah Paket Travel</h1>
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
            <form action="{{ route('travel-package.store') }}" method="POST">
                @csrf
                <div class="form-group">
                    <label for="title">Title</label>
                    <input type="text" class="form-control" name="title" placeholder="Title" value="{{ old('title') }}" autocomplete="off">
                </div>
                <div class="form-group">
                    <label for="location">Location</label>
                    <input type="text" class="form-control" name="location" placeholder="Location" value="{{ old('location') }}" autocomplete="off">
                </div>
                <div class="form-group">
                    <label for="nation">Nation</label>
                    <input type="text" class="form-control" name="nation" placeholder="Nation" value="{{ old('nation') }}" autocomplete="off">
                </div>
                <div class="form-group">
                    <label for="continent">Continent</label>
                    <input type="text" class="form-control" name="continent" placeholder="Continent" value="{{ old('continent') }}" autocomplete="off">
                </div>
                <div class="form-group">
                    <label for="about">About</label>
                    <textarea name="about" class="form-control" id="summary-ckeditor" cols="30" rows="10">{{ old('about') }}</textarea>
                </div>
                <div class="form-group">
                    <label for="featured event">Featured Event</label>
                    <input type="text" class="form-control col-sm-12 col-lg-6" name="featuredEvent" placeholder="Featured Event" value="{{ old('featuredEvent') }}" autocomplete="off">
                </div>
                <div class="form-group">
                    <label for="language">Language</label>
                    <input type="text" class="form-control col-sm-12 col-lg-6" name="language" placeholder="Language" value="{{ old('language') }}" autocomplete="off">
                </div>
                <div class="form-group">
                    <label for="food">Food</label>
                    <input type="text" class="form-control col-sm-12 col-lg-6" name="food" placeholder="Food" value="{{ old('food') }}" autocomplete="off">
                </div>
                <div class="form-group">
                    <label for="Departure Date">Departure Date</label>
                    <input type="text" class="form-control col-sm-12 col-md-2 col-lg-2" name="departureDate" id="departureDate" placeholder="Departure Date" value="{{ old('departureDate') }}" autocomplete="off">
                </div>
                <div class="form-group">
                    <label for="Aeparture Date">Arrival Date</label>
                    <input type="text" class="form-control col-sm-12 col-md-2 col-lg-2" name="arrivalDate" id="arrivalDate" placeholder="Arrival Date" value="{{ old('arrivalDate') }}" autocomplete="off">
                </div>
                <div class="form-group">
                    <label for="type">Type</label>
                    <input type="text" class="form-control col-sm-12 col-lg-6" name="type" placeholder="Type" value="{{ old('type') }}" autocomplete="off">
                </div>
                <div class="form-group">
                    <label for="price">Price</label>
                    <input type="text" class="numberformat form-control col-sm-12 col-md-6" name="price" placeholder="Price" value="{{ old('price') }}" autocomplete="off" data-type="currency">
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

@push('addon-style')
<link rel="stylesheet" href="{{ url('assets/libraries/gijgo/css/gijgo.min.css') }}">
@endpush

@push('addon-script')
<script src="{{ url('assets/libraries/gijgo/js/gijgo.min.js') }}"></script>

<script>
    var today = new Date(new Date().getFullYear(), new Date().getMonth(), new Date().getDate());
    $('#departureDate').datepicker({
        uiLibrary: 'bootstrap4',
        iconsLibrary: 'fontawesome',
        format:'yyyy-mm-dd',
        minDate: today,
        maxDate: function () {
            return $('#arrivalDate').val();
        }
    });
    $('#arrivalDate').datepicker({
        uiLibrary: 'bootstrap4',
        iconsLibrary: 'fontawesome',
        format:'yyyy-mm-dd',
        minDate: function () {
            return $('#departureDate').val();
        }
    });
</script>

<script>
    $('input.numberformat').keyup(function(event) {
        
        // skip for arrow keys
        if(event.which >= 37 && event.which <= 40) return;
        
        // format number
        $(this).val(function(index, value) {
            return value
            .replace(/\D/g, "")
            .replace(/\B(?=(\d{3})+(?!\d))/g, ",")
            ;
        });
    });
</script>
@endpush