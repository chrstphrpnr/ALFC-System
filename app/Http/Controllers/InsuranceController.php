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

    public function providersProduct($providerId){

        // Fetch the provider's name using $providerId
        $providerName = DB::table('insurance_providers')
        ->where('id', $providerId)
        ->value('insurance_providers.provider_name'); // Assuming the column for the provider's name is 'name'


        $products = DB::table('insurance_products')
        ->select('insurance_products.id', 'insurance_products.product_name') // Select both id and product_name
        ->whereIn('insurance_products.id', function ($query) use ($providerId) {

            $query->select('provider_products.insurance_product_id')
                ->from('provider_products')
                ->join('insurance_providers', 'insurance_providers.id', '=', 'provider_products.insurance_provider_id')
                ->join('insurance_products', 'insurance_products.id', '=', 'provider_products.insurance_product_id')
                ->where('provider_products.insurance_provider_id', $providerId);

        })
        ->get();

        return view('Users/Sales_Associate/Insurance/products', compact('providerName', 'products','providerId'));

    }

    public function getComputationRates($providerId, $productId) {



    }



}
