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
        Schema::create('treasuries', function (Blueprint $table) {
            $table->id();
            $table->string('name');
            $table->tinyInteger('is_master')->default(0)->comment('is treasury master? 0 or 1');
            $table->tinyInteger('status')->default(0);
            $table->bigInteger('last_exchange_receipt')->comment('The latest exchange receipt number');
            $table->bigInteger('last_collection_receipt')->comment('The latest collection receipt number');
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
        Schema::dropIfExists('treasuries');
    }
};
