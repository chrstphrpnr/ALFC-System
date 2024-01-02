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
        Schema::create('quotations', function (Blueprint $table) {
            $table->id();
            $table->unsignedBigInteger('quotation_number')->index();
            $table->foreignId('computation_rate_id')->constrained('insurance_computations');
            $table->decimal('insured_limit', 20, 9);
            $table->decimal('insured_rate', 20, 9);
            $table->decimal('insured_premium_due', 20, 9);
            $table->decimal('provider_premium_due', 20, 9);
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
        Schema::dropIfExists('quotations');
    }
};
