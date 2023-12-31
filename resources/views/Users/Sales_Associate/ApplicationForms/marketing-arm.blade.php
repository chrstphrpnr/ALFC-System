@extends('layouts.app')
@section('content')

<style>

    .card-container {
        display: flex;
        justify-content: space-between;
        margin: 10px; /* Adjust margin between cards */
    }

    .column-container {
        display: flex;
        flex-direction: column;
        align-items: center;
    }

    .card {
        width: 400px;
        height: 575px;
        flex-shrink: 0;
        border-radius: 30px;
        background: #CC2E2E;
        display: flex;
        align-items: center;
        justify-content: flex-start;
        margin:30px;
    }

    .card:hover {
        transform: scale(1.05); /* Increase the scale value for a larger growth */
        box-shadow: 0 0 20px rgba(255, 255, 255, 0.8); /* Adjust the shadow color and size as needed */
        cursor: pointer;
    }

    .main-title {
        color: #2C2C2C;
        font-size: 50px;
        font-family: Montserrat-Bold, sans-serif;
        font-weight: 700;
        word-wrap: break-word;
        text-align: center; /* Add this line to center the text */
    }

    .agent-text {
        color: #FFF;
        text-align: center;
        font-family: Montserrat;
        font-size: 42px;
        font-style: normal;
        font-weight: 700;
        line-height: normal;
        width: 100%;
        height: 49px;
        margin-top: 41px; /* Adjust this value as needed */
    }

    .agent-image {
        margin-top: 20px;
        width: 223px;
        height: 463px;
        flex-shrink: 0;
        background-image: url('/assets/images/card1.png');
        background-position: 50%;
        background-size: cover;
        background-repeat: no-repeat;
    }

    .dealer-image {
        margin-top:-90px;
        width: 100%;
        height: 100%;
        flex-shrink: 0;
        margin-bottom: 40px;
        border-radius: 30px;
        background-image: url('/assets/images/card2.png');
        background-position: 50%;
        background-size: cover;
        background-repeat: no-repeat;
    }

    .affiliates-image {
        margin-top:-90px;
        width: 100%;
        height: 100%;
        flex-shrink: 0;
        border-radius: 30px;
        background-image: url('/assets/images/card3.png');
        background-position: 50%;
        background-size: cover;
        background-repeat: no-repeat;

    }

    @media screen and (max-width: 736px) {

        .card-container {
            display: flex;
            justify-content: space-between;
            margin: 20px; /* Adjust margin between cards */
        }

        .main-title {
            color: #2C2C2C;
            font-size: 40px;
            font-weight: 700;
            word-wrap: break-word;
            text-align: center; /* Add this line to center the text */
            margin-top: 50px;
        }



        .column-container {
            display: flex;
            flex-direction: column;
            align-items: center;
            margin:20px;
            overflow-x: hidden; /* Hide horizontal scrollbar */
            overflow-y: auto; /* Enable vertical scrollbar */

        }

        .card-container {
            flex-direction: column;
            align-items: center;

        }

        .card {
            border-radius: 30px; /* Add or adjust the border-radius as needed */
            margin: 50px; /* Add margin between cards */
            width: 350px;
        }

        .card:hover {
            transform: scale(0.9); /* Increases the size of the card on hover */
            transition: transform 0.3s ease; /* Adds a smooth transition effect */
        }

        .dealer-image {
            margin-top:-90px;
            width: 100%;
            height: 100%;
            flex-shrink: 0;
            margin-bottom: 40px;
            border-radius: 80px;
            /* background: url({{ asset('assets/card2.png') }}) center / covers no-repeat; */
            background-image: url('/assets/images/card2.png');
            background-position: center;
            background-size: cover;
            background-repeat: no-repeat;
        }

    }

</style>

<div class="main-title">MARKETING ARMS</div>
    <div class="column-container">
    <div class="card-container">
        <div class="card">
        <div class="agent-text">AGENT</div>
            <div class="agent-image"></div>

        </div>

        <div class="card">
        <div class="agent-text">CAR DEALER</div>
            <div class="dealer-image"></div>

        </div>

        <div class="card">
            <div class="agent-text">AFFILIATES</div>
            <div class="affiliates-image"></div>
        </div>
    </div>
</div>



@endsection
