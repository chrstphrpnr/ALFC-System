{{-- @extends('layouts.app')
@section('content')

<h1>Products for the Provider</h1>
@if(count($products) > 0)
    <ul>
        @foreach($products as $product)
            <li>
                <a href="{{ route('insurance.computation_rates', ['providerId' => $providerId, 'productId' => $product->id]) }}">
                    {{ $product->product_name }}
                </a>
            </li>
        @endforeach
    </ul>
@else
    <p>No products found for this provider.</p>
@endif


@endsection --}}


@extends('layouts.app')

@section('content')

<style>
    .card {
        border-radius: 10px;
        background: #CC2E2E;
        width: 250px;
        height: 150px; /* Adjusted height */
        flex-shrink: 0;
        background-position: center;
        background-size: cover;
        background-repeat: no-repeat;
        background-size: auto;
        margin:10px;
    }

    .card-title {
        color: white;
        font-family: Montserrat-Bold;
        font-size: 35px;
    }

    /* Override Bootstrap's default column padding */

    .cardView .card {
        width: 100px; /* Set your preferred width */
        height: 65px; /* Set your preferred height */
        background-size: 70px 45px;

    }
    .cardView .card:hover {
        transform: scale(1.1); /* Increases the size of the card on hover */
        transition: transform 0.3s ease; /* Adds a smooth transition effect */

    }
    .card:hover {
        transform: scale(1.1); /* Increases the size of the card on hover */
        transition: transform 0.3s ease; /* Adds a smooth transition effect */
        cursor: pointer;
    }


</style>

<h2 style="text-align: center; color: #332727; font-family: Montserrat-Medium; font-size: 40px; font-weight: 700; margin-top: 45px; margin-bottom: 50px;">
    Insurances for {{ $providerName }}
</h2>



<div class = "container-fluid d-md-block d-none">
    <div class="row justify-content-center">
        @foreach($products as $product)

        <div class="col-lg-3 mb-5 d-flex justify-content-center">
            <div class="card d-flex justify-content-center align-items-center">
                <h5 class="card-title">{{ $product->product_name }}</h5>
            </div>
        </div>


        @endforeach

    </div>
</div>



@endsection
