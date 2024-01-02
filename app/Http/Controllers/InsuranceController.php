<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\InsuranceProvider;
use App\Models\InsuranceProduct;
use App\Models\InsuranceCoverage;
use App\Models\InsuranceComputation;

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
        $providerProduct = DB::table('provider_products')
            ->where('insurance_provider_id', $providerId)
            ->where('insurance_product_id', $productId)
            ->first();

        if ($providerProduct) {

            $computationRates = InsuranceComputation::select(
                'insurance_computations.*',
                'insurance_coverages.coverage_name as coverageName', // Select coverage_name field
                'insurance_computations.set_limit_minimum as setLimitMinimum',
                'insurance_computations.set_limit_maximum as setLimitMaximum',
                'insurance_computations.set_rate_minimum as setRateMinimum',
                'insurance_computations.set_rate_maximum as setRateMaximum',
                'insurance_computations.provider_net_rate as providerNetRate',

            )
            ->where('provider_product_id', $providerProduct->id)
            ->join('insurance_coverages', 'insurance_coverages.id', '=', 'insurance_computations.insurance_coverage_id')
            ->get();

            $groupedRates = $computationRates->groupBy('coverageName');

            // DD($groupedRates);

            // Pass $computationRates data to the view
            return view('Users/Sales_Associate/Insurance/form_quotation', compact('computationRates','groupedRates'));
        } else {
            // Handle case when no computation rates are found for the selected category and provider
            return redirect()->route('insurance.products', ['providerId' => $providerId])->with('error', 'No computation rates found for this category and provider.');
        }
    }



}
