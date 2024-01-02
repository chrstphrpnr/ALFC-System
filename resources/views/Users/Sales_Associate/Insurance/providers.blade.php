{{-- @extends('layouts.app')
@section('content')

<div id="providers-list">
    @foreach ($providers as $provider)
        <a>{{ $provider->provider_name }}</a><br>
    @endforeach
</div>

<script>
    // Function to update the list of providers
    function updateProvidersList() {
        fetchProviders();
        setInterval(fetchProviders, 5000);
    }

    // Function to fetch providers data and update the view
    function fetchProviders() {
        fetch('/providers')
            .then(response => response.text())
            .then(data => {
                document.getElementById('providers-list').innerHTML = data;
            })
            .catch(error => {
                console.error('Error fetching providers:', error);
            });
    }

    // Initial call to update providers list
    updateProvidersList();
</script>

@endsection --}}

@extends('layouts.app')

@section('content')
<style>
    .card {
        transition: transform 0.3s ease-in-out;
    }

    .card:hover {
        transform: scale(1.1);
    }
    .card {
        border-radius: 10px;
        background: #CC2E2E;
        flex-shrink: 0;
        background-position: center;
        background-size: 80%; /* Make the image fit within the card */
        background-repeat: no-repeat;
        margin-bottom: 20px;
        width: 230px;
        height: 220px;
    }


</style>

<h2 style="text-align: center; color: #332727; font-family: Montserrat-Medium; font-size: 40px; font-weight: 700; margin-top: 45px; margin-bottom: 50px;">
    PARTNERED INSURANCE COMPANIES
</h2>

<div class="container d-md-block d-none">
    <div class="row justify-content-center mt-4">
        @foreach ($providers as $provider)
            <div class="col-md-3 mb-4 d-flex justify-content-center">
                <!-- Wrap the card with a link -->
                <a href="{{ route('insurance.products', ['providerId' => $provider->id]) }}" title="{{ $provider->provider_name }}">
                    <div class="card" style="background-image: url({{ asset('Uploads/InsuranceLogo/' . $provider->provider_logo) }});"></div>
                </a>
            </div>
        @endforeach
    </div>
</div>


{{-- <a href="{{ route('insurance.products', ['providerId' => $provider->id]) }}">{{ $provider->provider_name }}</a><br> --}}


@endsection
