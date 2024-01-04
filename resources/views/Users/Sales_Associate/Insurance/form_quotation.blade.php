@extends('layouts.form-app')

@section('content')

<style>
    #continue:disabled:hover + #tooltip {
    display: block;
    }

    #continue:disabled {
        cursor: not-allowed;
    }
    .form-title   {
        color: #332727;
        font-family: Montserrat-Bold;
        font-size: 40px;
        font-style: normal;
        line-height: normal;
        text-align: center;
        margin-top: 30px;
    }
    .title-details{
        color: #4A4A4A;
        font-family: Montserrat-Medium;
        font-size: 20px;
        font-style: normal;
        line-height: normal;
        height: 23px;
        flex-shrink: 0;
        margin-top: 56px;
        margin-bottom: 56px;
    }
    .title-desc{
        width: 100%;
        flex-shrink: 0;
        color: #414141;
        font-family: Montserrat-Medium;
        font-size: 10px;
        font-style: normal;
        line-height: normal;
        padding-bottom: 5px;
        border-bottom: 2px solid #D9D9D9;

    }

    .text-smaller{
        font-family: Montserrat;
        color: #626262;
    }

    .text-card{
        font-family: Montserrat;

        color: #626262;
    }


    .invalid-inputs {
        width: 100%;
        margin-top: 0.25rem;
        font-size: 80%;
        color: #dc3545;
        text-align: center;
    }

    .form-control.custom-input {
        font-size: 13px;
    }


    .custom-input{
        text-align: center;
        height: 38px;
        background: #E4E4E4;
    }

    .form-control custom-input{
        border: none;
    }

    .custom-input:disabled{
        background: #585858;
    }
    .btn-remove {
        background-color: transparent;
        border: none;
        outline: none;
        color: #C7C7C7; /* Change this color to the desired color */
        font-size: 11px;
    }

    .btn-remove:hover {
        font-weight: bold;
        color: #c81515; /* Change this color to the desired hover text color */
        cursor: pointer; /* Show a pointer cursor on hover */
    }



    .btn-add {

        background-color: transparent;
        border: none;
        outline: none;
        color: #B60000;
        font-size: 11px;
    }

    .btn-add:hover {
        font-weight: bold;
        color: #ff7878; /* Change this color to the desired color */
        cursor: pointer; /* Show a pointer cursor on hover */
    }


    @media screen and (max-width: 767px) {

        .text-small{
        font-size:11px;

            }
        .text-card{
            font-size:13px;
        }
        .text-smaller{
            font-size:11px;
        }

        .hidden-mobile {
            visibility: visible !important; /* Adding !important to ensure higher specificity */
        }
    }







</style>

    <div class="container mt-5 mb-5" >
            <div class="row justify-content-center" >
                <div class="col-md-10">
                    <div class="card pb-5" >

                        <form class="form">

                            @csrf

                            <div class="card-body">
                                <h2 class="form-title"> Sedan Quotation Form</h2>

                                <div class="title-header">
                                    <p class="title-details mb-1 mt-sm-2 mt-md-5">Insured Details</p>
                                    <p class="title-desc mt-1">Please input the information of the insured in the designated fields below.</p>
                                </div>

                                <div class="row row-space">

                                    <div class="col-md-9 mb-3">
                                        <label class="input-label label">Insured’s Full Name</label>
                                        <input type="text" id="insured_full_name" name="insured_full_name" class="form-control custom-input" style="text-align: left;" >
                                        <span class="error-message" style="color: red; display: none;"></span>

                                    </div>

                                    <div class="col-sm-3 col-md-3  mb-3 ">
                                        <label class="input-label label">Effectivity Date</label>
                                        <select id="effectivity_type" name="effectivity_type" class="form-control custom-input" style="text-align: left; font-size: 13px;">
                                            <option disabled="disabled" selected="selected">Select Effectivity Date</option>
                                            <option value="6 Month">6 Month</option>
                                            <option value="1 Year">1 Year</option>
                                            <option value="2 Year">2 Year</option>
                                        </select>
                                        <span class="error-message" style="color: red; display: none;"></span>

                                    </div>

                                </div>

                                <div class="row row-space">

                                    <div class="col-md-3 mb-3">
                                        <label class="input-label label">Car Classification</label>
                                        <select id="car_classification" name="car_classification" class="form-control custom-input" style="text-align: left; font-size: 13px;">
                                            <option disabled="disabled" selected="selected">Select Classification</option>
                                            <option value="Private Car">Private Car</option>
                                            <option value="Public Car">Public Car</option>
                                        </select>
                                        <span class="error-message" style="color: red; display: none;"></span>

                                    </div>

                                    <div class="col-md-3 mb-3">
                                        <label class="input-label label">Car Category</label>
                                        <input type="text" id="car_category" name="car_category" class="form-control custom-input" style="text-align: left;">
                                        <span class="error-message" style="color: red; display: none;"></span>

                                    </div>

                                    <div class="col-md-3 mb-3">
                                        <label class="input-label label">Unit Model</label>
                                        <input type="text" id="unit_model" name="unit_model" class="form-control custom-input" style="text-align: left;">
                                        <span class="error-message" style="color: red; display: none;"></span>

                                    </div>

                                    <div class="col-md-3 mb-3">
                                        <label class="input-label label">Plate No.</label>
                                        <input type="text" id="plate_no" name="plate_no" class="form-control custom-input" style="text-align: left;">
                                        <span class="error-message" style="color: red; display: none;"></span>

                                    </div>

                                </div>


                                <div class="title-header">
                                    <p class="title-details mb-1 mt-5">Coverage Limits and Rates</p>
                                    <p class="title-desc mt-1">Please input the limits per coverage and the rate the designated fields below.</p>
                                </div>

                                <div class="computation-coverages">
                                    @foreach($groupedRates as $coverageName => $rates)
                                        <div class="row row-space row-coverages-computations">
                                            <div class="col-sm-3 col-md-3 mt-3 d-flex align-items-center justify-content-center">
                                                <label class="text-smaller input-label computation-coverages">{{ $coverageName }}</label>
                                            </div>

                                            @if($rates->count() > 1)
                                                <div class="col-6 col-sm-3 col-md-3 mb-3 d-flex flex-column align-items-center">
                                                    <label class="text-card input-label label-limit">LIMIT</label>
                                                    <select id="multiple_limit" name="multiple_limit" class="form-control custom-input" style="text-align: left; font-size: 13px;">
                                                        <option disabled="disabled" selected="selected">Select Limit</option>
                                                        {{-- Add options for multiple insurance_computations --}}
                                                        @foreach($rates as $rate)
                                                            <option
                                                                value=" {{ $rate->setLimitMinimum }}"
                                                                data-rate="{{ $rate->setRateMinimum }}"
                                                                data-id="{{ $rate->id }}"
                                                                data-coverage="{{ $coverageName }}"
                                                            >
                                                            {{ $rate->setLimitMinimum }}
                                                            </option>
                                                        @endforeach
                                                    </select>
                                                    <div class="invalid-inputs invalid-inputs-select"></div>

                                                </div>
                                            @else
                                                <div class="col-6 col-sm-3 col-md-3 mb-3 d-flex flex-column align-items-center form-floating">
                                                    <label class="text-card input-label label-limit">LIMIT</label>
                                                    <input type="text" data-coverage="{{ $coverageName }}" id="limit" name="limit" class="form-control custom-input input-limit" style="height: 38px;">
                                                    <div class="invalid-inputs invalid-inputs-limit"></div>
                                                </div>
                                            @endif

                                            <div class="col-6 col-sm-3 col-md-3 mb-3 d-flex flex-column align-items-center">
                                                <label class="text-card input-label label-rate">RATE</label>
                                                <input type="text" data-coverage="{{ $coverageName }}" id="rate" name="rate" class="form-control custom-input input-rate">
                                                <div class="invalid-inputs invalid-inputs-rate"></div>
                                            </div>

                                            <div class="col-6 col-sm-3 col-md-3 mb-3 d-flex flex-column align-items-center">
                                                <label class="text-card input-label label-premium">PREMIUM DUE</label>
                                                <input type="text" data-coverage="{{ $coverageName }}" id="premium_due_{{ $coverageName }}" name="premium_due" class="form-control custom-input" readonly>
                                                <div class="invalid-inputs invalid-inputs-premium"></div>
                                            </div>


                                        </div>
                                    @endforeach
                                </div>

                                {{-- Premium Due Field --}}
                                <div class ="row row-space">

                                    <div class="col-6 col-sm-3 col-md-3 mt-3 d-flex align-items-center justify-content-center">
                                    </div>

                                    <div class="col-6 col-sm-3 col-md-3 mb-3 d-flex flex-column align-items-center">
                                    </div>
                                    <div class="col-sm-3 col-md-3 mb-3 d-flex flex-column align-items-center" >
                                    </div>

                                    <div class="col-sm-3 col-md-3 mb-3 d-flex flex-column align-items-center" >
                                        <label class="text-card input-label label">NET PREMIUM</label>
                                        <input type="text" id="net_premium" name="net_premium" class="form-control custom-input" >
                                    </div>

                                </div>

                                {{-- Computation Due Field --}}
                                <div class ="row row-space">

                                    <div class="col-sm-6 col-md-3 mt-3 d-flex align-items-center justify-content-center">
                                        <label class="text-card input-label label">Computations</label>
                                    </div>

                                    <div class="col-6 col-sm-3 col-md-3 mb-3 d-flex flex-column align-items-center">
                                        <label class="text-card input-label label ">DST</label>
                                        <input type="text" id="dst" name="dst" class="form-control custom-input" >
                                    </div>

                                    <div class="col-6 col-sm-3 col-md-3 mb-3 d-flex flex-column align-items-center" >
                                        <label class="text-card input-label label">VAT</label>
                                        <input type="text" id="vat" name="vat" class="form-control custom-input" >

                                    </div>

                                    <div class="col-6 col-sm-3 col-md-3 mb-3 d-flex flex-column align-items-center" >
                                        <label class="text-card input-label label">RAP</label>
                                        <input type="text" id="rap" name="rap" class="form-control custom-input" >
                                    </div>

                                </div>

                                {{-- Gross Premium Field --}}
                                <div class ="row row-space">
                                    <div class="col-6 col-sm-3 col-md-3 mt-3 d-flex align-items-center justify-content-center">
                                    </div>

                                    <div class="col-6 col-sm-3 col-md-3 mb-3 d-flex flex-column align-items-center">
                                    </div>
                                    <div class="col-sm-3 col-md-3 mb-3 d-flex flex-column align-items-center">
                                        <label class="input-label label">LGT </label>
                                        <select id="lgtSelect" class="form-control custom-input" style="text-align: left; font-size: 13px;" onchange="replaceWithInput()">
                                            {{-- <option disabled="disabled" selected="selected">Select LGT percentage</option>
                                            <option value="0.002">NCR - 0.20%</option>
                                            <option value="0.005">Luzon - 0.50%</option>
                                            <option value="0.0075">Visayas - 0.75%</option>
                                            <option value="0.00825">Mindanao - 0.825%</option> --}}
                                            <option disabled="disabled" selected="selected">Select LGT percentage</option>
                                            @foreach ($lgts as $lgt)
                                                <option value="{{ $lgt->lgt_percentage }}">{{ $lgt->lgt_location }} - {{ number_format($lgt->lgt_percentage * 100, 2) }}%</option>
                                            @endforeach


                                        </select>
                                        <input type="text" id="lgtInput" name="lgt" class="form-control custom-input" style="display: none;" onclick="resetLGTSelect()">
                                    </div>

                                    <div class="col-sm-3 col-md-3 mb-3 d-flex flex-column align-items-center" >
                                        <label class="text-card input-label label">GROSS PREMIUM</label>
                                        <input type="text" id="gross_premium" name="gross_premium" class="form-control custom-input" >
                                        <div id="gross-premium-error" class="error-message" style="display: none; color: red;"></div>

                                    </div>
                                </div>

                                {{-- Discount and Net Premium Field --}}
                                <div class ="row row-space">

                                    <div class="col-6 col-sm-3 col-md-3 mt-3 d-flex align-items-center justify-content-center">
                                    </div>
                                    <div class="col-6 col-sm-3 col-md-3 mb-3 d-flex flex-column align-items-center">
                                    </div>

                                    <div class="col-sm-3 col-md-3 mb-3 d-flex flex-column align-items-center" >
                                        <label class="text-card input-label label">DISCOUNT</label>
                                        <input type="text" id="discount" name="discount" class="form-control custom-input" >

                                    </div>

                                    <div class="col-sm-3 col-md-3 mb-3 d-flex flex-column align-items-center" >
                                        <label class="text-card input-label label">NET</label>
                                        <input type="text" id="net" name="net" class="form-control custom-input" >
                                    </div>

                                </div>


                                <div class="title-header">
                                    <p class="title-details mb-1 mt-5">Full Commission/Revenue</p>
                                    <p class="title-desc mt-1">Please input the necessary details for computation in the designated fields below.</p>
                                </div>

                                <div class="row">
                                <div class="col-md-5 order-1 order-md-0">
                                    <div class="card border-0">
                                        <div class="card-body">
                                            <div class="row row-space">
                                                <div class="col-6 col-sm-3 col-md-6 mt-3 d-flex align-items-center justify-content-start">
                                                    <label class="text-card input-label label">Total Expenses</label>
                                                </div>
                                                <div class="col-6 col-sm-3 col-md-6 mb-3 d-flex flex-column align-items-center">
                                                    <label class="input-label label">Computations</label>
                                                    <input type="text" id="total_expenses" name="total_expenses" class="form-control custom-input" >

                                                </div>
                                            </div>
                                            <div class="row row-space">
                                                <div class="col-6 col-sm-3 col-md-6 mt-3 d-flex justify-content-start">
                                                    <label class="text-card input-label label">VAT</label>
                                                </div>
                                                <div class="col-6 col-sm-3 col-md-6 mb-3 d-flex flex-column align-items-center">
                                                    <label class="input-label label"></label>
                                                    <input type="text" id="computation_vat" name="computation_vat" class="form-control custom-input" >

                                                </div>
                                            </div>
                                            <div class="row row-space">
                                                <div class="col-6 col-sm-3 col-md-6 mt-3 d-flex justify-content-start">
                                                    <label class="text-card input-label label">Sales Credit</label>
                                                </div>
                                                <div class="col-6 col-sm-3 col-md-6 mb-3 d-flex flex-column align-items-center">
                                                    <label class="input-label label"></label>
                                                    <input type="text" id="sales_credit" name="sales_credit" class="form-control custom-input" >

                                                </div>
                                            </div>
                                            <div class="row row-space">
                                                <div class="col-6 col-sm-3 col-md-6 mt-3 d-flex justify-content-start">
                                                    <label class="text-card input-label label">Sales Credit %</label>
                                                </div>
                                                <div class="col-6 col-sm-3 col-md-6 mb-3 d-flex flex-column align-items-center">
                                                    <label class="input-label label"></label>
                                                    <input type="text" id="sales_credit_percent" name="sales_credit_percent" class="form-control custom-input" >

                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                </div>

                                <div class="col-md-7 order-0 order-md-1">
                                    <div class="card border-0">
                                        <div class="card-body" id="dynamicFieldsContainer">
                                            <div class="row row-space" id="initialInputs">

                                                <div class="col-6 col-sm-3 col-md-3 d-flex flex-column align-items-center">
                                                    <label class="input-label label">Titles</label>
                                                    {{-- <select id="title" class="form-control custom-input" style="text-align: left; font-size: 13px;" >
                                                        <option disabled="disabled" selected="selected"></option>
                                                        <option value="BM">BM</option>
                                                        <option value="GM">GM</option>
                                                    </select> --}}
                                                </div>

                                                <div class="col-6 col-sm-3 col-md-5 d-flex flex-column align-items-center">
                                                    <label class="input-label label">Deductions</label>
                                                    {{-- <input type="text" class="form-control custom-input" > --}}
                                                </div>

                                                <div class="col-6 col-sm-3 col-md-4 d-flex flex-column align-items-center">
                                                    <label class="input-label label">Amount</label>
                                                    {{-- <input type="text" class="form-control custom-input" > --}}
                                                </div>

                                            </div>

                                            <div class="row mt-3">
                                                <div class="col-md-12 text-right">
                                                    <button class="btn-remove" id="deleteFieldBtn" disabled>
                                                        REMOVE
                                                    </button>
                                                    <button type="button" class="btn-add" id="addFieldBtn">
                                                        ADD FIELD
                                                    </button>
                                                </div>
                                            </div>




                                        </div>
                                        <div class ="row row-space">
                                                <div class="col-sm-0 col-md-3 mt-3 d-flex flex-column align-items-center">
                                                </div>

                                                <div class=" col-sm-3 col-md-5 mt-3 d-flex flex-column align-items-center" style="padding-top:7px;">
                                                    Marketing Fund:
                                                </div>

                                                <div class="col-sm-3 col-md-4 mt-3 d-flex flex-column align-items-center">
                                                    <input type="text" id="marketing_fund" name="marketing_fund" class="form-control custom-input" >
                                                    <div id="marketing_fund_warning" style="color: red; display: none;">Value cannot exceed 500.</div>

                                                </div>

                                            </div>
                                    </div>
                                </div>

                                    <div class="modal fade" id="exampleModal" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
                                        <div class="modal-dialog modal-lg" role="document">
                                            <div class="modal-content">
                                            <div class="modal-header">
                                                <h5 class="modal-title" id="exampleModalLabel">Proceed with Quotation Submission</h5>
                                                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                                                <span aria-hidden="true">&times;</span>
                                                </button>
                                            </div>
                                            <div class="modal-body ">
                                            Please note that all entered information will be subjected to a thorough validation process before final approval is granted. Once you submit the details, they will be forwarded for review and subsequent approval. Kindly ensure the accuracy and completeness of the information provided, as once the submission is confirmed, no further modifications or edits can be made
                                            </div>
                                            <div class="modal-footer">
                                                <button class="btn btn-secondary ml-2" data-dismiss="modal"  style="background-color: transparent; border: none; color: red;" >
                                                    Cancel
                                                </button>
                                                <button id="continue-button" type="button" class="btn btn-danger" style="border-radius: 20px;" >Proceed</button>
                                                <!-- Add another button here if needed -->
                                            </div>
                                            </div>
                                        </div>
                                    </div>

                                </div>

                            </div>

                        </form>

                    </div>
                </div>
            </div>
        </div>

        <div class="container">
            <div class="row justify-content-center">
                <div class="col-md-10 mb-5 ">
                <div style="display: flex; justify-content: flex-end;  margin-bottom:10px;">
                    <button style="border-radius: 18px; background: transparent; width: 203px; height: 39px; flex-shrink: 0; border: none; ;">
                        <span style="color: #B40C0C; font-family: Montserrat; font-size: 15px; font-style: normal; font-weight: 700; line-height: normal;">
                            Cancel
                        </span>
                    </button>

                    {{-- <button id="continue-button" style="border-radius: 18px; background: #980000; width: 203px; height: 39px; flex-shrink: 0; border: none; margin-left: 10px;" data-toggle="modal" data-target="#exampleModal">
                        <span style="color: #FFF; font-family: Montserrat; font-size: 15px; font-style: normal; font-weight: 700; line-height: normal;">
                            Continue
                        </span>
                    </button> --}}

                    <button id="continue" style="border-radius: 18px; background: #980000; width: 203px; height: 39px; flex-shrink: 0; border: none; margin-left: 10px;" >
                        <span style="color: #FFF; font-family: Montserrat; font-size: 15px; font-style: normal; font-weight: 700; line-height: normal;">
                            Continue
                        </span>
                    </button>




                </div>
            </div>
        </div>



    {{-- Disable Non-Numerical Values --}}
    <script>
        function restrictInputToNumbersAndPeriod() {
        document.getElementById('rate').addEventListener('input', function(event) {
            let inputValue = event.target.value;

            // Replace any non-numeric or non-period characters with an empty string
            let sanitizedInput = inputValue.replace(/[^0-9.]/g, '');

            // Ensure the input starts with a number or period and doesn't contain multiple periods
            if (/^[0-9]*\.?[0-9]*$/.test(sanitizedInput)) {
            event.target.value = sanitizedInput; // Set the sanitized value back to the input field
            } else {
            event.target.value = sanitizedInput.slice(0, -1); // Remove the last character if it's invalid
            }
        });
        }

        restrictInputToNumbersAndPeriod();
    </script>

    {{-- Coverage row Title --}}
    <script>

        document.addEventListener("DOMContentLoaded", function() {
            let rows = document.querySelectorAll('.row-coverages-computations');
            let groupedRates = {!! json_encode($groupedRates) !!};

            for (let i = 1; i < rows.length; i++) {
                let limitLabel = rows[i].querySelector('.label-limit');
                let rateLabel = rows[i].querySelector('.label-rate');
                let premiumLabel = rows[i].querySelector('.label-premium');
                let limitInput = rows[i].querySelector('.input-limit');
                let rateInput = rows[i].querySelector('.input-rate');
                let computationLabel = rows[i].querySelector('.computation-coverages');
                let ownDamageTheftLimitInput = document.querySelector('input[data-coverage="OWN DAMAGE/THEFT"]');
                let aogLimitInput = document.querySelector('input[data-coverage="AOG"]');
                let aogRateInput = document.querySelector('input[data-coverage="AOG"][name="rate"]');
                let aogPremiumDue = document.querySelector('input[data-coverage="AOG"][name="premium_due"]');
                let biRateInput = document.querySelector('input[data-coverage="BODILY INJURY"][name="rate"]');
                let pdRateInput = document.querySelector('input[data-coverage="PROPERTY DAMAGE"][name="rate"]');

                if (biRateInput){
                    biRateInput.disabled = true;
                }
                if (pdRateInput){
                    pdRateInput.disabled = true;
                }

                if (ownDamageTheftLimitInput && aogLimitInput) {
                    ownDamageTheftLimitInput.addEventListener('input', function(event) {
                        let numericValue = Number(event.target.value.replace(/,/g, '')); // Extract the numeric value
                        let formattedValue = numericValue.toLocaleString('en-US', {
                            minimumFractionDigits: 0,
                            maximumFractionDigits: 2
                        });
                        aogLimitInput.value = formattedValue;
                        aogLimitInput.readOnly = true;

                    });

                }

                if (limitLabel) {
                    limitLabel.style.visibility = 'hidden';
                }

                if (computationLabel.textContent.trim() === 'AUTO-PA-5 SEATS') {

                    rateLabel.textContent = 'SEATING CAPACITY';
                    rateLabel.style.visibility = 'visible';
                    handleAutoPA(groupedRates['AUTO-PA-5 SEATS'], limitInput);

                } else if (rateLabel) {

                    rateLabel.style.visibility = 'hidden';

                }

                if (premiumLabel) {

                    premiumLabel.style.visibility = 'hidden';

                }

                if (computationLabel.textContent.trim() === 'AOG') {

                    handleAOG(groupedRates['AOG'], limitInput, rateInput);

                }
            }
        });


        function handleAutoPA(rateData, limitInput) {
            if (rateData && rateData[0]?.setLimitMinimum) {
                let autoPa = rateData[0].setLimitMinimum;
                let limitValue = parseFloat(autoPa).toLocaleString('en-US', {
                    minimumFractionDigits: 0,
                    maximumFractionDigits: 2
                });
                limitInput.value = limitValue;
                limitInput.readOnly = true;
            }
        }

        function handleAOG(rateData, limitInput, rateInput) {
            if (rateData && rateData[0]?.setRateMinimum) {
                let aogRate = rateData[0].setRateMinimum;
                let rateValuePercent = (aogRate * 100).toFixed(2) + '%';
                rateInput.value = rateValuePercent;
                limitInput.readOnly = true;
                rateInput.readOnly = true;
            }

        }



    </script>

    <script>

        // ++++++++++++++++++++++++++-
        document.getElementById('continue').addEventListener('click', function() {
            let rows = document.querySelectorAll('.row-coverages-computations');
            let grossPremiumInput = document.getElementById('gross_premium');
            let grossPremiumErrorDiv = document.getElementById('gross-premium-error'); // Ensure you have this div in your HTML
            let isValid = true;
            
            function validateField(fieldId, errorMessage) {
                const field = document.getElementById(fieldId);
                const errorSpan = field.nextElementSibling; // The error message span

                let isInvalid = false;

                // Check if the field is a dropdown and the placeholder option is selected
                if (field.tagName === 'SELECT' && field.selectedIndex === 0) {
                    isInvalid = true;
                }
                // Check if the field is a text input and is empty
                else if (field.tagName === 'INPUT' && !field.value.trim()) {
                    isInvalid = true;
                }

                if (isInvalid) {
                    errorSpan.textContent = errorMessage;
                    errorSpan.style.display = 'block';
                    isValid = false;
                } else {
                    errorSpan.style.display = 'none';
                }
            }

            // Validate each field
            validateField('insured_full_name', 'Insured’s Full Name is required.');
            validateField('effectivity_type', 'Effectivity Date is required.');
            validateField('car_classification', 'Car Classification is required.');
            validateField('car_category', 'Car Category is required.');
            validateField('unit_model', 'Unit Model is required.');
            validateField('plate_no', 'Plate No. is required.');

            // Validate GROSS PREMIUM
            if (!grossPremiumInput.value.trim()) {
                grossPremiumErrorDiv.textContent = 'Please select LGT.';
                grossPremiumErrorDiv.style.display = 'block';
                isValid = false;
            } else {
                grossPremiumErrorDiv.style.display = 'none';
            }

            // Continue with validation for PREMIUM DUE and RATE in rows
            rows.forEach(function(row) {
                let computationLabel = row.querySelector('.computation-coverages').textContent.trim();
                let premiumInput = row.querySelector('input[name="premium_due"]');
                let rateInput = row.querySelector('input[name="rate"]');
                let premiumErrorDiv = row.querySelector('.invalid-inputs-premium');
                let rateErrorDiv = row.querySelector('.invalid-inputs-rate');

                // Validate PREMIUM DUE for specified coverages
                if (["PROPERTY DAMAGE", "BODILY INJURY"].includes(computationLabel) && premiumInput && premiumInput.value.trim() === '') {
                    premiumErrorDiv.textContent = 'Please select ' + computationLabel + ' limit to calculate premium due.';
                    premiumErrorDiv.style.display = 'block';
                    isValid = false;
                }
                // Standard error message for other coverages
                else if (["OWN DAMAGE/THEFT", "AUTO-PA-5 SEATS"].includes(computationLabel) && premiumInput && premiumInput.value.trim() === '') {
                    premiumErrorDiv.textContent = 'The PREMIUM DUE for ' + computationLabel + ' is required.';
                    premiumErrorDiv.style.display = 'block';
                    isValid = false;
                } else {
                    premiumErrorDiv.style.display = 'none';
                }

                // Validate RATE for OWN DAMAGE/THEFT and AUTO-PA-5 SEATS
                if (["OWN DAMAGE/THEFT", "AUTO-PA-5 SEATS"].includes(computationLabel) && rateInput && rateInput.value.trim() === '') {
                    rateErrorDiv.textContent = 'The RATE for ' + computationLabel + ' is required.';
                    rateErrorDiv.style.display = 'block';
                    isValid = false;
                } else {
                    rateErrorDiv.style.display = 'none';
                }
            });

            if (isValid) {
                // If all required fields are filled, open the modal
                $('#exampleModal').modal('show');
            }
        });



        document.addEventListener("DOMContentLoaded", () => {

            const continueButton = document.querySelector('#continue-button');
            const selectElement = document.getElementById('lgtSelect');
            const inputElement = document.getElementById('lgtInput');
            const discountInput = document.getElementById('discount');

            let inputtedLimits = document.querySelectorAll('input#limit');
            let limitInputs = document.querySelectorAll('.form-floating input[name="limit"]');

            let selectLimits = document.querySelectorAll('#multiple_limit');

            let inputtedRates = document.querySelectorAll('input#rate');
            let rateInputs = document.querySelectorAll('.form-floating input[name="rate"]');

            let errorDisplays = {};

            let groupedRates = {!! json_encode($groupedRates) !!};

            let lgtSelect = document.getElementById('lgtSelect');
            let lgtInput = document.getElementById('lgtInput');

            let originalInputs = document.getElementById('initialInputs').cloneNode(true);
            let addedFieldContainers = [];

            //dynamic storing of value in dynamic field
            let dynamicFieldValues = [];
            let fieldGroupId = 0;


            // let dstValue = {!! json_encode($dsts) !!};

            let dstPercentage = @json($dsts->first()->dst_percentage);

            let vatPercentage = @json($vats->first()->vat_percentage);
            let vatExcludedPercentage = @json($vats->first()->excluded_percentage);


            // console.log(dstValue);


            document.getElementById('addFieldBtn').addEventListener('click', function () {
                event.preventDefault();

                let newFieldsContainer = document.createElement('div');
                newFieldsContainer.className = 'row row-space';

                let newField1 = document.createElement('div');
                newField1.className = 'col-6 col-sm-3 col-md-3 mb-3 d-flex flex-column align-items-center';
                newField1.innerHTML = `
                    <select class="form-control custom-input" style="text-align: left; font-size: 13px;">
                        <option disabled="disabled" selected="selected"></option>
                        <option value="AM">AM</option>
                        <option value="BM">BM</option>
                        <option value="GM">GM</option>
                    </select>
                `;

                let newField2 = document.createElement('div');
                newField2.className = 'col-6 col-sm-3 col-md-5 mb-3 d-flex flex-column align-items-center';
                newField2.innerHTML = '<input type="text" class="form-control custom-input">';

                let newField3 = document.createElement('div');
                newField3.className = 'col-6 col-sm-3 col-md-4 mb-3 d-flex flex-column align-items-center';
                newField3.innerHTML = '<input type="text" class="form-control custom-input">';

                newFieldsContainer.appendChild(newField1);
                newFieldsContainer.appendChild(newField2);
                newFieldsContainer.appendChild(newField3);

                let addButton = document.getElementById('addFieldBtn');
                addButton.parentNode.insertBefore(newFieldsContainer, addButton.parentNode.firstChild);
                newFieldsContainer.dataset.fieldGroupId = fieldGroupId;

                let fieldGroup = {

                    field1: '',
                    field2: '',
                    field3: ''
                };

                // Extract and store the values from the dynamic fields
                newField1.querySelector('select').addEventListener('input', (e) => fieldGroup.field1 = e.target.value);
                newField2.querySelector('input').addEventListener('input', (e) => fieldGroup.field2 = e.target.value);
                newField3.querySelector('input').addEventListener('input', (e) => fieldGroup.field3 = e.target.value);

                addedFieldContainers.push(newFieldsContainer);
                dynamicFieldValues.push(fieldGroup);

                fieldGroupId++;
                updateDeleteButton();
                calculateTotalExpenses(); // Calculate total expenses when a field is added
                attachInputListeners(); // Attach input listeners to the newly added fields
                calculateSalesCredit();
            });

            document.getElementById('deleteFieldBtn').addEventListener('click', function () {
                event.preventDefault();

                if (addedFieldContainers.length > 0) {
                    let lastAddedContainer = addedFieldContainers.pop();

                    // Get the identifier of the container being removed
                    let containerId = parseInt(lastAddedContainer.dataset.fieldGroupId);

                    // Find and remove the corresponding field group from dynamicFieldValues
                    dynamicFieldValues = dynamicFieldValues.filter(fg => fg.id !== containerId);

                    lastAddedContainer.remove();
                    updateDeleteButton();
                } else {
                    // When all added fields are deleted, restore the original inputs
                    let dynamicFieldsContainer = document.getElementById('dynamicFieldsContainer');
                    dynamicFieldsContainer.innerHTML = '';
                    dynamicFieldsContainer.appendChild(originalInputs.cloneNode(true));
                    updateDeleteButton();
                }

                calculateTotalExpenses();
                commisionRevenueComputation();
            });


            function updateDeleteButton() {
                let deleteButton = document.getElementById('deleteFieldBtn');
                deleteButton.disabled = addedFieldContainers.length === 0;

            }

            //end

            //check value of sales credit and percentage function
            function checkAndToggleSalesCredit() {
                let salesCreditInput = document.getElementById('sales_credit');
                let salesCreditPercentInput = document.getElementById('sales_credit_percent');
                let marketingFundInput = document.getElementById('marketing_fund');

                if (!salesCreditInput || !salesCreditPercentInput) {
                    console.error("Input elements not found!");
                    return;
                }

                let salesCreditValue = parseFloat(salesCreditInput.value) || 0;
                let salesCreditPercentValue = parseFloat(salesCreditPercentInput.value.replace('%', '')) || 0;

                let limitSalesCredit = 3501;

                // Check conditions
                if (salesCreditValue > limitSalesCredit ) {

                    marketingFundInput.disabled = false;
                } else {

                    marketingFundInput.disabled = true;
                }
            }
            checkAndToggleSalesCredit();
            //end

            //function limit on marketing fund
            function limitInputTo500() {
                let input = document.getElementById('marketing_fund');
                let warning = document.getElementById('marketing_fund_warning');

                if (!input || !warning) {
                    console.error("Elements not found!");
                    return;
                }

                input.addEventListener('change', function() {
                    let value = parseFloat(input.value) || 0;
                    if (value > 500) {
                        input.value = '';
                        warning.style.display = 'block'; // Show the warning
                        // Do not call the functions if value is above 500

                    } else {
                        warning.style.display = 'none'; // Hide the warning
                        // Call the functions if value is 500 or below
                        calculateTotalExpenses();
                        commisionRevenueComputation();
                    }
                });
            }

            // Call the function to apply the limit and show warning
            limitInputTo500();


            function calculateTotalExpenses() {
                let inputs = document.querySelectorAll('#dynamicFieldsContainer input[type="text"]');
                let totalExpenses = 0;

                inputs.forEach(input => {
                    let value = parseFloat(input.value) || 0;
                    totalExpenses += value;
                });

                // Get the value of the marketing_fund input and deduct it from totalExpenses
                let marketingFundInput = document.getElementById('marketing_fund');
                let marketingFundValue = 0;

                if (marketingFundInput) {
                    marketingFundValue = parseFloat(marketingFundInput.value) || 0;
                }

                totalExpenses += marketingFundValue; // Deduct marketing fund from total expenses

                // Make sure total expenses doesn't go below zero
                totalExpenses = totalExpenses < 0 ? 0 : totalExpenses;

                document.getElementById('total_expenses').value = totalExpenses.toFixed(2);
                calculateAndUpdateVAT();
            }

            function attachInputListeners() {
                let inputs = document.querySelectorAll('#dynamicFieldsContainer input[type="text"]');
                inputs.forEach(input => {
                    input.addEventListener('input', function () {
                        calculateTotalExpenses();
                        commisionRevenueComputation();
                        calculateAndUpdateVAT();

                    });
                });
            }

            function formatLimit() {

                if (inputtedLimits) {

                    inputtedLimits.forEach(inputtedLimit => {
                        inputtedLimit.addEventListener('input', event => {
                            let inputLimit = Number(event.target.value.replace(/[^\d.]/g, ''));
                            let formattedLimit = inputLimit.toLocaleString('en-US');

                            event.target.value = formattedLimit;

                            validateLimit(event.target, inputLimit);
                            conditionalPremiumDue(event.target);
                            calculateAOGPremium();
                            logTotalPremiumDue();
                            calculateAndDisplayDST();

                        });
                    });
                }

                if (selectLimits) {
                    selectLimits.forEach(selectLimit => {
                        for (let option of selectLimit.options) {
                            if (!isNaN(option.value)) {
                                let limitValue = parseFloat(option.value).toLocaleString('en-US', {
                                    minimumFractionDigits: 0,
                                    maximumFractionDigits: 0
                                });
                                option.textContent = limitValue;
                            }
                        }

                        selectLimit.addEventListener('change', event => {
                            let selectedOption = event.target.options[event.target.selectedIndex];
                            let selectedLimit = selectedOption.value;
                            // event.target.value = selectedLimit;

                            dropDownPremiumDue(event.target, selectedLimit);
                            logTotalPremiumDue();
                        });
                    });
                }

            }

            function formatRate() {
                if (inputtedRates) {
                    inputtedRates.forEach(inputtedRate => {
                        inputtedRate.addEventListener('change', event => {
                            let coverageName = event.target.dataset.coverage; // Get the coverage name
                            let rateValue = event.target.value.trim();
                            let parsedRateValue = parseFloat(rateValue);

                            if (!isNaN(parsedRateValue)) {
                                if (coverageName && coverageName !== 'AUTO-PA-5 SEATS') {
                                    // Handle rate formatting and validation for other coverages
                                    let decimalRateValue = parsedRateValue / 100;
                                    event.target.value = parsedRateValue.toFixed(2) + '%';
                                    // console.log('NOT AUTO-PA');
                                    validateRate(decimalRateValue);
                                    conditionalPremiumDue(event.target);
                                } else {
                                    // Handle 'AUTO-PA-5 SEATS' coverage
                                    let decimalRateValue = parsedRateValue;
                                    event.target.value = parsedRateValue;
                                    // console.log('AUTO-PA');
                                    conditionalPremiumDue(event.target);
                                }
                            }
                        });
                    });

                }
            }

            function validateLimit(event) {

                if (event.target) {

                    let inputLimit = parseFloat(event.target.value.replace(/[^\d.]/g, ''));
                    let coverageName = event.target.dataset.coverage;
                    let errorDisplay = event.target.nextElementSibling;


                    if (coverageName && groupedRates[coverageName]) {
                        let errorMessage = '';

                        groupedRates[coverageName].forEach(rate => {
                            let setLimitMin = parseFloat(rate.setLimitMinimum);
                            let setLimitMax = parseFloat(rate.setLimitMaximum);

                                formattedLimitMin = parseFloat(setLimitMin).toLocaleString('en-US', {
                                    minimumFractionDigits: 0,
                                    maximumFractionDigits: 2
                                });

                                formattedLimitMax = parseFloat(setLimitMax).toLocaleString('en-US', {
                                    minimumFractionDigits: 0,
                                    maximumFractionDigits: 2
                                });


                                if (inputLimit < setLimitMin) {
                                    event.target.classList.add('is-invalid');
                                    errorMessage = 'Input is lower than the minimum limit of ' + formattedLimitMin + ' for ' + coverageName;
                                    document.getElementById("continue").disabled = true; // Disable the Continue button


                                } else if (inputLimit > setLimitMax) {
                                    event.target.classList.add('is-invalid');
                                    errorMessage = 'Input is higher than the maximum limit of ' + formattedLimitMax + ' for ' + coverageName;
                                    document.getElementById("continue").disabled = true; // Disable the Continue button

                                } else {
                                    event.target.classList.remove('is-invalid');
                                    document.getElementById("continue").disabled = false; // Enable the Continue button

                                }

                        });

                        errorDisplay.innerText = errorMessage;

                    }


                }

            }

            let isRateValid = true;
            function validateRate(decimalRateValue) {

                if (decimalRateValue) {
                    let inputRate = parseFloat(decimalRateValue);

                    let coverageName = event.target.dataset.coverage;
                    let errorDisplay = event.target.nextElementSibling;

                    if (coverageName && groupedRates[coverageName]) {
                        let errorMessage = '';
                        isRateValid = true;
                        groupedRates[coverageName].forEach(rate => {
                            let setRateMin = rate.setRateMinimum;
                            let setRateMax = rate.setRateMaximum;

                            setRateMinimum = setRateMin * 100;
                            setRateMaximum = setRateMax * 100;

                            formattedRateMin = parseFloat(setRateMinimum).toLocaleString('en-US', {
                                minimumFractionDigits: 0,
                                maximumFractionDigits: 2
                            });

                            formattedRateMax = parseFloat(setRateMaximum).toLocaleString('en-US', {
                                minimumFractionDigits: 0,
                                maximumFractionDigits: 2
                            });

                            if (setRateMin === 0 && setRateMax === 0) {

                                console.log('Check');

                            } else {

                                if (inputRate < setRateMin) {
                                    isRateValid = false;
                                    let premiumDueField = document.getElementById(`premium_due_${coverageName}`);
                                    if (premiumDueField) {
                                        premiumDueField.value = ''; // Clear the premium due field
                                        event.target.classList.add('is-invalid');
                                    errorMessage = 'Input is lower than the minimum limit of ' + formattedRateMin + '% for ' + coverageName;
                                    }

                                } else if (inputRate > setRateMax) {
                                    isRateValid = false;
                                    let premiumDueField = document.getElementById(`premium_due_${coverageName}`);
                                    if (premiumDueField) {
                                        premiumDueField.value = ''; // Clear the premium due field
                                        event.target.classList.add('is-invalid');
                                    errorMessage = 'Input is higher than the maximum limit of ' + formattedRateMax + '% for ' + coverageName;
                                    }

                                } else {
                                    event.target.classList.remove('is-invalid');
                                }

                            }

                        });

                        errorDisplay.innerText = errorMessage;

                    }




                }
            }

            function dropDownPremiumDue(event, selectedLimit) {

                let selectedOption = event.options[event.selectedIndex];
                if (!selectedOption) {
                    console.error('No option is selected');
                    return;
                }

                let coverageName = selectedOption.dataset.coverage;
                let dataRate = selectedOption.dataset.rate;
                let premiumDueAnswer = parseFloat(dataRate) * parseFloat(selectedLimit);
                let premiumFieldId = `premium_due_${coverageName}`;
                let premiumField = document.getElementById(premiumFieldId);


                if (premiumField) {
                    premiumField.value = premiumDueAnswer.toFixed(2);
                } else {
                    console.error('Premium field not found for coverage:', coverageName);
                }


            }

            function conditionalPremiumDue(event) {
                if (event.target && isRateValid) {
                    let coverageName = event.target.dataset.coverage;

                    if (coverageName && groupedRates[coverageName]) {

                        // console.log(`Coverage: ${coverageName}`);

                        groupedRates[coverageName].forEach(rate => {

                            let inputLimitString = document.querySelector(`input[data-coverage="${coverageName}"][id="limit"]`).value;
                            let inputRateString = document.querySelector(`input[data-coverage="${coverageName}"][id="rate"]`).value;
                            let premiumFieldId = `premium_due_${coverageName}`;
                            let premiumField = document.getElementById(premiumFieldId);

                            // Remove commas and percentage signs and convert to numbers
                            let inputLimit = parseFloat(inputLimitString.replace(/,/g, '').replace('%', ''));
                            let inputRate = parseFloat(inputRateString.replace(/,/g, '').replace('%', '')) / 100;


                            let setLimitMinimum = parseFloat(rate.setLimitMinimum);
                            let setLimitMaximum = parseFloat(rate.setLimitMaximum);
                            let setRateMinimum = parseFloat(rate.setRateMinimum);
                            let setRateMaximum = parseFloat(rate.setRateMaximum);


                            if (setLimitMinimum !== 0 || setLimitMaximum !== 0 || setRateMinimum !== 0 || setRateMaximum !== 0) {

                                if(setRateMinimum === 0 || setRateMaximum === 0){

                                    let inputRate = parseFloat(inputRateString.replace(/,/g, ''));
                                    let premiumDueAnswer = inputLimit * inputRate;
                                    let formattedPremiumDue = premiumDueAnswer.toLocaleString('en-US');

                                    premiumField.value = formattedPremiumDue;


                                }

                                else if(setLimitMinimum !== 0 || setLimitMaximum !== 0 || setRateMinimum !== 0 || setRateMaximum !== 0) {

                                    // Check if inputLimit and inputRate are valid numbers
                                    if (!isNaN(inputLimit) && !isNaN(inputRate)) {

                                        let premiumDueAnswer = inputLimit * inputRate;
                                        let formattedPremiumDue = premiumDueAnswer.toLocaleString('en-US');

                                        premiumField.value = formattedPremiumDue;


                                    } else {

                                        premiumField.value = '';

                                    }

                                }


                            }


                        });
                        logTotalPremiumDue();

                    }
                }

            }

            function calculateAOGPremium() {
                let aogLimitInput = document.querySelector('input[data-coverage="AOG"]');
                let aogRateInput = document.querySelector('input[data-coverage="AOG"][name="rate"]');
                let aogPremiumDue = document.querySelector('input[data-coverage="AOG"][name="premium_due"]');

                let aogLimit = parseFloat(aogLimitInput.value.replace(/,/g, ''));
                let aogRate = parseFloat(aogRateInput.value.replace(/,/g, '').replace('%', '')) / 100;
                let aogPremium = aogLimit * aogRate;

                aogPremiumDue.value = aogPremium.toLocaleString('en-US');



            }

            function calculateTotalPremiumDue() {
                let premiumFieldIds = ['premium_due_AOG', 'premium_due_OWN DAMAGE/THEFT', 'premium_due_BODILY INJURY','premium_due_PROPERTY DAMAGE']; // Add all premium due field IDs here
                let totalPremiumDue = 0;

                premiumFieldIds.forEach(premiumFieldId => {
                    let premiumField = document.getElementById(premiumFieldId);
                    if (premiumField) {
                        let value = premiumField.value.replace(/,/g, ''); // Remove commas from value
                        let parsedValue = parseFloat(value);
                        if (!isNaN(parsedValue)) {
                            totalPremiumDue += parsedValue;
                        }
                    }
                });

                return totalPremiumDue;

            }

            function replaceWithInput() {
                // Assuming you have an input element with ID 'lgtInput'
                const inputElement = document.getElementById('lgtInput');
                const selectElement = document.getElementById('lgtSelect');

                if (!inputElement || !selectElement) {
                    console.error("Elements not found!");
                    return;
                }

                // Hide the select and display the input
                const selectedValue = selectElement.options[selectElement.selectedIndex].value;

                selectElement.style.display = 'none';
                inputElement.style.display = 'block';

                // Transfer the selected value to the input and calculate LGT
                inputElement.value = selectedValue;
                calculateLGT(selectedValue);
            }


            function calculateLGT(selectedValue) {
                console.log("calculateLGT called");
                console.log("Selected value:", selectedValue);

                const totalPremiumDue = parseFloat(document.getElementById('net_premium').value.replace(/[^\d.]/g, '')) || 0;

                console.log("Total Premium Due:", totalPremiumDue);

                // Calculate total LGT based on the selected percentage
                const totalLGT = totalPremiumDue * parseFloat(selectedValue);

                console.log("Total LGT:", totalLGT);

                // Display the calculated LGT in the input field
                document.getElementById('lgtInput').value = totalLGT.toLocaleString('en-US', {
                    minimumFractionDigits: 2,
                    maximumFractionDigits: 2
                });
                logTotalPremiumDue(totalLGT);
            }

            function resetLGTSelect() {
                document.getElementById('lgtSelect').style.display = 'block';
                document.getElementById('lgtInput').style.display = 'none';
                document.getElementById('lgtInput').value = "";
                document.getElementById('lgtSelect').selectedIndex = 0;
            }

            // Function to log the total premium due
            function logTotalPremiumDue(totalLGT) {
                let totalPremiumDue = calculateTotalPremiumDue();


                if (typeof totalPremiumDue === 'number') {
                    let netPremiumInput = document.querySelector('#net_premium');
                    let dstInput = document.querySelector('#dst');
                    let vatInput = document.querySelector('#vat');

                    let grossPremiumInput = document.querySelector('#gross_premium');

                    if (netPremiumInput && dstInput && vatInput && grossPremiumInput) {
                        // Set net premium value
                        netPremiumInput.value = totalPremiumDue.toLocaleString('en-US');

                        // Calculate and display DST
                        let netPremium = parseFloat(netPremiumInput.value.replace(/,/g, '')) || 0;

                        if (!isNaN(netPremium)) {
                            // let dstPercentage = 0.125;
                            let totalDST = netPremium * dstPercentage;

                            dstInput.value = totalDST.toLocaleString('en-US', {
                                minimumFractionDigits: 2,
                                maximumFractionDigits: 2
                            });

                        } else {
                            dstInput.value = ''; // Clear DST field if net premium is not a number
                        }

                        // Calculate and display VAT
                        // let vatPercentage = 0.12;


                        let totalVAT = totalPremiumDue * vatPercentage;
                        vatInput.value = totalVAT.toLocaleString('en-US', {
                            minimumFractionDigits: 2,
                            maximumFractionDigits: 2
                        });

                        // Calculate and display total gross premium
                        let netPremiumValue = parseFloat(netPremiumInput.value.replace(/,/g, '')) || 0;
                        let dstValue = parseFloat(dstInput.value.replace(/,/g, '')) || 0;
                        let vatValue = parseFloat(vatInput.value.replace(/,/g, '')) || 0;

                        if (!isNaN(netPremiumValue) && !isNaN(dstValue) && !isNaN(vatValue) && !isNaN(totalLGT)) {
                            let total = netPremiumValue + dstValue + vatValue + totalLGT;
                            grossPremiumInput.value = total.toLocaleString('en-US', {
                                minimumFractionDigits: 0,
                                maximumFractionDigits: 2
                            });
                        } else {
                            grossPremiumInput.value = ''; // Or any other fallback value
                        }

                        console.log('Total Premium Due:', totalPremiumDue.toLocaleString('en-US'));
                        console.log("Total Gross Premium:", total);
                    }
                }
            }

            function calculateNetFromDiscount() {
                const discountInput = document.getElementById('discount');
                const grossPremiumInput = document.getElementById('gross_premium');
                const netInput = document.getElementById('net');

                // Get values as floats after removing commas
                const discount = parseFloat(discountInput.value.replace(/,/g, '')) || 0;
                const grossPremium = parseFloat(grossPremiumInput.value.replace(/,/g, '')) || 0;

                // Calculate net after subtracting discount from gross premium
                const net = grossPremium - discount;

                // Update the net input with the calculated value
                netInput.value = net.toLocaleString('en-US', {
                    minimumFractionDigits: 2,
                    maximumFractionDigits: 2
                });



            }

            function commisionRevenueComputation(){

                let coverageData = [];

                let totalProviderPremiumDue = 0; // Initialize total provider premium due
                let totalRevenueCommission;


                let rows = document.querySelectorAll('.row-coverages-computations');

                let insuredNetPremium = parseFloat(document.getElementById('net_premium').value.replace(/[^\d.]/g, '')) || 0;
                let insuredDstAmount = parseFloat(document.getElementById('dst').value.replace(/[^\d.]/g, '')) || 0;
                let insuredVatAmount = parseFloat(document.getElementById('vat').value.replace(/[^\d.]/g, '')) || 0;
                let insuredRapAmount = parseFloat(document.getElementById('rap').value.replace(/[^\d.]/g, '')) || 0;

                const totalInsuredPremiumDue = parseFloat(document.getElementById('net_premium').value.replace(/[^\d.]/g, '')) || 0;
                const selectLGT = document.getElementById('lgtSelect').value;
                let insuredLGTAmount = totalInsuredPremiumDue * parseFloat(selectLGT);

                let insuredGrossPremium = parseFloat(document.getElementById('gross_premium').value.replace(/[^\d.]/g, '')) || 0;
                let insuredDiscountAmount = parseFloat(document.getElementById('discount').value.replace(/[^\d.]/g, '')) || 0;
                let insuredNetAmount = parseFloat(document.getElementById('net').value.replace(/[^\d.]/g, '')) || 0;


                rows.forEach(row => {

                    let computationLabel = row.querySelector('.computation-coverages');
                    let limitInput = row.querySelector('.input-limit');
                    let rateInput = row.querySelector('.input-rate');
                    let dropdown = row.querySelector('select#multiple_limit');
                    let selectedOption;

                    if (computationLabel) {
                        let coverageName = computationLabel.textContent.trim();
                        let limit = "";
                        let rate = "";
                        let dataRate = "";
                        let premiumDue = "";
                        let computationId = "";
                        let providerNetRate = "";

                        if (limitInput) {
                            // Remove commas and convert to decimal
                            let limitValue = limitInput.value.replace(/,/g, '');

                            // Format it with 20 digits and 9 decimal places
                            limit = parseFloat(limitValue).toFixed(9); // Get the value of the input field
                        }

                        if (dropdown) {
                            selectedOption = dropdown.options[dropdown.selectedIndex];
                            if (selectedOption) {
                                limit = selectedOption.value; // Get the selected value from the dropdown
                                dataRate = selectedOption.dataset.rate;
                            }
                        }

                        if (!rate && dataRate) {
                            rate = dataRate; // Use dataRate if rate is not directly available
                            // Update the rate input field if available
                            if (rateInput) {
                                rateInput = rate * 100;
                            }
                        }

                        if (rateInput) {
                            let ratePercentage = parseFloat(rateInput.value); // Get the value of the input field as a percentage

                            if (coverageName !== 'AUTO-PA-5 SEATS') {
                                if (!isNaN(ratePercentage)) {
                                    rate = (ratePercentage / 100).toFixed(9); // Convert percentage to decimal with 9 decimal places
                                }
                            } else {
                                rate = ratePercentage; // No conversion needed for 'AUTO-PA-5 SEATS'
                            }
                        }

                        // Retrieve premium_due input based on the dynamic ID using attribute selector
                        let premiumDueInput = document.querySelector(`[id="premium_due_${coverageName}"]`);

                        if (premiumDueInput) {
                            let premiumDueValue = premiumDueInput.value.replace(/,/g, '');
                            insuredPremiumDue = parseFloat(premiumDueValue).toFixed(9); // Get the value of the input field
                        }

                        if (groupedRates[coverageName]) {
                            // Assuming groupedRates is structured to contain providerNetRate for each coverage
                            let providerRates = groupedRates[coverageName];
                            providerNetRate = providerRates.length > 0 ? providerRates[0].providerNetRate : "";
                        }

                        // Add code to display the insurance_computations.id
                        if (groupedRates[coverageName]) {
                            groupedRates[coverageName].forEach(rateItem => {
                                if (selectedOption && selectedOption.dataset.id) {
                                    computationId = selectedOption.dataset.id;
                                } else {
                                    computationId = rateItem.id;
                                }
                            });
                        }

                        let providerPremiumDue = selectedOption ? insuredPremiumDue : (limit * providerNetRate);
                        totalProviderPremiumDue += parseFloat(providerPremiumDue) || 0; // Accumulate provider premium due
                        providerDST = totalProviderPremiumDue * dstPercentage;
                        providerVAT = totalProviderPremiumDue * vatPercentage;
                        providerLGT = totalProviderPremiumDue * selectLGT;
                        totalGrossProviderPremiumDue = totalProviderPremiumDue + providerDST + providerVAT + providerLGT;
                        totalRevenueCommission = (insuredNetAmount - totalGrossProviderPremiumDue).toFixed(2);



                        // Subtract VAT from total expenses

                    }

                }
                );

                console.log('Commision Revenue Total: ', totalRevenueCommission);
                calculateAndUpdateVAT(totalRevenueCommission);
                calculateSalesCredit(totalRevenueCommission);
                checkAndToggleSalesCredit();
            }
            function calculateAndUpdateVAT(totalRevenueCommission) {
                let totalExpensesInput = document.getElementById('total_expenses');
                if (!totalExpensesInput) {
                    console.error("total_expenses input element not found!");
                    return; // Exit function if the input element is not found
                }

                let totalExpenses = parseFloat(totalExpensesInput.value);
                if (isNaN(totalExpenses)) {
                    console.error("Invalid total expenses value!");
                    return; // Exit function if the total expenses value is not a number
                }

                if (isNaN(totalRevenueCommission)) {
                    console.error("Invalid total revenue commission value!");
                    return; // Exit function if the total revenue commission value is not a number
                }
                let vat = Math.abs((totalRevenueCommission - totalExpenses) * vatPercentage / vatExcludedPercentage);
                if (isNaN(vat)) {
                    console.error("VAT calculation resulted in NaN!");
                    return; // Exit function if the VAT calculation results in NaN
                }

                document.getElementById('computation_vat').value = vat.toFixed(2);
                console.log(vat);
                calculateSalesCredit(totalRevenueCommission, totalExpenses, vat);
            }

            function calculateSalesCredit(totalRevenueCommission, totalExpenses, vat) {
                if (isNaN(totalRevenueCommission) || isNaN(totalExpenses) || isNaN(vat)) {
                    console.error("Invalid input values for sales credit calculation!");
                    return; // Exit function if any input value is not a number
                }
                let result = Math.abs(totalRevenueCommission - totalExpenses);
                let salesCredit = result - vat;
                let salesCreditComputation = totalRevenueCommission - (totalExpenses- vat);
                let salesCreditPercentage = (salesCreditComputation /totalRevenueCommission ) * 100;
                console.log('Sales Credit:', salesCredit);
                document.getElementById('sales_credit').value = salesCredit.toFixed(2);

                console.log('Sales Credit Percentage:', salesCreditPercentage.toFixed(2) + '%');
                document.getElementById('sales_credit_percent').value = salesCreditPercentage.toFixed(2) + '%';
                return salesCredit; // Return the calculated sales credit
            }





            function postSubmit() {

                let coverageData = [];


                let totalProviderPremiumDue = 0; // Initialize total provider premium due
                let totalRevenueCommission;


                let rows = document.querySelectorAll('.row-coverages-computations');

                let insuredFullName = document.getElementById('insured_full_name').value;
                let insuredCarClassification = document.getElementById('car_classification').value;
                let unitModel = document.getElementById('unit_model').value;
                let plateNo = document.getElementById('plate_no').value;
                let effectivityType = document.getElementById('effectivity_type').value;



                let insuredNetPremium = parseFloat(document.getElementById('net_premium').value.replace(/[^\d.]/g, '')) || 0;
                let insuredDstAmount = parseFloat(document.getElementById('dst').value.replace(/[^\d.]/g, '')) || 0;
                let insuredVatAmount = parseFloat(document.getElementById('vat').value.replace(/[^\d.]/g, '')) || 0;
                let insuredRapAmount = parseFloat(document.getElementById('rap').value.replace(/[^\d.]/g, '')) || 0;
                let marketingFundAmount = parseFloat(document.getElementById('marketing_fund').value.replace(/[^\d.]/g, '')) || 0;
                let deductionsTotalExpenses = parseFloat(document.getElementById('total_expenses').value.replace(/[^\d.]/g, '')) || 0;
                let deductionsVat= parseFloat(document.getElementById('computation_vat').value.replace(/[^\d.]/g, '')) || 0;
                let deductionsSalesCredit = parseFloat(document.getElementById('sales_credit').value.replace(/[^\d.]/g, '')) || 0;
                // let deductionsScPercentage = parseFloat(document.getElementById('sales_credit_percent').value);
                let deductionsScPercentage = parseFloat(document.getElementById('sales_credit_percent').value) / 100;


                const totalInsuredPremiumDue = parseFloat(document.getElementById('net_premium').value.replace(/[^\d.]/g, '')) || 0;
                const selectLGT = document.getElementById('lgtSelect').value;
                let insuredLGTAmount = totalInsuredPremiumDue * parseFloat(selectLGT);

                let insuredGrossPremium = parseFloat(document.getElementById('gross_premium').value.replace(/[^\d.]/g, '')) || 0;
                let insuredDiscountAmount = parseFloat(document.getElementById('discount').value.replace(/[^\d.]/g, '')) || 0;
                let insuredNetAmount = parseFloat(document.getElementById('net').value.replace(/[^\d.]/g, '')) || 0;


                rows.forEach(row => {

                    let computationLabel = row.querySelector('.computation-coverages');
                    let limitInput = row.querySelector('.input-limit');
                    let rateInput = row.querySelector('.input-rate');
                    let dropdown = row.querySelector('select#multiple_limit');
                    let selectedOption;

                    if (computationLabel) {
                        let coverageName = computationLabel.textContent.trim();
                        let limit = "";
                        let rate = "";
                        let dataRate = "";
                        let premiumDue = "";
                        let computationId = "";
                        let providerNetRate = "";

                        if (limitInput) {
                            // Remove commas and convert to decimal
                            let limitValue = limitInput.value.replace(/,/g, '');

                            // Format it with 20 digits and 9 decimal places
                            limit = parseFloat(limitValue).toFixed(9); // Get the value of the input field
                        }

                        if (dropdown) {
                            selectedOption = dropdown.options[dropdown.selectedIndex];
                            if (selectedOption) {
                                limit = selectedOption.value; // Get the selected value from the dropdown
                                dataRate = selectedOption.dataset.rate;
                            }
                        }

                        if (!rate && dataRate) {
                            rate = dataRate; // Use dataRate if rate is not directly available
                            // Update the rate input field if available
                            if (rateInput) {
                                rateInput = rate * 100;
                            }
                        }

                        if (rateInput) {
                            let ratePercentage = parseFloat(rateInput.value); // Get the value of the input field as a percentage

                            if (coverageName !== 'AUTO-PA-5 SEATS') {
                                if (!isNaN(ratePercentage)) {
                                    rate = (ratePercentage / 100).toFixed(9); // Convert percentage to decimal with 9 decimal places
                                }
                            } else {
                                rate = ratePercentage; // No conversion needed for 'AUTO-PA-5 SEATS'
                            }
                        }

                        // Retrieve premium_due input based on the dynamic ID using attribute selector
                        let premiumDueInput = document.querySelector(`[id="premium_due_${coverageName}"]`);

                        if (premiumDueInput) {
                            let premiumDueValue = premiumDueInput.value.replace(/,/g, '');
                            insuredPremiumDue = parseFloat(premiumDueValue).toFixed(9); // Get the value of the input field
                        }

                        if (groupedRates[coverageName]) {
                            // Assuming groupedRates is structured to contain providerNetRate for each coverage
                            let providerRates = groupedRates[coverageName];
                            providerNetRate = providerRates.length > 0 ? providerRates[0].providerNetRate : "";
                        }

                        // Add code to display the insurance_computations.id
                        if (groupedRates[coverageName]) {
                            groupedRates[coverageName].forEach(rateItem => {
                                if (selectedOption && selectedOption.dataset.id) {
                                    computationId = selectedOption.dataset.id;
                                } else {
                                    computationId = rateItem.id;
                                }
                            });
                        }

                        let providerPremiumDue = selectedOption ? insuredPremiumDue : (limit * providerNetRate);
                        totalProviderPremiumDue += parseFloat(providerPremiumDue) || 0; // Accumulate provider premium due
                        providerDST = totalProviderPremiumDue * dstPercentage;
                        providerVAT = totalProviderPremiumDue * vatPercentage;
                        providerLGT = totalProviderPremiumDue * selectLGT;
                        totalGrossProviderPremiumDue = totalProviderPremiumDue + providerDST + providerVAT + providerLGT;
                        totalRevenueCommission = (insuredNetAmount - totalGrossProviderPremiumDue).toFixed(2);

                        coverageData.push({
                            computationId: computationId,
                            limit: limit,
                            rate: rate,
                            insuredPremiumDue: insuredPremiumDue,
                            providerPremiumDue: providerPremiumDue
                        });

                        // console.log('ID: ', computationId)
                        // console.log('Limit: ', limit)
                        // console.log('Rate: ', rate)
                        // console.log('Provider Rate: ', providerNetRate)
                        // console.log('Insured Premium Due: ', insuredPremiumDue)
                        // console.log('Provider Premium Due: ', providerPremiumDue)

                    }

                });

                        // console.log('Dynamic Field Values:', dynamicFieldValues);

                        // console.log('Total Expenses:', deductionsTotalExpenses);
                        // console.log('Vat:', deductionsVat);
                        // console.log('Sales Credit:', deductionsSalesCredit);
                        // console.log('Percentage:', deductionsScPercentage);
                        // console.log('Marketing Fund:', marketingFundAmount);





                let submissionData = {
                    coverages: coverageData,
                    insuredFullName: insuredFullName,
                    insuredCarClassification: insuredCarClassification,
                    unitModel: unitModel,
                    plateNo: plateNo,
                    effectivityType: effectivityType,

                    insuredNetPremium: insuredNetPremium,
                    insuredDstAmount: insuredDstAmount,
                    insuredVatAmount: insuredVatAmount,
                    insuredRapAmount: insuredRapAmount,
                    insuredLGTAmount: insuredLGTAmount,
                    insuredGrossPremium: insuredGrossPremium,

                    totalProviderPremiumDue: totalProviderPremiumDue,
                    providerDST: providerDST,
                    providerRAP: insuredRapAmount,
                    providerVAT: providerVAT,
                    providerLGT: providerLGT,
                    totalGrossProviderPremiumDue: totalGrossProviderPremiumDue,

                    insuredDiscountAmount: insuredDiscountAmount,
                    insuredNetAmount: insuredNetAmount,
                    totalRevenueCommission: totalRevenueCommission,


                    dynamicFieldValues: dynamicFieldValues,

                    deductionsTotalExpenses: deductionsTotalExpenses,
                    deductionsVat: deductionsVat,
                    deductionsSalesCredit: deductionsSalesCredit,
                    deductionsScPercentage: deductionsScPercentage,
                    marketingFundAmount: marketingFundAmount,


                };






                return submissionData;


            }



            discountInput.addEventListener('change', calculateNetFromDiscount);
            document.getElementById('lgtInput').addEventListener('click', resetLGTSelect);

            document.getElementById('lgtSelect').addEventListener('change', replaceWithInput);

            document.addEventListener('change', function(event) {
                conditionalPremiumDue(event);
            });


            limitInputs.forEach(input => {
                input.addEventListener('input', validateLimit);


            });

            rateInputs.forEach(input => {
                input.addEventListener('input', validateRate);

            });


            if (continueButton) {
                continueButton.addEventListener('click', function() {
                    console.log('Button clicked!');
                    const submissionData = postSubmit();

                    // Get the CSRF token from the form
                    const csrfToken = document.querySelector('form.form input[name="_token"]').value;

                    // Send the data to the server
                    fetch('/store-quotation', {
                        method: 'POST',
                        headers: {
                            'Content-Type': 'application/json',
                            'X-CSRF-TOKEN': csrfToken
                        },
                        body: JSON.stringify(submissionData)
                    })
                    .then(response => {
                        if(response.ok) {
                            return response.json();
                        }
                        throw new Error('Network response was not ok.');
                    })
                    .then(data => {
                        console.log(data);
                        // window.location.reload();
                    })
                    .catch(error => console.error('Error:', error));
                });
            }





            formatLimit();
            formatRate();
            validateLimit();
            validateRate();
            dropDownPremiumDue();
            conditionalPremiumDue();
            resetLGTSelect();
            logTotalPremiumDue();


        });

    </script>








@endsection
