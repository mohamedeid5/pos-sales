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
        Schema::create('treasuries_deliveries', function (Blueprint $table) {
            $table->id();
            $table->foreignId('treasury_id')->comment('The treasury that receives')->constrained();
            $table->foreignId('treasury_delivery_id')->comment('The treasury to be delivered')->constrained('treasuries');
            $table->foreignId('added_by')->constrained('admins');
            $table->foreignId('updated_by')->constrained('admins');
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('treasuries_deliveries');
    }
};
