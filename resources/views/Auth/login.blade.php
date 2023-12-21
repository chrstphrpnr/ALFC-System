@extends('layouts.app')

@section('content')

<style>
    :root {
        font-size: 100%;
        font-size: 16px;
        line-height: 1.5;
        --primary-blue: #233975;
    }

    body{
        padding: 0;
        margin: 0;
        font-weight: 500;
    }

    h1 {
        font-size: 2.25rem;
        font-weight: 700;
        margin-bottom: 20px;
    }

    h2 {
        font-size: 1.5rem;
        font-weight: 700;
    }

    .small {
        font-size: 80%;
        text-align: center;
    }

    .split-screen{
        display: flex;
        flex-direction: column;
    }

    .left {
        height: 200px;
    }

    .left, .right {
        display: flex;
        justify-content: center;
        align-items: center;
    }

    .left {
        background: linear-gradient(rgba(0,0,0,0), rgba(0,0,0,0.5)), url('{{ asset('assets/images/login-banner.png') }}');
        background-size: cover;
        background-position: center center;
    }


    .left .copy {
        color: white;
        text-align: center;
        -webkit-font-smoothing: antialiased;
        -moz-osx-font-smoothing: grayscale;
    }

    .left .p {
        font-weight: 400;
    }


    .right .copy {
        color: black;
        text-align: center;
    }

    .right .copy p {
        margin: 1rem;
        font-size: 0.850;
    }

    .right form{
        margin: 15vh;
        width: 400px;
    }

    form input[type="text"],
    form input[type="password"] {
        display: block;
        width: 100%;
        box-sizing: border-box;
        border-radius: 8px;
        border: 1px solid #c4c4c4;
        padding: 1em;
        margin-bottom: 1.25rem;
        font-size: 0.875rem;
    }

    label {
        display: block;
        margin-bottom: 0.5rem;
        font-size: 0.75rem;
    }


    .input-container.password {
        position: relative;
    }

    input-container.password i {
        position: absolute;
        top: 42px;
        right: 16px;
    }


    .signup-btn {
        display: block;
        width: 100%;
        background: #980000;
        color: white;
        font-weight: 700;
        border: none;
        padding: 0.5rem;
        border-radius: 8px;
        font-size: 1rem;
        text-transform: uppercase;
        letter-spacing: 0.5px;
        margin-top: 30px;
    }

    .signup-btn:hover {
        background: #2c4893;
    }

    .title{
        color: #CB0000;
        margin-top: 3rem;
    }




    /* Web View Code */

    @media only screen and (min-width: 900px) {
        .split-screen {
            flex-direction: row;
            height: 100vh;
        }

        .left,
        .right {
            display: flex;
            width: 50%;
            height: auto;
        }

        .left{
            padding: 2px;
        }

    }
    /* Mobile View Adjustment Code */
    @media only screen and (max-width:768px /* Your mobile breakpoint, e.g., 600px */) {
    .right form {

        width: 80%; /* This will set the width of the form to 150% wider than it is currently */
        margin: 0 auto; /* This will ensure that the form remains centered */
        box-sizing: border-box; /* This ensures padding and borders are included in the width */
    }
    h1 {
        font-size: 1.5rem;
        font-weight: 700;
        margin-bottom: 20px;
        padding: 1rem;
    }
    p{
        margin: 1rem;
        font-size: 0.850;
        padding: 10px;
    }
}





</style>


<div class="split-screen">

    <div class="left">
        <section class="copy">
            <h1>Drive with Confidence, Ensure a Secure Tomorrow</h1>
            <p>Reliable coverage for life's uncertainties, ensuring peace of mind.</p>
        </section>
    </div>

    <div class="right">
        <form>
            <section class="copy">
                <h2 class="title">LOGIN YOUR ACCOUNT</h2>
                <div class="login-container">
                    <p class="title-desc">Please enter your credentials to login in the system.</p>
                </div>
            </section>

            <div class="input-container name">
                <label for="username">Username</label>
                <input id="username" name="username" type="text">
            </div>

            <div class="input-container password">
                <label for="password">Password</label>
                <input id="password" name="password" type="password">
            </div>

            <button class="signup-btn" type="submit">LOGIN</button>

        </form>
    </div>
</div>






@endsection
