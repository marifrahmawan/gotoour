@extends('layouts.success')

@section('title', 'Success')

@section('content')
<main>
    <div class="section-success d-flex align-item-center">
        <div class="col text-center">
            <img src="{{ url('assets/images/ic_email.png') }}" alt="" style="margin-left: 20px; margin-top: 25px;">
            <h1>Success!!</h1>
            <p>
                We've sent you an email for trip <br>
                instruction. Please read it as well.
            </p>
            <a href="{{ route('home') }}" class="btn btn-homepage mt-3 px-5">Home Page</a>
        </div>
    </div>
</main> 
@endsection