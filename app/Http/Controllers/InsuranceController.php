<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\InsuranceProvider;
use App\Models\InsuranceProduct;
use App\Models\InsuranceCoverage;

use DB;

class InsuranceController extends Controller
{
    public function getProviders(){

        // $providers = InsuranceProvider::select('id', 'provider_name')->get();
        $providers = InsuranceProvider::select('id', 'provider_name', 'provider_logo')->get();

        return view('Users/Sales_Associate/Insurance/providers', ['providers' => $providers]);
    }
}
