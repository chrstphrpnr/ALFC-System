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
        Schema::create('provider_products', function (Blueprint $table) {
            $table->id();
            $table->foreignId('insurance_provider_id')->constrained('insurance_providers');
            $table->foreignId('insurance_product_id')->constrained('insurance_products');
            $table->string('insurance_product_type');
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
        Schema::dropIfExists('provider_products');
    }
};
