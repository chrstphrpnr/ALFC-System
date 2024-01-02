<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('insured_quotation_details', function (Blueprint $table) {
            $table->id();
            
            $table->unsignedBigInteger('quotation_number');

            $table->string('insured_full_name');
            $table->string('insured_car_classification');
            $table->string('insured_unit_model');
            $table->string('insured_plate_no');
            $table->string('effectivity_type');
            $table->date('effectivity_date_start')->nullable();
            $table->date('effectivity_date_end')->nullable();

            $table->decimal('insured_net_premium', 20, 9);
            $table->decimal('insured_dst_amount', 20, 9);
            $table->decimal('insured_vat_amount', 20, 9);
            $table->decimal('insured_rap_amount', 20, 9)->nullable();
            $table->decimal('insured_lgt_amount', 20, 9);
            $table->decimal('insured_gross_premium', 20, 9);

            $table->decimal('provider_net_premium', 20, 9);
            $table->decimal('provider_dst_amount', 20, 9);
            $table->decimal('provider_vat_amount', 20, 9);
            $table->decimal('provider_rap_amount', 20, 9)->nullable();
            $table->decimal('provider_lgt_amount', 20, 9);
            $table->decimal('provider_gross_premium_due', 20, 9);


            $table->decimal('insured_discount_amount', 20, 9);
            $table->decimal('insured_total_net_amount', 20, 9);
            $table->decimal('commision_revenue_total_amount', 20, 9);


            $table->timestamps();


            $table->foreign('quotation_number')->references('quotation_number')->on('quotations');

        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('insured_quotation_details');
    }
};
