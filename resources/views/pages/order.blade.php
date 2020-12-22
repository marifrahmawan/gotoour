@extends('layouts.checkout')

@section('title','Checkout')

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
                                Paket Travel
                            </li>
                            <li class="breadcrumb-item">
                                Details
                            </li>
                            <li class="breadcrumb-item active">
                                Checkout
                            </li>
                        </ol>
                    </nav>
                </div>
            </div>
            <div class="row">
                <div class="col-lg-8 pl-lg-0">
                    <div class="card card-details mb-4">
                        
                        @if ($errors->any())
                        <div class="alert alert-danger">
                            <ul>
                                @foreach ($errors->all() as $error)
                                <li>{{ $error }}</li>
                                @endforeach
                            </ul>
                        </div>
                        @endif
                        
                        <h1>Who's going ?</h1>
                        <p>
                            Trip to {{ $item->title}}, {{ $item->location}}
                        </p>
                        <div class="attendee">
                            <table class="table table-responsive-sm text-center">
                                <thead>
                                    <tr>
                                        <th>Picture</th>
                                        <th>Name</th>
                                        <th>Nationality</th>
                                        <th>Visa</th>
                                        <th>Passport</th>
                                        <th></th>
                                    </tr>
                                </thead>
                                <tbody>
                                    
                                    
                                    <tr>
                                        <td><img src="https://ui-avatars.com/api/?name=Dummy" alt="" height="50" class="rounded-circle"></td>
                                        <td class="align-middle">Dummy</td>
                                        <td class="align-middle">Dummy</td>
                                        <td class="align-middle">Dummy</td>
                                        <td class="align-middle">Dummy</td>
                                        <td class="align-middle">
                                            <a href="#">
                                                <img src="{{ url('assets/images/ic_remove.png') }}" alt="">
                                            </a>
                                        </td>
                                    </tr>
                                    
                                    
                                </tbody>
                            </table>
                        </div>
                        <div class="members mt-3">
                            <h2>Add Member</h2>
                            <form action="#" class="form-inline" method="POST">
                                @csrf
                                <label for="username" class="sr-only">Name</label>
                                <input type="text" name="username" class="form-control mb-2 mr-sm-2 col-sm-3" id="username" placeholder="Username" autocomplete="off">
                                
                                <label for="nationality" class="sr-only">Nationality</label>
                                <input type="text" name="nationality" class="form-control mb-2 mr-sm-2 col-sm-2" id="nationality" placeholder="Nationality" autocomplete="off">
                                
                                <label for="is_visa" class="sr-only">VISA</label>
                                <select name="is_visa" id="is_visa" class="custom-select mb-2 mr-sm-2">
                                    <option value="" selected>VISA</option>
                                    <option value="1">30 Days</option>
                                    <option value="0">N/A</option>
                                </select>
                                
                                <div class="input-group mb-2">
                                    <label for="DOE_passport" class="sr-only">DOE Passport</label>
                                    <input type="text" class="form-control datepicker col-sm-6 col-md-6 col-lg-6" id="DOE_passport" name="DOE_passport" placeholder="DOE Passport" autocomplete="off">
                                </div>
                                
                                <button type="submit" class="btn btn-add-now mb-2 px-4 col-sm-auto">Add Now</button>
                            </form>
                            
                            <div class="card card-note mt-3 col-sm-9 col-md-9 col-lg-9">
                                <h3 class="mt-2 mb-0 ml-2">Note</h3>
                                <hr class="mt-0 mb-0">
                                <p class="ml-2 mb-1">
                                    You're only able to invite member that has registered in Gotoour
                                </p>
                            </div>
                        </div>
                    </div>
                </div>
                
                <div class="col-lg-4 pr-0">
                    <div class="card card-details card-right">
                        <h2>Trip Information</h2>
                        <hr class="mb-2 mt-0" >
                        
                        <table class="trip-information my-2">
                            <tr>
                                <th width="50%">Members</th>
                                <td width="50%" class="text-right"></td>
                            </tr>
                            <tr>
                                <th width="50%">Additional VISA</th>
                                <td width="50%" class="text-right">Rp.  </td>
                            </tr>
                            <tr>
                                <th width="50%">Trip Price</th>
                                <td width="50%" class="text-right">Rp. </td>
                            </tr>
                            <tr>
                                <th width="50%">Sub Total</th>
                                <td width="50%" class="text-right">Rp. </td>
                            </tr>
                            <tr>
                                <th width="50%" class="text-blue">
                                    Total <b style="color: #ff8800; font-family: 'Assistant', sans-serif; font-size: 15px; font-weight: bold;">(+Unique code)</b>
                                </th>
                                <td width="50%" class="text-right price-total">
                                    <span class="text-blue">Rp. </span>
                                    <span class="text-orange">{{ mt_rand(0, 999) }}</span>
                                    {{-- PR NIHHHH KITA BUAT OTOMATIS DI DATABASE --}}
                                </td>
                            </tr>
                        </table>
                        <hr class="mt-2">
                        <h2>Payments</h2>
                        <p class="mt-2 mb-2">Please complete payment before you continue the trip.</p>
                        <br>
                        <div class="bank">
                            <div class="bank-item pb-3">
                                <img src="{{ url('assets/images/bca.png') }}" alt="" class="bank-image">
                                <div class="description">
                                    <h3 class="mb-0">PT. Gotoour ID</h3>
                                    <p>
                                        Bank Central Asia <br>
                                        731 520 7525
                                    </p>
                                </div>
                            </div>
                        </div>
                        <div class="bank">
                            <div class="bank-item pb-3">
                                <img src="{{ url('assets/images/mandiri.png') }}" alt="" class="bank-image">
                                <div class="description">
                                    <h3 class="mb-0">PT. Gotoour ID</h3>
                                    <p>
                                        Bank Mandiri <br>
                                        043 110 000 374 330
                                    </p>
                                </div>
                            </div>
                        </div>
                    </div>
                    
                    <div class="join-container">
                        <a href="#" class="btn btn-block btn-join-now mt-3 py-2">
                            I Have Paid
                        </a>
                    </div>
                    <div class="text-center mt-3">
                        <a href="#" class="text-muted">Cancel Booking</a>
                    </div>
                </div>
            </div>
        </div>
    </section>
</main>
@endsection

@push('addon-style')
<link rel="stylesheet" href="{{ url('assets/libraries/gijgo/css/gijgo.min.css') }}">
@endpush

@push('addon-script')
<script src="{{ url('assets/libraries/gijgo/js/gijgo.min.js') }}"></script>

<script>
    $(document).ready(function(){
        $('.datepicker').datepicker({
            format:'yyyy-mm-dd',
            uiLibrary: 'bootstrap4',
            icons: {
                rightIcon: '<img src="{{url('assets/images/ic_calender.png') }}">'
            }
        });
    });
</script>
@endpush