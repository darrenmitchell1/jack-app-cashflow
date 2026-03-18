<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    /**
     * Run the migrations.
     */
    public function up(): void
    {
        Schema::create('cashflow_items', function (Blueprint $table) {
            $table->id();
            $table->uuid('uuid')->unique();
            $table->unsignedBigInteger('cashflow_type_id');
            $table->text('description');
            $table->timestamp('applied_from');
            $table->timestamp('applied_to')->nullable();
            $table->tinyText('recurring_period');
            $table->tinyText('income_or_expenditure');
            $table->float('value', 2);
            $table->timestamps();

            $table->foreign('cashflow_type_id')->references('id')->on('cashflow_types');
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('cashflow_items');
    }
};
