@extends('layouts.app')

@section('title','Gotoour')

@section('content')
<!-- HEADER -->
<header class="text-center">
    <h1>Travel the World
        <br>
        As Easy One Click
    </h1>
    <p class="mt-3">
        Discover the beautiful place
    </p>
    <a href="{{ route('register') }}" class="btn btn-get-started px-4 mt-5">GET STARTED</a>
</header>

<main>
    <div class="container">
        <section class="section-stats row justify-content-center" id="stats">
            <div class="col-3 col-md-2 stats-detail">
                <h2>20K</h2>
                <p>Members</p>
            </div>
            <div class="col-3 col-md-2 stats-detail">
                <h2>12</h2>
                <p>Countries</p>
            </div>
            <div class="col-3 col-md-2 stats-detail">
                <h2>3K</h2>
                <p>Hotels</p>
            </div>
            <div class="col-3 col-md-2 stats-detail">
                <h2>65</h2>
                <p>Partners</p>
            </div>
        </section>
    </div>
    
    <section class="section-select">
        <div class="container">
            <div class="row">
                <div class="col-12 card-product">
                    <div class="card">
                        <div class="card-header text-center">
                            <ul class="nav nav-pills card-header-pills" id="pills-tab" role="tablist">
                                <li class="nav-item">
                                    <a class="nav-link active mx-2" id="pills-tour-tab" data-toggle="pill" href="#pills-tour" role="tab" aria-controls="pills-home" aria-selected="true">
                                        <span>
                                            <img src="{{ url('assets/images/location.png') }}" class="px-1 pt-1 mb-1" width="60px" alt="">
                                        </span><br>
                                        Tour
                                    </a>
                                </li>
                                <li class="nav-item">
                                    <a class="nav-link mx-2" id="pills-tiket-tab" data-toggle="pill" href="#pills-tiket" role="tab" aria-controls="pills-tiket" aria-selected="false">
                                        <span>
                                            <img src="{{ url('assets/images/plane.png') }}" class="px-1 pt-1 mb-1" width="60px" alt="">
                                        </span><br>
                                        Tiket Pesawat
                                    </a>
                                </li>
                                <li class="nav-item">
                                    <a class="nav-link mx-2" id="pills-hotel-tab" data-toggle="pill" href="#pills-hotel" role="tab" aria-controls="pills-hotel" aria-selected="false">
                                        <span>
                                            <img src="{{ url('assets/images/hotel.png') }}" class="px-1 pt-1 mb-1" width="60px" alt="">
                                        </span><br>
                                        Hotel
                                    </a>
                                </li>
                            </ul>
                        </div>
                        <div class="card-body">
                            <div class="tab-content" id="pills-tabContent">
                                <div class="tab-pane fade show active" id="pills-tour" role="tabpanel" aria-labelledby="pills-tour-tab">
                                    <h2>Cari Tour dengan Harga termurah</h2>
                                    <div class="form-check form-check-inline">
                                        <input class="form-check-input" type="radio" checked name="type" id="wilayah" value="Wilayah">
                                        <label class="form-check-label" for="wilayah" id="wilayah">Wilayah</label>
                                    </div>
                                    <div class="form-check form-check-inline">
                                        <input class="form-check-input" type="radio" name="type" id="negara" value="Negara">
                                        <label class="form-check-label" for="negara">Negara</label>
                                    </div>
                                    <form action="#">
                                        <div class="form-group">
                                            <div class="row mt-4">
                                                <div class="col-3">
                                                    <label for="Destinasi">Destinasi</label>
                                                    <select name="destinasi" class="form-control">
                                                        <option value="">PILIH DESTINASI</option>
                                                        <option value="ASIA">ASIA</option>
                                                        <option value="AFRICA">AFRICA</option>
                                                        <option value="AMERICA">AMERICA</option>
                                                        <option value="AUSTRALIA">AUSTRALIA</option>
                                                        <option value="EUROPE">EUROPE</option>
                                                    </select>
                                                </div>
                                                <div class="col-3">
                                                    <label for="Bulan Berangkat">Bulan Keberangkatan</label>
                                                    <select name="bulan" class="form-control">
                                                        <option value="">PILIH BULAN</option>
                                                        <option value="JANUARI">JANUARI</option>
                                                        <option value="FEBRUARI">FEBRUARI</option>
                                                        <option value="MARET">MARET</option>
                                                        <option value="APRIL">APRIL</option>
                                                        <option value="MEI">MEI</option>
                                                        <option value="JUNI">JUNI</option>
                                                        <option value="JULI">JULI</option>
                                                        <option value="AGUSTUS">AGUSTUS</option>
                                                        <option value="SEPTEMBER">SEPTEMBER</option>
                                                        <option value="OKTOBER">OKTOBER</option>
                                                        <option value="NOVEMBER">NOVEMBER</option>
                                                        <option value="DESEMBER">DESEMBER</option>
                                                    </select>
                                                </div>
                                                <div class="col-3">
                                                    <label for="Tahun Berangkat">Tahun Keberangkatan</label>
                                                    <select name="bulan" class="form-control">
                                                        <option value="">PILIH TAHUN</option>
                                                        <option value="2020">2020</option>
                                                        <option value="2021">2021</option>
                                                        <option value="2022">2022</option>
                                                        <option value="2023">2023</option>
                                                    </select>
                                                </div>
                                                <div class="col-3">
                                                    <label for="">&nbsp;</label>
                                                    <input type="submit" class="btn btn-search form-control">
                                                </div>
                                            </div>
                                            
                                        </div>
                                    </form>
                                </div>
                                <div class="tab-pane fade text-center" id="pills-tiket" role="tabpanel" aria-labelledby="pills-tiket-tab">
                                    <b>Coming Soon . . .</b>
                                </div>
                                <div class="tab-pane fade text-center" id="pills-hotel" role="tabpanel" aria-labelledby="pills-hotel-tab">
                                    <b>Coming Soon . . .</b>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </section>
    
    <!-- POPULAR-HEADING -->
    <section class="section-popular" id="popular-header">
        <div class="container">
            <div class="row">
                <div class="col text-center section-popular-heading">
                    <h2>Destination Choice</h2>
                    <P>Featured Places</P>
                </div>
            </div>
        </div>
    </section>
    
    <!-- POPULAR CONTENT -->
    <section class="section-popular-content" id="popular-content">
        <div class="container">
            <div class="section-popular-travel row justify-content-center">
                
                @foreach ($items as $item)
                <div class="col-sm-6 col-md-4 col-lg-3">
                    <div class="card-travel text-center d-flex flex-column" style="background-image: url('{{ $item->galleries->count() ? Storage::url($item->galleries->first()->image) : '' }}'); background-position: center;" >
                        <div class="travel-country">{{ $item->location }}, {{ $item->nation }}</div>
                        <div class="travel-location">{{ $item->title }}</div>
                        <div class="travel-button mt-auto">
                            <a href="{{ url('/detail', $item->slug) }}" class="btn btn-travel-details px-4">View Details</a>
                        </div>
                    </div>
                </div>
                @endforeach
                
            </div>
        </div>
    </section>
    
    <!-- NETWORKS -->
    <section class="section-networks" id="networks">
        <div class="container">
            <div class="row">
                <div class="col-md-4">
                    <h2>NETWORKS</h2>
                    <p>
                        Companies are trusted us
                        <br> 
                        more than just a trip
                    </p>
                </div>
                
                <div class="col-md-8 text-center">
                    <img src="{{ url('assets/images/partner@2x.png') }}" alt="Logo Partner" class="img-partner">
                </div>
            </div>
        </div>
    </section>
    
    <!-- TESTIMONIAL -->
    <section class="section-testimonial-heading" id="testimonial-heading">
        <div class="container">
            <div class="row">
                <div class="col text-center">
                    <h2>CUSTOMER LOVE</h2>
                    <p>
                        Moments were giving them
                        <br>
                        the best experience
                    </p>
                </div>
            </div>
        </div>
    </section>
    
    <section class="section-testimonial-content" id="testimonial-content">
        <div class="container">
            <div class="section-popular-travel row justify-content-center">
                <div class="col-sm-6 col-md-6 col-lg-4">
                    <div class="card card-testimonial text-center">
                        <div class="testimonial-content">
                            <img src="{{ url('assets/images/testimonial1@2x.png') }}" alt="user" class="mb-4 rounded-circle">
                            <h3>Emilia</h3>
                            <p class="testimonial">"Its very beautiful place. The people, the culture and everything in it"
                            </p>
                        </div>
                        <hr>
                        <h3 class="trip-to mt-2">Trip to Bromo</h3>
                    </div>
                </div>
                
                <div class="col-sm-6 col-md-6 col-lg-4">
                    <div class="card card-testimonial text-center">
                        <div class="testimonial-content">
                            <img src="{{ url('assets/images/testimonial2@2x.png') }}" alt="user" class="mb-4 rounded-circle">
                            <h3>Susan</h3>
                            <p class="testimonial">"I create a lot of beautiful memories at here. Im gonna miss this place so much..."
                            </p>
                        </div>
                        <hr>
                        <h3 class="trip-to mt-2">Trip to Nusa Penida</h3>
                    </div>
                </div>
                
                <div class="col-sm-6 col-md-6 col-lg-4">
                    <div class="card card-testimonial text-center">
                        <div class="testimonial-content">
                            <img src="{{ url('assets/images/testimonial3@2x.png') }}" alt="user" class="mb-4 rounded-circle">
                            <h3>Jack</h3>
                            <p class="testimonial">"A tropical haven for beach bums, wellness worshipers, and the culturally curious"
                            </p>
                        </div>
                        <hr>
                        <h3 class="trip-to mt-2">Trip to Ubud</h3>
                    </div>
                </div>
            </div>
        </div>
    </section>
    
</main>
@endsection