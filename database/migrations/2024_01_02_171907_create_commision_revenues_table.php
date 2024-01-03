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
        Schema::create('commision_revenues', function (Blueprint $table) {
            $table->id();
            $table->unsignedBigInteger('quotation_number');
            $table->string('titles')->nullable();
            $table->string('deduction_name');
            $table->decimal('deduction_amount', 20, 9);
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
        Schema::dropIfExists('commision_revenues');
    }
};
