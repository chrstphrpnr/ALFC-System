<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\InsuranceProvider;
use App\Models\InsuranceProduct;
use App\Models\InsuranceCoverage;
use App\Models\InsuranceComputation;
use App\Models\Quotation;
use App\Models\InsuredQuotationDetails;
use App\Models\CommisionRevenue;
use App\Models\CommisionRevenueDetails;

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

        $productName = DB::table('insurance_products')
        ->where('id', $productId)
        ->value('insurance_products.product_name');

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
            return view('Users/Sales_Associate/Insurance/form_quotation', compact('productName', 'computationRates','groupedRates'));
        } else {
            // Handle case when no computation rates are found for the selected category and provider
            return redirect()->route('insurance.products', ['providerId' => $providerId])->with('error', 'No computation rates found for this category and provider.');
        }
    }



    public function storeQuotation(Request $request)
    {

        $quotation_num = rand();

        $coverages = $request->input('coverages');
        $insuredFullName = $request->input('insuredFullName');
        $insuredCarClassification = $request->input('insuredCarClassification');
        $unitModel = $request->input('unitModel');
        $plateNo = $request->input('plateNo');
        $effectivityType = $request->input('effectivityType');

        $insuredNetPremium = $request->input('insuredNetPremium');
        $insuredDstAmount = $request->input('insuredDstAmount');
        $insuredVatAmount = $request->input('insuredVatAmount');
        $insuredRapAmount = $request->input('insuredRapAmount');
        $insuredLGTAmount = $request->input('insuredLGTAmount');
        $insuredGrossPremium = $request->input('insuredGrossPremium');

        $totalProviderPremiumDue = $request->input('totalProviderPremiumDue');
        $providerDST = $request->input('providerDST');
        $providerVAT = $request->input('providerVAT');
        $providerLGT = $request->input('providerLGT');
        $providerRAP = $request->input('providerRAP');
        $totalGrossProviderPremiumDue = $request->input('totalGrossProviderPremiumDue');

        $insuredDiscountAmount = $request->input('insuredDiscountAmount');
        $insuredNetAmount = $request->input('insuredNetAmount');
        $totalRevenueCommission = $request->input('totalRevenueCommission');

        $dynamicFields = $request->input('dynamicFieldValues');

        $deductionsTotalExpenses = $request->input('deductionsTotalExpenses');
        $deductionsVat = $request->input('deductionsVat');
        $deductionsSalesCredit = $request->input('deductionsSalesCredit');
        $deductionsScPercentage = $request->input('deductionsScPercentage');
        $marketingFundAmount = $request->input('marketingFundAmount');



        foreach ($coverages as $coverage) {
            Quotation::create([
                'quotation_number' => $quotation_num,
                'computation_rate_id' => $coverage['computationId'],
                'insured_limit' => $coverage['limit'],
                'insured_rate' => $coverage['rate'],
                'insured_premium_due' => $coverage['insuredPremiumDue'],
                'provider_premium_due' => $coverage['providerPremiumDue'],
            ]);
        }


        InsuredQuotationDetails::create([
            'quotation_number' => $quotation_num,
            'insured_full_name' => $insuredFullName,
            'insured_car_classification' => $insuredCarClassification,
            'insured_unit_model' => $unitModel,
            'insured_plate_no' => $plateNo,
            'effectivity_type' => $effectivityType,


            'insured_net_premium' => $insuredNetPremium,
            'insured_dst_amount' => $insuredDstAmount,
            'insured_vat_amount' => $insuredVatAmount,
            'insured_rap_amount' => $insuredRapAmount,
            'insured_lgt_amount' => $insuredLGTAmount,
            'insured_gross_premium' => $insuredGrossPremium,

            'provider_net_premium' => $totalProviderPremiumDue,
            'provider_dst_amount' => $providerDST,
            'provider_vat_amount' => $providerVAT,
            'provider_lgt_amount' => $providerLGT,
            'provider_rap_amount' => $providerRAP,
            'provider_gross_premium_due' => $totalGrossProviderPremiumDue,

            'insured_discount_amount' => $insuredDiscountAmount,
            'insured_total_net_amount' => $insuredNetAmount,
            'commision_revenue_total_amount' => $totalRevenueCommission,

        ]);


        foreach ($dynamicFields as $fieldGroup) {
            CommisionRevenue::create([ // Replace DynamicFieldModel with your actual model
                'quotation_number' => $quotation_num,
                'titles' => $fieldGroup['field1'],
                'deduction_name' => $fieldGroup['field2'],
                'deduction_amount' => $fieldGroup['field3'],
            ]);
        }


        CommisionRevenueDetails::create([
            'quotation_number' => $quotation_num,
            'total_expenses_amount' => $deductionsTotalExpenses,
            'marketing_fund_amount' => $marketingFundAmount,
            'commission_revenue_vat_amount' => $deductionsVat,
            'sales_credit_amount' => $deductionsSalesCredit,
            'sales_credit_percentage' => $deductionsScPercentage,
        ]);


        return response()->json(['message' => 'quotations stored successfully']);
    }

}
