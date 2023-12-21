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
      width: 380px;
      height: 510px;
      flex-shrink: 0;
      border-radius: 30px;
      background: #ce2222;
      display: flex;
      align-items: center;
      justify-content: flex-start;
      margin:20px;
      border: 0px solid;
    }

    .card:hover {
        transform: scale(1.05); /* Increase the scale value for a larger growth */
        box-shadow: 0 0 20px rgba(255, 255, 255, 0.8); /* Adjust the shadow color and size as needed */
    }

    .title-container {
        text-align: center;
        padding: 0;
        margin-top: 1px;
    }

    .main-title {
        color: #2C2C2C;
        font-size: 75px;
        font-family: 'Times New Roman', Times, serif;
        font-weight: 700;
        word-wrap: break-word;
        text-align: center; /* Add this line to center the text */
        margin: 0;

    }

    .title-desc {
        margin: 0;
        color: #B80000;
        font-size: 40px;
        font-family: Montserrat-Medium, sans-serif;
        font-weight: 600;
        word-wrap: break-word;
        text-align: center; /* Add this line if you want to center the text */
    }

    .agent-text {
      color: #ffffff;
      text-align: center;
      font-family: Montserrat-Medium;
      font-size: 42px;
      font-style: normal;
      font-weight: 700;
      line-height: normal;
      width: 100%;
      height: 49px;
      margin-top: 41px; /* Adjust this value as needed */
    }

    .providers-text {
        color: #ffffff;
        text-align: center;
        font-family: Montserrat-Medium;
        font-size: 42px;
        font-style: normal;
        font-weight: 700;
        line-height: normal;
        width: 100%;
        height: 49px;
        margin-top: 41px; /* Adjust this value as needed */
    }

    .agent-image {

        margin-top: -10px;
        width: 100%;
        height: 85%;
        flex-shrink: 0;
        border-radius: 30px;
        background-image: url('/assets/images/marketing-arms.png');
        background-position: 50%;
        background-size: cover;
        background-repeat: no-repeat;

    }

    .providers-image {
        margin-top:-7px;
        width: 100%;
        height: 84.8%;
        flex-shrink: 0;
        margin-bottom: 40px;
        border-radius: 30px;
        background-image: url('/assets/images/providers.png');
        background-position: 50%;
        background-size: cover;
        background-repeat: no-repeat;
    }
    .client-image {
        margin-top:0px;
        width: 100%;
        height: 82.2%;
        flex-shrink: 0;
        border-radius: 30px;
        background-image: url('/assets/images/clients.png');
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
        .title-container {
            text-align: center;
            padding: 0;
            margin-top: 20px;
        }
        .main-title {
            color: #2C2C2C;
            font-size: 50px;
            font-weight: 700;
            word-wrap: break-word;
            text-align: center; /* Add this line to center the text */
        }

        .title-desc {
            color: #B80000;
            font-size:25px;
            font-weight: 600;
            word-wrap: break-word;
            text-align: center; /* Add this line if you want to center the text */
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
            width: 350px;
            margin:10px;
        }

        .card:hover {
            transform: scale(0.9); /* Increases the size of the card on hover */
            transition: transform 0.3s ease; /* Adds a smooth transition effect */
        }

        a {
            text-decoration: none;
            color: inherit; /* Use the default text color */
        }

        a:hover {
            cursor: pointer;
        }

    }

</style>

<div class="body">

    <div class="title-container">
        <h1 class="main-title">ALFC</h1>
        <p class="title-desc">Insurance Agency Corporation</p>
    </div>

    <div class="column-container">

        <div class="card-container">

            <a href="#" style="text-decoration: none;">
                <div class="card">
                    <div class="agent-text" style="font-size:35px">MARKETING ARMS</div>
                    <div class="agent-image"></div>
                </div>
            </a>

            <a href="#" style="text-decoration: none;">
                <div class="card">
                    <div class="providers-text" style="font-size:35px">INSURANCES</div>
                        <div class="providers-image"></div>
                </div>
            </a>

            <a href="#" style="text-decoration: none;">
                <div class="card">
                    <div class="agent-text">CLIENTS</div>
                    <div class="client-image"></div>
                </div>
            </a>

        </div>
    </div>

</div>



@endsection
