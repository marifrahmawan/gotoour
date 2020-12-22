@extends('layouts.app')

@section('title', 'Detail')

@section('content')

<main>
    <section class="section-details-header"></section>
    <section class="section-details-content">
        <div class="container">
            <div class="row">
                <div class="col p-0">
                    <nav>
                        <ol class="breadcrumb">
                            <li class="breadcrumb-item">
                                <a href="{{url('/')}}" style="color: #022C5D">Home</a>
                            </li>
                            <li class="breadcrumb-item active">
                                Details
                            </li>
                        </ol>
                    </nav>
                </div>
            </div>
            <div class="row">
                <div class="col-lg-8 pl-lg-0">
                    <div class="card card-details mb-4">
                        <h1>{{ $item->title }}</h1>
                        <p>
                            {{ $item->location }}, {{ $item->nation }}
                        </p>
                        
                        @if ($item->galleries->count())
                        
                        <div class="gallery">
                            <div class="xzoom-container">
                                <img src="{{ Storage::url($item->galleries->first()->image) }}" class="xzoom" id="xzoom-default" xoriginal="{{ Storage::url($item->galleries->first()->image) }}">
                            </div>
                            <div class="xzoom-thumbs">
                                
                                @foreach ($item->galleries as $gallery)
                                <a href="{{ Storage::url($gallery->image) }}">
                                    <img src="{{ Storage::url($gallery->image) }}" class="xzoom-gallery" xpreview="{{ Storage::url($gallery->image) }}" width="133" height="85">
                                </a> 
                                @endforeach
                                
                            </div>
                        </div>
                        
                        @endif
                        
                        <ul class="nav nav-pills nav-fill mb-3 mt-2" id="pills-tab" role="tablist">
                            <li class="nav-item px-2 mb-2">
                                <a class="nav-link active shadow" id="pills-about-tab" data-toggle="pill" href="#pills-about" role="tab" aria-controls="pills-about" aria-selected="true">
                                    <span>
                                        <img src="{{ url('assets/images/danger-symbol.png') }}" class="px-1 pt-1 mb-1" width="30px" alt="">
                                    </span><br>
                                    About
                                </a>
                            </li>
                            <li class="nav-item px-2 mb-2 ">
                                <a class="nav-link shadow" id="pills-itinerary-tab" data-toggle="pill" href="#pills-itinerary" role="tab" aria-controls="pills-itinerary" aria-selected="false">
                                    <span>
                                        <img src="{{ url('assets/images/clock.png') }}" class="px-1 pt-1 mb-1" width="30px" alt="">
                                    </span><br>
                                    Itinerary
                                </a>
                            </li>
                            <li class="nav-item px-2 mb-2 ">
                                <a class="nav-link shadow" id="pills-syarat-tab" data-toggle="pill" href="#pills-syarat" role="tab" aria-controls="pills-syarat" aria-selected="false">
                                    <span>
                                        <img src="{{ url('assets/images/danger-symbol.png') }}" class="px-1 pt-1 mb-1" width="30px" alt="">
                                    </span><br>
                                    SKB
                                </a>
                            </li>
                        </ul>
                        
                        <div class="tab-content" id="pills-tabContent">
                            <div class="tab-pane fade show active" id="pills-about" role="tabpanel" aria-labelledby="pills-about-tab">
                                <h2>Tentang Wisata</h2>
                                <div class="text-justify">
                                    {!! $item->about !!}
                                </div>
                            </div>
                            <div class="tab-pane fade" id="pills-itinerary" role="tabpanel" aria-labelledby="pills-itinerary-tab">
                                @foreach ($item->itineraries as $itinerary)
                                <div class="card">
                                    <div class="card-body shadow">
                                        <h2>Day {!! $itinerary->day !!}</h2><p class="inline-block" style="color: #ff8800">{{ \Carbon\Carbon::create($item->departureDate)->addDays($itinerary->day-1)->format('d F, Y') }}</p>
                                        <div class="text-justify">
                                            {!! $itinerary->activities !!}
                                        </div>
                                    </div>
                                </div>
                                <br>
                                @endforeach
                            </div>
                            <div class="tab-pane fade " id="pills-syarat" role="tabpanel" aria-labelledby="pills-syarat-tab">
                                <h5 class="text-center mt-4">SYARAT DAN KETENTUAN TOUR</h5><hr>
                                <b>Pemesanan dan Pelunasan Biaya</b>
                                <ul class="text-justify">
                                    <li>Setiap pemesanan harus disertai dengan Formulir Pendaftaran yang telah ditandatangani dan pembayaran uang muka sekurang-kurangnya sejumlah :</li>
                                    <table class="table">
                                        <tr>
                                            <th>Route/Destinasi</th>
                                            <th>DP yang harus dibayar</th>
                                        </tr>
                                        <tr>
                                            <td>Enjoy Anzac, Europe, Middle East & Premier</td>
                                            <td>Rp.7.000.000,-</td>
                                        </tr>
                                        <tr>
                                            <td>South East Asia, Korea, Japan, China, Hongkong</td>
                                            <td>Rp. 4.000.000,-</td>
                                        </tr>
                                    </table>
                                    **Pendaftaran yang dilakukan kurang dari 21 hari sebelum tanggal keberangkatan harus langsung dibayar lunas.
                                    <br><br>
                                    Pemesanan yang tidak disertai dengan Formulir Pendaftaran yang telah ditandatangani dan pembayaran uang muka sebagaimana disebutkan di atas, maka sewaktu-waktu pemesanannya dapat dibatalkan dan kuotanya dapat digantikan oleh peserta lain tanpa pemberitahuan sebelumnya. Pelunasan sisa pembayaran harus dilakukan paling lambat 21 (dua puluh satu) hari sebelum tanggal keberangkatan, walaupun visa perjalanan masih dalam proses atau permintaan deviasi belum terpenuhi
                                    <hr>
                                    <li>
                                        Apabila pelunasan tidak dilakukan sesuai dengan persyaratan tersebut di atas, maka peserta tersebut dapat dianggap telah melakukan pembatalan dan peserta akan dikenakan biaya pembatalan sesuai dengan ketentuan yang berlaku pada Formulir Pendaftaran ini.
                                    </li>
                                </ul>
                                
                                <b>Pembatalan dan Biaya Pembatalan</b>
                                <ul class="text-justify">
                                    <li>Peserta yang berniat membatalkan keikutsertaan harus menyampaikan pembatalannya secara tertulis kepada Gotoour.</li><hr>
                                    <li>Pembatalan yang dilakukan oleh peserta tur karena alasan apapun, akan dikenakan biaya pembatalan sebagai berikut :</li>
                                    <table class="table">
                                        <tr>
                                            <th>Waktu Pembayaran*</th>
                                            <th>Biaya Pembatalan**</th>
                                        </tr>
                                        <tr>
                                            <td>≥ 31 hari</td>
                                            <td>Sejumlah DP</td>
                                        </tr>
                                        <tr>
                                            <td>30-15 hari</td>
                                            <td>50%</td>
                                        </tr>
                                        <tr>
                                            <td>14-8 hari</td>
                                            <td>75%</td>
                                        </tr>
                                        <tr>
                                            <td>≤ 7 hari</td>
                                            <td>100%</td>
                                        </tr>
                                    </table>
                                    * terhitung dari tanggal keberangkatan <br>
                                    ** terhitung dari total biaya keberangkatan<br><br>
                                    <li>Ketentuan biaya pembatalan di atas dapat berubah tanpa pemberitahuan sebelumnya, khususnya pada periode tertentu atau pada jenis produk tertentu yang terkait dengan paket kapal pesiar, penerbangan khusus (extra/charter flight),dan lain-lain sesuai dengan keputusan Dwidayatour.</li><hr>
                                    <li>Biaya pembatalan di atas juga dapat dikenakan kepada peserta yang atas keinginan sendiri bermaksud untuk pindah ke jenis paket perjalanan lain ataupun tanggal keberangkatan lain.</li><hr>
                                    <li>Disamping Biaya Pembatalan sebagaimana tersebut di atas, peserta juga berkewajiban untuk membayar biaya proses pengurusan visa yang telah dilakukan.</li>
                                </ul>
                            </div>
                        </div>
                        
                        <div class="features row">
                            <div class="col-md">
                                <img src="{{ url('assets/images/ic_ticket@2x.png') }}" alt="" class="features-image">
                                <div class="description">
                                    <h3>Featured Event</h3>
                                    <p>{{ $item->featuredEvent }}</p>
                                </div>
                            </div>
                            
                            <div class="col-md border-left">
                                <img src="{{ url('assets/images/ic_language@2x.png') }}" alt="" class="features-image">
                                <div class="description">
                                    <h3>Language</h3>
                                    <p>{{ $item->language }}</p>
                                </div>
                            </div>
                            
                            <div class="col-md border-left">
                                <img src="{{ url('assets/images/ic_foods@2x.png') }}" alt="" class="features-image">
                                <div class="description">
                                    <h3>Foods</h3>
                                    <p>{{ $item->food }}</p>
                                </div>
                            </div>
                            
                        </div>
                    </div>
                </div>

                {{-- Form at Trip Information --}}
                <form action="{{ route('checkout-proccess', $item->id) }}" class="col-lg-4 pr-0" method="POST">
                    <div class="">
                        <div class="card card-details card-right">
                            <h2>Trip Information</h2>
                            <hr style="margin-top: 5px; margin-bottom: 5px;">
                            <table class="trip-information my-2">
                                <tr>
                                    <th width="50%">Departure Date</th>
                                    <td width="50%" class="text-right">{{ \Carbon\Carbon::create($item->departureDate)->format('d F, Y') }}</td>
                                </tr>
                                <tr>
                                    <th width="50%">Arrival Date</th>
                                    <td width="50%" class="text-right">{{ \Carbon\Carbon::create($item->arrivalDate)->format('d F, Y') }}</td>
                                </tr>
                                <tr>
                                    <th width="50%">Duration</th>
                                    <td width="50%" class="text-right">{{ $item->duration_day }} Days, {{ $item->duration_night }} Nights</td>
                                </tr>
                                <tr>
                                    <th width="50%">Type of Trip</th>
                                    <td width="50%" class="text-right">{{ $item->type }}</td>
                                </tr>
                                <tr>
                                    <th width="50%">Price</th>
                                    <td width="50%" class="text-right">Rp. <span id="price">{{ number_format($item->price) }}</span> /person</td>
                                </tr><tr>
                                    <th width="50%"><b>Total</b></th>
                                    <td width="50%" class="text-right"><b>Rp. <span id="total"></span></b></td>
                                </tr>
                            </table>
                            
                            <h2 style="margin-top: 10px">Members are going?</h2>
                            <hr style="margin-top: 5px; margin-bottom: 5px;">
                            @if ($errors->any())
                            <div class="alert alert-danger">
                                <ul>
                                    @foreach ($errors->all() as $error)
                                    <li>{{ $error }}</li>
                                    @endforeach
                                </ul>
                            </div>
                            @endif
                            <div class="members my-2">
                                @csrf
                                <div class="form-group">
                                    <label for="Adult">Adult</label>
                                    <input class="form-control col-12 text-center" min="0" max="10" name="adult" id="adult" value="0" type="number" oninput="calc()" autocomplete="off">
                                </div>
                                <div class="form-group">
                                    <label for="Child">Child</label>
                                    <input class="form-control col-12 text-center" min="0" max="10" name="child" id="child" value="0" type="number" oninput="calc()" autocomplete="off">
                                </div>
                            </div>
                        </div>
                        
                        <div class="join-container">
                            <button class="btn btn-block btn-join-now mt-3 py-2" type="submit">Order Now</button>
                                    {{-- <a href="{{ route('order', $item->slug) }}" class="btn btn-block btn-join-now mt-3 py-2">Order Now</a> --}}
                            
                            {{-- @auth
                                <form action="{{ route('checkout-proccess', $item->id) }}" method="POST">
                                    @csrf
                                    <button class="btn btn-block btn-join-now mt-3 py-2" type="submit">
                                        Join Now
                                    </button>
                                </form>
                                @endauth
                                
                                @guest
                                <a href="{{ route('login') }}" class="btn btn-block btn-join-now mt-3 py-2">
                                    Login or Register to Join
                                </a>
                                @endguest --}}
                        </div>
                    </div>
                </form>
                {{-- End of Form at Trip Information --}}
                
            </div>
        </div>
    </section>
</main>

@endsection

@push('prepend-style')
<link rel="stylesheet" href="{{ url('assets/libraries/xzoom/dist/xzoom.css') }}">
@endpush

@push('addon-script')
<script src="{{ url('assets/libraries/xzoom/dist/xzoom.min.js') }}"></script>
<script src="{{ url('assets/scripts/bootstrap-input-spinner.js') }}"></script>

<script>
    $(document).ready(function(){
        $('.xzoom, .xzoom-gallery').xzoom({
            zoomWidth: 400,
            zoomHeight: 400,
            title: false,
            tint: '#333',
            xoffset: 15
        });
    });
</script>  
<script>
    $("input[type='number']").inputSpinner()
</script>
<script>
    function calc(){
        var price = document.getElementById("price").innerHTML;
        var quantityAdult= document.getElementById("adult").value;
        var quantityChild= document.getElementById("child").value;

        priceNumber = Number(price.replace(/[^0-9\.]+/g, ""));

        total = (parseInt(quantityAdult) + parseInt(quantityChild)) * parseInt(priceNumber);

        var formatter = new Intl.NumberFormat({
        style: 'currency',
        currency: 'IDR',
        });

        if(!isNaN(total)){
            document.getElementById("total").innerHTML = formatter.format(total); /* $2,500.00 */
        }
    }
</script>
@endpush

