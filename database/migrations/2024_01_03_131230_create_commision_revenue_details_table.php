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
        Schema::create('commision_revenue_details', function (Blueprint $table) {
            $table->id();

            $table->unsignedBigInteger('quotation_number');

            $table->decimal('marketing_fund_amount', 20, 9);
            $table->decimal('total_expenses_amount', 20, 9);
            $table->decimal('commission_revenue_vat_amount', 20, 9);
            $table->decimal('sales_credit_amount', 20, 9);
            $table->decimal('sales_credit_percentage', 20, 9);

            $table->foreign('quotation_number')->references('quotation_number')->on('quotations');

            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('commision_revenue_details');
    }
};
