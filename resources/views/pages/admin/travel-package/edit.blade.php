@extends('layouts/admin')

@section('content')
<!-- Begin Page Content -->
<div class="container-fluid">
    
    <!-- Page Heading -->
    <div class="d-sm-flex align-items-center justify-content-between mb-4">
        <h1 class="h3 mb-0 text-gray-800">Edit Paket Travel {{ $item->title }}</h1>
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
            <form action="{{ route('travel-package.update', $item->id) }}" method="POST">
                @method('PUT')
                @csrf
                <div class="form-group">
                    <label for="title">Title</label>
                    <input type="text" class="form-control" name="title" placeholder="Title" value="{{ $item->title }}">
                </div>
                <div class="form-group">
                    <label for="location">Location</label>
                    <input type="text" class="form-control" name="location" placeholder="Location" value="{{ $item->location }}">
                </div>
                <div class="form-group">
                    <label for="nation">Nation</label>
                    <input type="text" class="form-control" name="nation" placeholder="Nation" value="{{ $item->nation }}" autocomplete="off">
                </div>
                <div class="form-group">
                    <label for="continent">Continent</label>
                    <input type="text" class="form-control" name="continent" placeholder="Continent" value="{{ $item->continent }}" autocomplete="off">
                </div>
                <div class="form-group">
                    <label for="about">About</label>
                    <textarea name="about" class="form-control col-sm-12 col-md-8 col-lg-8" id="summary-ckeditor">{{ $item->about }}</textarea>
                </div>
                <div class="form-group">
                    <label for="featured event">Featured Event</label>
                    <input type="text" class="form-control" name="featuredEvent" placeholder="Featured Event" value="{{ $item->featuredEvent }}">
                </div>
                <div class="form-group">
                    <label for="language">Language</label>
                    <input type="text" class="form-control" name="language" placeholder="Language" value="{{ $item->language }}">
                </div>
                <div class="form-group">
                    <label for="food">Food</label>
                    <input type="text" class="form-control" name="food" placeholder="Food" value="{{ $item->food }}">
                </div>
                <div class="form-group">
                    <label for="Departure Date">Departure Date</label>
                    <input type="text" class="form-control col-sm-12 col-md-2 col-lg-2" name="departureDate" id="departureDate" placeholder="Departure Date" value="{{ $item->departureDate }}" autocomplete="off">
                </div>
                <div class="form-group">
                    <label for="Aeparture Date">Arrival Date</label>
                    <input type="text" class="form-control col-sm-12 col-md-2 col-lg-2" name="arrivalDate" id="arrivalDate" placeholder="Arrival Date" value="{{ $item->arrivalDate }}" autocomplete="off">
                </div>
                <div class="form-group">
                    <label for="type">Type</label>
                    <input type="text" class="form-control" name="type" placeholder="Type" value="{{ $item->type }}">
                </div>
                <div class="form-group">
                    <label for="price">Price</label>
                    <input type="text" class="numberformat form-control col-sm-12 col-md-6" name="price" placeholder="Price" value="{{ $item->price }}">
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