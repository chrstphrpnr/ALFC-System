@extends('layouts.app')

@section('content')


    <style>
        body {
            margin: 0;
            padding: 0;
            background-image: url('assets/images/landing-page-image.png');
            background-size: cover;
            background-repeat: no-repeat;
            background-attachment: fixed;
            background-position: center;
        }
        /* Create an overlay with a semi-transparent dark color */
        body::before {
            content: '';
            position: absolute;
            top: 0;
            left: 0;
            width: 100%;
            height: 100%;
            background-color: rgba(36, 36, 36, 0.55); /* Adjust opacity (last value) as desired */
            z-index: -1; /* Place the overlay behind the content */

        }

        .logo{
            margin-left: 40px;
            margin-top: 20px;
        }

        .landing-title {
            color: white;
            font-size: 150px;
            font-family: "Times New Roman", Times, serif; /* Enclose the font name in quotes */
            font-weight: 700;
            margin-bottom: -30px; /* Adjust the margin-bottom to reduce the gap */
        }

        .landing-desc {
            color: white;
            font-size: 70px;
            font-family: Montserrat-bold;
            font-weight: 700;
            margin-top: -20px; /* Adjust the margin-top to reduce the gap */
        }

        .btn-get-started {
            border-radius: 10px;
            color: white;
            font-size: 20px;
            font-family: Montserrat-bold;
            background-color: #DA2520;
            width: 174px;
            height: 48px;
        }

        .btn-get-started:hover {
            background-color: #a80e08;
            color: rgb(225, 225, 225);
        }

    </style>

    <img class="logo" src="{{ asset('assets/images/alfc-logo.png') }}" alt="ALFC Logo">

    <div class="container" >
        <div class="row justify-content-center mt-lg-5">
            <div class="landing-title text-center mt-5">ALFC</div>
            <div class="landing-desc text-center">Insurance Agency Corporation</div>
            {{-- <button class="btn btn-get-started mt-3">Get Started</button> --}}
            <a href="{{ route('sales-associate.home') }}" class="btn btn-get-started mt-3">Get Started</a>
        </div>
    </div>

@endsection
